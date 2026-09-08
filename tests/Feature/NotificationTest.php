<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Hopital;
use App\Models\Mission;
use App\Models\Medecin;
use App\Models\Specialite;
use App\Models\Candidature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_medecin_receives_notification_when_candidature_is_accepted(): void
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

        $candidature = Candidature::create([
            'nom' => 'Test Médecin',
            'CV' => 'cv-test.pdf',
            'message' => 'Je souhaite postuler.',
            'date_candidature' => '2026-09-08',
            'statut' => 'en_attente',
            'id_medecin' => $medecin->id,
            'id_mission' => $mission->id_mission,
        ]);

        $this->actingAs($hopitalUser)
            ->patch(route('hopital.candidatures.statut', $candidature), [
                'statut' => 'acceptee',
            ]);

        $this->assertDatabaseHas('notifications', [
            'notifiable_id' => $medecin->id,
            'notifiable_type' => User::class,
        ]);
    }

    public function test_medecin_receives_notification_when_candidature_is_refused(): void
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

    $candidature = Candidature::create([
        'nom' => 'Test Médecin',
        'CV' => 'cv-test.pdf',
        'message' => 'Je souhaite postuler.',
        'date_candidature' => '2026-09-08',
        'statut' => 'en_attente',
        'id_medecin' => $medecin->id,
        'id_mission' => $mission->id_mission,
    ]);

    $this->actingAs($hopitalUser)
        ->patch(route('hopital.candidatures.statut', $candidature), [
            'statut' => 'refusee',
        ]);

    $this->assertDatabaseHas('notifications', [
        'notifiable_id' => $medecin->id,
        'notifiable_type' => User::class,
    ]);
}
}