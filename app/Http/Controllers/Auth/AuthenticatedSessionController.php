<?php

// Namespace du Controller
namespace App\Http\Controllers\Auth;


// Importe le Controller principal
use App\Http\Controllers\Controller;

// Importe la classe qui gère la requête de Login
use App\Http\Requests\Auth\LoginRequest;

// Type de réponse : redirection
use Illuminate\Http\RedirectResponse;

// Représente la requête HTTP
use Illuminate\Http\Request;

// Permet de gérer l'authentification et le Logout
use Illuminate\Support\Facades\Auth;

// Type de réponse : une vue Blade
use Illuminate\View\View;


// Controller responsable du Login et du Logout
class AuthenticatedSessionController extends Controller
{

    // Affiche la page Login
    public function create(): View
    {
        // Affiche resources/views/auth/login.blade.php
        return view('auth.login');
    }


    // Traite la demande de connexion
    public function store(LoginRequest $request): RedirectResponse
    {

        // Vérifie l'email et le mot de passe
        $request->authenticate();


        // Régénère la session après une connexion réussie
        $request->session()->regenerate();


        // Récupère l'utilisateur qui vient de se connecter
        $user = $request->user();


        // Si l'utilisateur est un administrateur
        if ($user->role === 'admin') {

            // Redirige vers le Dashboard Admin
            return redirect()->route('admin.dashboard');
        }


        // Si l'utilisateur est un hôpital
        if ($user->role === 'hopital') {

            // Redirige vers le Dashboard Hôpital
            return redirect()->route('hopital.dashboard');
        }


        // Si l'utilisateur est un médecin
        if ($user->role === 'medecin') {

            // Redirige vers le Dashboard Médecin
            return redirect()->route('medecin.dashboard');
        }


        // Si aucun rôle ne correspond
        return redirect('/');
    }


    // Déconnecte l'utilisateur
    public function destroy(Request $request): RedirectResponse
    {

        // Déconnecte l'utilisateur actuellement connecté
        Auth::guard('web')->logout();


        // Invalide la session actuelle
        $request->session()->invalidate();


        // Génère un nouveau token CSRF
        $request->session()->regenerateToken();


        // Retourne vers la page d'accueil
        return redirect('/');
    }
}