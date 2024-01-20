<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Hour;
use App\Models\User;
use Midtrans\Config;
use App\Models\Order;
use App\Models\Product;
use App\Models\Neighbor;
use App\Models\Prediction;
use App\Models\MatrixRating;
use App\Models\OrderProduct;
use App\Models\RecordRating;
use Illuminate\Http\Request;
use App\Helper\SettingHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


class frontendController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function book()
    {
        // $data['cart'] = Cart::where('user_id')
        $data['hours'] = Hour::all();
        return view('customer.book', $data);
    }

    public function contact()
    {
        return view('customer.contact');
    }
    public function cart()
    {
        $data['total']  = 0;
        $data['cart'] = Cart::with('hour')->where('user_id', auth()->user()->id)->get();
        foreach ($data['cart'] as $item){
            $data['total'] += $item->hour->price;
        }
        return view('customer.cart', $data);
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // Google user object dari google
        $userFromGoogle = Socialite::driver('google')->user();

        // Ambil user dari database berdasarkan google user id
        $userFromDatabase = User::where('google_id', $userFromGoogle->getId())->first();

        // Jika tidak ada user, maka buat user baru
        if ($userFromDatabase) {
            Auth::login($userFromDatabase);
            return redirect()->route('index');
        }else{
            $newUser = new User([
                'google_id' => $userFromGoogle->getId(),
                'name' => $userFromGoogle->getName(),
                'email' => $userFromGoogle->getEmail(),
                'password' => Hash::make('password'),
            ]);

            $newUser->save();

            $newUserId = User::latest()->first();
            $newUserId->syncRoles([2]);

            // Login user yang baru dibuat
            auth('web')->login($newUser);
            session()->regenerate();

            return redirect('/');
        }

        // Jika ada user langsung login saja
        // auth('web')->login($userFromDatabase);
        session()->regenerate();

        return redirect('/');
    }

    public function logout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function addCart(Request $request)
    {
        // $date = Hour::find($request->date);
        $hour = Hour::find($request->time_id);
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
            $cart->hour_id=$request->time_id;
            $cart->date = $request->date;
        $cart->save();
        // dd($cart);
        return redirect()->route('cart');
    }

    public function delete_cart(Request $request)
    {
        $data = Cart::where('id', $request->id)->first();
        // dd($data);
        $data->delete();
        return redirect()->route('cart');
    }

    public function payment(Request $request)
    {
        // dd($request->all());
        $trx = new Order;
        $trx->code_order = 'TRX-' . mt_rand(00000, 99999).time();
        $trx->total_price = (int) $request->total_price;
        $trx->status = 'unpaid';
        $trx->user_id = auth()->user()->id;
        $trx->save();

        $carts = Cart::with('hour')->where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $op = new OrderProduct;
            $op->order_id = $trx->id;
            $op->hour_id = $cart->hour->id;
            $op->date = $cart->date;
            $op->save();

            Cart::destroy($cart->id);
        }

        return redirect()->route('midtrans', $trx->id);
    }

    public function midtrans($id)
    {
        $trx = Order::find($id);
        $orders = OrderProduct::where('order_id',$trx->id)->get();
        $user = $trx->user;

        //Set Your server key
        Config::$serverKey = SettingHelper::midtrans_api();
        // Uncomment for production environment
        // Config::$isProduction = true;
        Config::$isSanitized = Config::$is3ds = true;
        Config::$overrideNotifUrl = route('midtrans_notify');

        $trx_details = array(
            'order_id' => $trx->kode_transaksi,
            'gross_amount' => round($trx->total_price),
        );

        $item_details = [];
        foreach($orders as $order) {
            $product = $order->product;
            $item = array(
                'id' => $product->id,
                'price' => $product->price,
                'quantity' => 1,
                'name' => ''
            );
            array_push($item_details, $item);
        }

        $user_details = array(
            'first_name'    => $user->name,
            'last_name'     => '',
            'email'         => $user->email,
            'phone'         => '',
        );

        // Optional, remove this to display all available payment methods
        // $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

        $params = [
            'transaction_details' => $trx_details,
            'item_details' => $item_details,
            'customer_details' => $user_details,
            'callbacks' => [
                'finish' => route('payments_finish')
            ]
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
            $atr->link_pembayaran = $paymentUrl;
            $atr->update();
            dd($paymentUrl);
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            return dd($e->getMessage());
        }
        // $data['order']=Order::find($id);
        // return view('customer.midtrans', $data);
    }
}
