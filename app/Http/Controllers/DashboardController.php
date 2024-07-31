<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Fungsi menampilkan halaman dashboard
    public function index ()
    {
        return view('backend.dashbord');
    }
}
