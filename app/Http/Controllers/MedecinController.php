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

    // Liste des médecins
    public function index(): View
    {
        $medecins = Medecin::with('specialite')
            ->latest()
            ->paginate(10);

        return view('medecins.index', compact('medecins'));
    }

    // Formulaire création
    public function create(): View
    {
        $specialites = Specialite::orderBy('nom')->get();

        return view('medecins.create', compact('specialites'));
    }

    // Enregistrer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_complet' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'experience' => ['nullable', 'string', 'max:255'],
            'diplome' => ['nullable', 'string', 'max:255'],
            'CV' => ['nullable', 'string', 'max:255'],
            'disponibilite' => ['required', 'boolean'],
            'description_professionnelle' => ['nullable', 'string'],
            'id_specialite' => ['required', 'exists:specialites,id_specialite'],
        ]);

        $validated['id_medecin'] = auth()->id();

        Medecin::updateOrCreate(
            ['id_medecin' => auth()->id()],
            $validated
        );

        return redirect()
            ->route('medecin.dashboard')
            ->with('success', 'Profil médecin enregistré avec succès.');
    }

    // Voir le profil
    public function show(Medecin $medecin): View
    {
        $medecin->load('specialite');

        return view('medecins.show', compact('medecin'));
    }

    // Modifier
    public function edit(): View
    {
        $medecin = Medecin::where('id_medecin', auth()->id())->first();

        $specialites = Specialite::orderBy('nom')->get();

       return view('medecin.edit', compact(
    'medecin',
    'specialites'
));
    }

    // Mettre à jour
    public function update(Request $request)
    {
        $medecin = Medecin::where('id_medecin', auth()->id())->firstOrFail();

        $validated = $request->validate([
            'nom_complet' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'experience' => ['nullable', 'string', 'max:255'],
            'diplome' => ['nullable', 'string', 'max:255'],
            'CV' => ['nullable', 'string', 'max:255'],
            'disponibilite' => ['required', 'boolean'],
            'description_professionnelle' => ['nullable', 'string'],
            'id_specialite' => ['required', 'exists:specialites,id_specialite'],
        ]);

        $medecin->update($validated);

return redirect()
    ->route('medecin.profile.edit')
    ->with('success', 'Profil médecin modifié avec succès.');
    }
}