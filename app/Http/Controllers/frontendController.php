<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Hour;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Neighbor;
use App\Models\Prediction;
use App\Models\MatrixRating;
use App\Models\OrderProduct;
use App\Models\RecordRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;


class frontendController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function book()
    {
        $data['hours'] = Hour::all();
        return view('customer.book', $data);
    }

    public function contact()
    {
        return view('customer.contact');
    }
    public function cart()
    {
        $data['cart'] = Cart::where('user_id', auth()->user()->id)->get();
        // dd($data);
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
            $cart->date = $request->date;
            $cart->start_time = $hour->start_time;
            $cart->end_time = $hour->end_time;
            $cart->price = $hour->price;
        $cart->save();
        // dd($cart);
        return redirect()->route('cart');
    }

    public function delete_cart(Request $request)
    {
        $data = Cart::where('id', $request->id)->first();
        dd($data);
        $data->delete();
        return redirect()->route('cart');
    }
}
