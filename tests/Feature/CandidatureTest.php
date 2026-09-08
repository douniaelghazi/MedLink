<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Hopital;
use App\Models\Mission;
use App\Models\Medecin;
use App\Models\Specialite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CandidatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_medecin_can_view_his_candidatures(): void
    {
        $medecin = User::factory()->create([
            'role' => 'medecin',
        ]);

        $specialite = Specialite::create([
            'nom' => 'Cardiologie',
            'description' => 'Spécialité médicale',
        ]);

        Medecin::create([
            'id_medecin' => $medecin->id,
            'nom_complet' => 'Test Médecin',
            'email' => $medecin->email,
            'telephone' => '0600000000',
            'ville' => 'Béni Mellal',
            'id_specialite' => $specialite->id_specialite,
        ]);

        $response = $this->actingAs($medecin)
            ->get(route('candidatures.index'));

        $response->assertStatus(200);
    }

    public function test_medecin_can_create_candidature(): void
    {
        // User médecin
        $medecin = User::factory()->create([
            'role' => 'medecin',
        ]);

        // Spécialité
        $specialite = Specialite::create([
            'nom' => 'Cardiologie',
            'description' => 'Spécialité médicale',
        ]);

        // Profil médecin
        Medecin::create([
            'id_medecin' => $medecin->id,
            'nom_complet' => 'Test Médecin',
            'email' => $medecin->email,
            'telephone' => '0600000000',
            'ville' => 'Béni Mellal',
            'id_specialite' => $specialite->id_specialite,
        ]);

        // User hôpital
        $hopitalUser = User::factory()->create([
            'role' => 'hopital',
        ]);

        // Profil hôpital
        $hopital = Hopital::create([
            'id_hopital' => $hopitalUser->id,
            'nom' => 'Hôpital Test',
            'type' => 'Public',
            'adresse' => 'Béni Mellal',
        ]);

        // Mission
        $mission = Mission::create([
            'id_hopital' => $hopital->id_hopital,
            'titre' => 'Mission test',
            'description' => 'Description test',
            'specialite_recherchee' => 'Cardiologie',
            'budget' => 5000,
            'ville' => 'Béni Mellal',
            'date_debut' => '2026-09-15',
            'date_fin' => '2026-09-30',
            'nombre_de_postes' => 1,
            'niveau_d_experience' => '2 ans',
            'statut' => 'ouverte',
        ]);

        // Création candidature
        $response = $this->actingAs($medecin)
            ->post(route('candidatures.store'), [
                'nom' => 'Test Médecin',
                'CV' => 'cv-test.pdf',
                'message' => 'Je souhaite postuler.',
                'date_candidature' => '2026-09-08',
                'id_mission' => $mission->id_mission,
            ]);

        // Vérifier redirection
        $response->assertRedirect(route('candidatures.index'));

        // Vérifier en base de données
        $this->assertDatabaseHas('candidatures', [
            'id_medecin' => $medecin->id,
            'id_mission' => $mission->id_mission,
            'statut' => 'en_attente',
        ]);
    }

    public function test_hopital_can_accept_candidature(): void
{
    $medecin = User::factory()->create([
        'role' => 'medecin',
    ]);

    $specialite = Specialite::create([
        'nom' => 'Cardiologie',
        'description' => 'Spécialité médicale',
    ]);

    Medecin::create([
        'id_medecin' => $medecin->id,
        'nom_complet' => 'Test Médecin',
        'email' => $medecin->email,
        'telephone' => '0600000000',
        'ville' => 'Béni Mellal',
        'id_specialite' => $specialite->id_specialite,
    ]);

    $hopitalUser = User::factory()->create([
        'role' => 'hopital',
    ]);

    $hopital = Hopital::create([
        'id_hopital' => $hopitalUser->id,
        'nom' => 'Hôpital Test',
        'type' => 'Public',
        'adresse' => 'Béni Mellal',
    ]);

    $mission = Mission::create([
        'id_hopital' => $hopital->id_hopital,
        'titre' => 'Mission test',
        'description' => 'Description test',
        'specialite_recherchee' => 'Cardiologie',
        'budget' => 5000,
        'ville' => 'Béni Mellal',
        'date_debut' => '2026-09-15',
        'date_fin' => '2026-09-30',
        'nombre_de_postes' => 1,
        'niveau_d_experience' => '2 ans',
        'statut' => 'ouverte',
    ]);

    $candidature = \App\Models\Candidature::create([
        'nom' => 'Test Médecin',
        'CV' => 'cv-test.pdf',
        'message' => 'Je souhaite postuler.',
        'date_candidature' => '2026-09-08',
        'statut' => 'en_attente',
        'id_medecin' => $medecin->id,
        'id_mission' => $mission->id_mission,
    ]);

    $response = $this->actingAs($hopitalUser)
        ->patch(route('hopital.candidatures.statut', $candidature), [
            'statut' => 'acceptee',
        ]);

    $response->assertRedirect(route('hopital.candidatures.index'));

    $this->assertDatabaseHas('candidatures', [
        'id_candidature' => $candidature->id_candidature,
        'statut' => 'acceptee',
    ]);
}

    public function test_hopital_can_refuse_candidature(): void
{
    $medecin = User::factory()->create([
        'role' => 'medecin',
    ]);

    $specialite = Specialite::create([
        'nom' => 'Cardiologie',
        'description' => 'Spécialité médicale',
    ]);

    Medecin::create([
        'id_medecin' => $medecin->id,
        'nom_complet' => 'Test Médecin',
        'email' => $medecin->email,
        'telephone' => '0600000000',
        'ville' => 'Béni Mellal',
        'id_specialite' => $specialite->id_specialite,
    ]);

    $hopitalUser = User::factory()->create([
        'role' => 'hopital',
    ]);

    $hopital = Hopital::create([
        'id_hopital' => $hopitalUser->id,
        'nom' => 'Hôpital Test',
        'type' => 'Public',
        'adresse' => 'Béni Mellal',
    ]);

    $mission = Mission::create([
        'id_hopital' => $hopital->id_hopital,
        'titre' => 'Mission test',
        'description' => 'Description test',
        'specialite_recherchee' => 'Cardiologie',
        'budget' => 5000,
        'ville' => 'Béni Mellal',
        'date_debut' => '2026-09-15',
        'date_fin' => '2026-09-30',
        'nombre_de_postes' => 1,
        'niveau_d_experience' => '2 ans',
        'statut' => 'ouverte',
    ]);

    $candidature = \App\Models\Candidature::create([
        'nom' => 'Test Médecin',
        'CV' => 'cv-test.pdf',
        'message' => 'Je souhaite postuler.',
        'date_candidature' => '2026-09-08',
        'statut' => 'en_attente',
        'id_medecin' => $medecin->id,
        'id_mission' => $mission->id_mission,
    ]);

    $response = $this->actingAs($hopitalUser)
        ->patch(route('hopital.candidatures.statut', $candidature), [
            'statut' => 'refusee',
        ]);

    $response->assertRedirect(route('hopital.candidatures.index'));

    $this->assertDatabaseHas('candidatures', [
        'id_candidature' => $candidature->id_candidature,
        'statut' => 'refusee',
    ]);
}

    public function test_medecin_cannot_change_candidature_status(): void
{
    $medecin = User::factory()->create([
        'role' => 'medecin',
    ]);

    $specialite = Specialite::create([
        'nom' => 'Cardiologie',
        'description' => 'Spécialité médicale',
    ]);

    Medecin::create([
        'id_medecin' => $medecin->id,
        'nom_complet' => 'Test Médecin',
        'email' => $medecin->email,
        'telephone' => '0600000000',
        'ville' => 'Béni Mellal',
        'id_specialite' => $specialite->id_specialite,
    ]);

    $hopitalUser = User::factory()->create([
        'role' => 'hopital',
    ]);

    $hopital = Hopital::create([
        'id_hopital' => $hopitalUser->id,
        'nom' => 'Hôpital Test',
        'type' => 'Public',
        'adresse' => 'Béni Mellal',
    ]);

    $mission = Mission::create([
        'id_hopital' => $hopital->id_hopital,
        'titre' => 'Mission test',
        'description' => 'Description test',
        'specialite_recherchee' => 'Cardiologie',
        'budget' => 5000,
        'ville' => 'Béni Mellal',
        'date_debut' => '2026-09-15',
        'date_fin' => '2026-09-30',
        'nombre_de_postes' => 1,
        'niveau_d_experience' => '2 ans',
        'statut' => 'ouverte',
    ]);

    $candidature = \App\Models\Candidature::create([
        'nom' => 'Test Médecin',
        'CV' => 'cv-test.pdf',
        'message' => 'Je souhaite postuler.',
        'date_candidature' => '2026-09-08',
        'statut' => 'en_attente',
        'id_medecin' => $medecin->id,
        'id_mission' => $mission->id_mission,
    ]);

    $response = $this->actingAs($medecin)
        ->patch(route('hopital.candidatures.statut', $candidature), [
            'statut' => 'acceptee',
        ]);

    $response->assertForbidden();
}
}