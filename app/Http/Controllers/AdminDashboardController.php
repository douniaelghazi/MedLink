<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $totalClients = User::where('role', 'client')->count();

        $totalFreelances = User::where('role', 'freelance')->count();

        $totalAdmins = User::where('role', 'admin')->count();

        $users = User::latest()->paginate(10);

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalClients',
            'totalFreelances',
            'totalAdmins',
            'users'
        ));
    }
}

