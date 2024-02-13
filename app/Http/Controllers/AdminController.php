<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexAdmin()
    {
        return view('home'); // Sesuaikan dengan nama view admin dashboard
    }
}
