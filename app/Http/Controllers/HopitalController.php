<?php

namespace App\Http\Controllers;

use App\Models\Hopital;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HopitalController extends Controller
{
    // Dashboard
    public function dashboard(): View
    {
        return view('hopital.dashboard');
    }

    // Profil Hôpital
    public function edit(): View
    {
        $hopital = Hopital::where('id_hopital', auth()->id())->first();

        return view('hopital.profile', compact('hopital'));
    }

    // Mise à jour du profil
    public function update(Request $request)
{
    $hopital = Hopital::where('id_hopital', auth()->id())->first();

    if (!$hopital) {
        return back()->with('error', 'Profil Hôpital introuvable.');
    }

    $validated = $request->validate([
        'nom' => ['required', 'string', 'max:255'],
        'type' => ['required', 'string', 'max:255'],
        'adresse' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'logo' => ['nullable', 'string', 'max:255'],
    ]);

    $hopital->update($validated);

    return redirect()
        ->route('hopital.profile.edit')
        ->with('success', 'Profil hôpital modifié avec succès.');
}
}