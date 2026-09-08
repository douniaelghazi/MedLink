<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    // Afficher la liste des spécialités
    public function index()
    {
        $this->authorize('viewAny', Specialite::class);

        $specialites = Specialite::orderBy('nom')->paginate(10);

        return view('specialites.index', compact('specialites'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $this->authorize('create', Specialite::class);

        return view('specialites.create');
    }

    // Enregistrer une nouvelle spécialité
    public function store(Request $request)
    {
        $this->authorize('create', Specialite::class);

        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Specialite::create($validated);

        return redirect()
            ->route('specialites.index')
            ->with('success', 'Spécialité ajoutée avec succès.');
    }

    // Afficher une spécialité
    public function show(Specialite $specialite)
    {
        $this->authorize('view', $specialite);

        return view('specialites.show', compact('specialite'));
    }

    // Afficher le formulaire de modification
    public function edit(Specialite $specialite)
    {
        $this->authorize('update', $specialite);

        return view('specialites.edit', compact('specialite'));
    }

    // Modifier une spécialité
    public function update(Request $request, Specialite $specialite)
    {
        $this->authorize('update', $specialite);

        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $specialite->update($validated);

        return redirect()
            ->route('specialites.index')
            ->with('success', 'Spécialité modifiée avec succès.');
    }

    // Supprimer une spécialité
    public function destroy(Specialite $specialite)
    {
        $this->authorize('delete', $specialite);

        $specialite->delete();

        return redirect()
            ->route('specialites.index')
            ->with('success', 'Spécialité supprimée avec succès.');
    }
}