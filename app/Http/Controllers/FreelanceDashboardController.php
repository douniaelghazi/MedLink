<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FreelanceDashboardController extends Controller
{
    public function index(): View
    {
        return view('freelance.dashboard');
    }
}