<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Hour;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $data['total'] = 0;
        $data['order'] = Order::with('order_product')->where('status', 'paid')->orderByDesc('created_at')->get();
        // dd($data['order']);
        foreach ($data['order'] as $item) {
            $data['total'] +=  $item->total_price;
        }


        $monthlySales = Order::selectRaw('SUM(total_price) as total, DATE_FORMAT(created_at, "%b") as month')
        ->where('status', 'paid')
        ->groupBy('month')
        ->orderBy('created_at')
        ->get();

    $data['monthlySales'] = $monthlySales->pluck('total');
    $data['months'] = $monthlySales->pluck('month');

        return auth()->user()->hasRole('admin') == true ? view('home', $data) : redirect('/');
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
    public function paymentAdmin(Request $request)
    {
        // dd($request->all());
        $trx = new Order;
        $data = new OrderProduct;
        $hour = Hour::find($request->time_id);

        $trx->code_order = 'TRX-' . mt_rand(00000, 99999).time();
        $trx->total_price = (int) $hour->price;
        $trx->status = 'paid';
        $trx->user_id = auth()->user()->id;
        // dd($trx);
        $trx->save();

        $data->order_id =  $trx->id;
        $data->hour_id = $request->time_id;
        $data->date = $request->date;
        $data->save();

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
