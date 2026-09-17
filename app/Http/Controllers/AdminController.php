<?php

namespace App\Http\Controllers;

use App\Models\User;
// la requête envoyée par le navigateur
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalHopitals = User::where('role', 'hopital')->count();
        $totalMedecins = User::where('role', 'medecin')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        $users = User::latest()->paginate(10);

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalHopitals',
            'totalMedecins',
            'totalAdmins',
            'users'
        ));
    }

    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required', 'in:admin,hopital,medecin'],
        ]);

        $user->update([
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Le rôle de l’utilisateur a été modifié avec succès.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with(
                'error',
                'Vous ne pouvez pas supprimer votre propre compte.'
            );
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
}