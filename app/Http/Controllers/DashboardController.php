<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('Super-Admin')) {
            return view('dashboard');
        }

        return redirect()->route('home');
    }
}
