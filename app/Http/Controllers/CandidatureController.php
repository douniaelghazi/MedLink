<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Mission;
use App\Events\NouvelleCandidature;
use App\Events\CandidatureAcceptee;
use App\Events\CandidatureRefusee;
use Illuminate\Http\Request;


class CandidatureController extends Controller
{
    // Liste des candidatures reçues par l'hôpital
    public function hopitalIndex()
    {
        $candidatures = Candidature::with('mission', 'medecin.specialite')
            ->whereHas('mission', function ($query) {
                $query->where('id_hopital', auth()->user()->id);
            })
            ->latest()
            ->paginate(10);

        return view('candidatures.index', compact('candidatures'));
    }

    // Liste des candidatures du médecin
    public function index()
    {
        $candidatures = Candidature::with('mission')
            ->where('id_medecin', auth()->user()->id)
            ->latest()
            ->paginate(10);

        return view('candidatures.index', compact('candidatures'));
    }

    // Formulaire de création d'une candidature
    public function create(Request $request)
{
    $missions = Mission::where('statut', 'ouverte')
        ->latest()
        ->get();

    $id_mission = $request->id_mission;

    return view('candidatures.create', compact(
        'missions',
        'id_mission'
    ));
}
    // Enregistrer une candidature
    public function store(Request $request)
    {
        $this->authorize('create', Candidature::class);

        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'CV' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'date_candidature' => ['required', 'date'],
            'id_mission' => ['required', 'exists:missions,id_mission'],
        ]);

        // Vérifier si le médecin a déjà postulé à cette mission
        $dejaCandidature = Candidature::where('id_medecin', auth()->user()->id)
            ->where('id_mission', $validated['id_mission'])
            ->exists();

        if ($dejaCandidature) {
            return back()
                ->withInput()
                ->with('error', 'Vous avez déjà postulé à cette mission.');
        }

        $validated['id_medecin'] = auth()->user()->id;
        $validated['statut'] = 'en_attente';

        $candidature = Candidature::create($validated);

event(new NouvelleCandidature($candidature));

return redirect()->route('candidatures.index')
    ->with('success', 'Votre candidature a été envoyée avec succès.');
    }

    // Afficher une candidature
    public function show(Candidature $candidature)
    {
        $this->authorize('view', $candidature);

        $candidature->load('mission', 'medecin');

        return view('candidatures.show', compact('candidature'));
    }

    // Formulaire de modification
    public function edit(Candidature $candidature)
    {
        $this->authorize('update', $candidature);

        if ($candidature->statut !== 'en_attente') {
            return redirect()
                ->route('candidatures.index')
                ->with('error', 'Cette candidature ne peut plus être modifiée.');
        }

        $missions = Mission::where('statut', 'ouverte')->get();

        return view('candidatures.edit', compact('candidature', 'missions'));
    }

    // Modifier une candidature
    public function update(Request $request, Candidature $candidature)
    {
        $this->authorize('update', $candidature);

        if ($candidature->statut !== 'en_attente') {
            return redirect()
                ->route('candidatures.index')
                ->with('error', 'Cette candidature ne peut plus être modifiée.');
        }

        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'CV' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'date_candidature' => ['required', 'date'],
            'id_mission' => ['required', 'exists:missions,id_mission'],
        ]);

        $candidature->update($validated);

        return redirect()
            ->route('candidatures.index')
            ->with('success', 'Candidature modifiée avec succès.');
    }

    // Accepter ou refuser une candidature
   public function updateStatut(Request $request, Candidature $candidature)
{
    $request->validate([
        'statut' => ['required', 'in:acceptee,refusee'],
    ]);

    $candidature->load('mission');

    $this->authorize('updateStatut', $candidature);

    $candidature->update([
        'statut' => $request->statut
    ]);

    if ($request->statut === 'acceptee') {

        $nombreAcceptees = Candidature::where('id_mission', $candidature->id_mission)
            ->where('statut', 'acceptee')
            ->count();

        if ($nombreAcceptees >= $candidature->mission->nombre_de_postes) {
            $candidature->mission->update([
                'statut' => 'fermee'
            ]);
        }

        event(new CandidatureAcceptee($candidature));
    }

    if ($request->statut === 'refusee') {
        event(new CandidatureRefusee($candidature));
    }

    return redirect()
        ->route('hopital.candidatures.index')
        ->with('success', 'Statut de la candidature modifié avec succès.');
}
    // Supprimer une candidature
    public function destroy(Candidature $candidature)
    {
        $this->authorize('delete', $candidature);

        if ($candidature->statut !== 'en_attente') {
            return redirect()
                ->route('candidatures.index')
                ->with('error', 'Cette candidature ne peut plus être supprimée.');
        }

        $candidature->delete();

        return redirect()
            ->route('candidatures.index')
            ->with('success', 'Candidature supprimée avec succès.');
    }
}