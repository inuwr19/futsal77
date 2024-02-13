<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Hour;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return auth()->user()->hasRole('admin') == true ? view('home') : redirect('/');
        // return view('home');
    }
    public function adminForm(Request $request)
    {
        $data['hours'] = Hour::all();
        $data['orders'] = OrderProduct::all();

        $selectedDate = $request->input('date', Carbon::now()->format('Y-m-d'));
        $bookedHours = OrderProduct::where('date', $selectedDate)->pluck('hour_id')->toArray();
        $data['bookedHours'] = $bookedHours;
        $data['selectedDate'] = $selectedDate;
        if ($request->ajax()) {
            return response()->json(['bookedHours' => $bookedHours]);
        }
        // dd($data);

        return view('admin.adminForm', $data);
        // return view('home');
    }

    public function getBookedHours(Request $request)
    {
        $selectedDate = $request->input('date', Carbon::now()->format('Y-m-d'));
        $bookedHours = OrderProduct::where('date', $selectedDate)->pluck('hour_id')->toArray();

        return response()->json(['bookedHours' => $bookedHours]);
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

    public function paymentAdmin(Request $request)
    {
        dd($request->all());
        
        $trx = new Order;
        $trx->code_order = 'TRX-' . mt_rand(00000, 99999).time();
        $trx->total_price = (int) $request->price;
        $trx->status = 'paid';
        $trx->user_id = auth()->user()->id;
        // dd($trx);
        $trx->save();

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
