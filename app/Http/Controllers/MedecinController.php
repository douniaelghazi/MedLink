<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Specialite;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MedecinController extends Controller
{
    // Dashboard
    public function dashboard(): View
    {
        $idMedecin = auth()->user()->id;

        $totalCandidatures = Candidature::where('id_medecin', $idMedecin)->count();

        $candidaturesEnAttente = Candidature::where('id_medecin', $idMedecin)
            ->where('statut', 'en_attente')
            ->count();

        $candidaturesAcceptees = Candidature::where('id_medecin', $idMedecin)
            ->where('statut', 'acceptee')
            ->count();

        $candidaturesRefusees = Candidature::where('id_medecin', $idMedecin)
            ->where('statut', 'refusee')
            ->count();

        return view('medecin.dashboard', compact(
            'totalCandidatures',
            'candidaturesEnAttente',
            'candidaturesAcceptees',
            'candidaturesRefusees'
        ));
    }

    // Modifier le profil
    public function edit(): View
    {
        $medecin = Medecin::where('id_medecin', auth()->id())->first();

        $specialites = Specialite::orderBy('nom')->get();

        return view('medecin.edit', compact(
            'medecin',
            'specialites'
        ));
    }

    // Mettre à jour le profil
    public function update(Request $request)
{
    $validated = $request->validate([
        'nom_complet' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'telephone' => ['required', 'string', 'max:255'],
        'ville' => ['required', 'string', 'max:255'],
        'experience' => ['nullable', 'string', 'max:255'],
        'diplome' => ['nullable', 'string', 'max:255'],
        'CV' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
        'disponibilite' => ['required', 'boolean'],
        'description_professionnelle' => ['nullable', 'string'],
        'id_specialite' => ['required', 'exists:specialites,id_specialite'],
    ]);

   $validated['id_medecin'] = auth()->id();

if ($request->hasFile('CV')) {
    $validated['CV'] = $request->file('CV')->store('cv', 'public');
}

Medecin::updateOrCreate(
    ['id_medecin' => auth()->id()],
    $validated
);

    return redirect()
        ->route('medecin.profile.edit')
        ->with('success', 'Profil médecin enregistré avec succès.');
}
}