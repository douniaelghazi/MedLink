<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;  // Événement déclenché lorsqu'il y a trop de tentatives de connexion

// Utilisé pour le type des règles de validation
use Illuminate\Contracts\Validation\ValidationRule;

// Classe Laravel utilisée pour créer une requête avec validation
use Illuminate\Foundation\Http\FormRequest;

// Permet de gérer l'authentification de l'utilisateur
use Illuminate\Support\Facades\Auth;

// Permet de limiter le nombre de tentatives de connexion
use Illuminate\Support\Facades\RateLimiter;

// Permet de manipuler les chaînes de caractères
use Illuminate\Support\Str;

// Permet de créer une erreur de validation
use Illuminate\Validation\ValidationException;


// Classe qui gère la requête de connexion
class LoginRequest extends FormRequest
{
    /**
     * Vérifie si la requête est autorisée
     */
    public function authorize(): bool
    {
        // Autorise la requête
        return true;
    }


    /**
     * Définit les règles de validation du formulaire Login
     */
    public function rules(): array
    {
        return [

            // Email obligatoire, doit être une chaîne et avoir un format email valide
            'email' => ['required', 'string', 'email'],

            // Mot de passe obligatoire et doit être une chaîne
            'password' => ['required', 'string'],
        ];
    }


    /**
     * Vérifie les identifiants et tente de connecter l'utilisateur
     */
    public function authenticate(): void
    {
        // Vérifie si le nombre de tentatives de connexion n'est pas dépassé
        $this->ensureIsNotRateLimited();

        // Vérifie si l'email et le mot de passe correspondent à un utilisateur
        if (! Auth::attempt(
            $this->only('email', 'password'),

            // Récupère la valeur de "Se souvenir de moi"
            $this->boolean('remember')
        )) {

            // Enregistre une tentative de connexion échouée
            RateLimiter::hit($this->throttleKey());


            // Retourne une erreur si les identifiants sont incorrects
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }


        // Si la connexion réussit, efface le compteur des tentatives échouées
        RateLimiter::clear($this->throttleKey());
    }


    /**
     * Vérifie si trop de tentatives de connexion ont été effectuées
     */
    public function ensureIsNotRateLimited(): void
    {
        // Vérifie si le nombre de tentatives n'a pas dépassé 5
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {

            // Si moins de 5 tentatives, on continue
            return;
        }


        // Déclenche l'événement Lockout car il y a trop de tentatives
        event(new Lockout($this));


        // Récupère le nombre de secondes restantes avant de pouvoir réessayer
        $seconds = RateLimiter::availableIn($this->throttleKey());


        // Retourne une erreur indiquant que trop de tentatives ont été effectuées
        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [

                // Nombre de secondes restantes
                'seconds' => $seconds,

                // Convertit les secondes en minutes
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }


    /**
     * Crée une clé unique pour compter les tentatives de connexion
     */
    public function throttleKey(): string
    {
        // Combine l'email et l'adresse IP de l'utilisateur
        return Str::transliterate(
            Str::lower($this->string('email')) . '|' . $this->ip()
        );
    }
}