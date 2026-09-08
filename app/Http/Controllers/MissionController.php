<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Specialite;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    // Hôpital : voir ses missions
    public function index()
    {
        $missions = Mission::with('hopital')
            ->where('id_hopital', auth()->user()->id)
            ->latest()
            ->paginate(10);

        return view('missions.index', compact('missions'));
    }

    // Hôpital : créer une mission
  public function create()
{
    $specialites = Specialite::orderBy('nom')->get();

    return view('missions.create', compact('specialites'));
}

    // Hôpital : enregistrer une mission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'specialite_recherchee' => ['required', 'string', 'max:255'],
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'budget' => ['required', 'numeric', 'min:0'],
            'ville' => ['required', 'string', 'max:255'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after_or_equal:date_debut'],
            'nombre_de_postes' => ['required', 'integer', 'min:1'],
            'niveau_d_experience' => ['required', 'in:Débutant,Intermédiaire,Expérimenté'],
            'statut' => ['required', 'in:ouverte,fermee,annulee'],
        ]);

        $validated['id_hopital'] = auth()->user()->id;

        Mission::create($validated);

        return redirect()
            ->route('missions.index')
            ->with('success', 'Mission créée avec succès.');
    }

    // Médecin : voir les missions ouvertes
   public function disponibles(Request $request)
{
    $query = Mission::where('statut', 'ouverte');

    if ($request->filled('recherche')) {
        $recherche = $request->recherche;

        $query->where(function ($q) use ($recherche) {
            $q->where('titre', 'like', "%$recherche%")
              ->orWhere('specialite_recherchee', 'like', "%$recherche%")
              ->orWhere('ville', 'like', "%$recherche%");
        });
    }

    if ($request->filled('ville')) {
        $query->where('ville', 'like', "%{$request->ville}%");
    }

    if ($request->filled('specialite')) {
        $query->where('specialite_recherchee', 'like', "%{$request->specialite}%");
    }

    $missions = $query->latest()->paginate(10)->withQueryString();

    return view('medecin.missions', compact('missions'));
}
    // Hôpital : voir une mission
    public function show(Mission $mission)
{
    $this->authorize('view', $mission);

    $mission->load('hopital');

    return view('missions.show', compact('mission'));
}

    // Hôpital : modifier une mission
    public function edit(Mission $mission)
{
    $this->authorize('update', $mission);

    $specialites = Specialite::orderBy('nom')->get();

    return view('missions.edit', compact('mission', 'specialites'));
}

    // Hôpital : mettre à jour une mission
    public function update(Request $request, Mission $mission)
{
    $this->authorize('update', $mission);

    $validated = $request->validate([
        'specialite_recherchee' => ['required', 'string', 'max:255'],
        'titre' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'budget' => ['required', 'numeric', 'min:0'],
        'ville' => ['required', 'string', 'max:255'],
        'date_debut' => ['required', 'date'],
        'date_fin' => ['required', 'date', 'after_or_equal:date_debut'],
        'nombre_de_postes' => ['required', 'integer', 'min:1'],
        'niveau_d_experience' => ['required', 'in:Débutant,Intermédiaire,Expérimenté'],
        'statut' => ['required', 'in:ouverte,fermee,annulee'],
    ]);

    $mission->update($validated);

    return redirect()->route('missions.index')
        ->with('success', 'Mission modifiée avec succès.');
}
    // Hôpital : supprimer une mission
   public function destroy(Mission $mission)
{
    $this->authorize('delete', $mission);

    $mission->delete();

    return redirect()->route('missions.index')
        ->with('success', 'Mission supprimée avec succès.');
}

    // Médecin : voir le détail d'une mission ouverte
public function medecinShow(Mission $mission)
{
    if ($mission->statut !== 'ouverte') {
        abort(404);
    }

    return view('medecin.mission-show', compact('mission'));
}
}