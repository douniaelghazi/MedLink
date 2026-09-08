<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Specialite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SpecialiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_specialites(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)
            ->get(route('specialites.index'));

        $response->assertStatus(200);
    }

    public function test_admin_can_create_specialite(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)
            ->post(route('specialites.store'), [
                'nom' => 'Cardiologie',
                'description' => 'Spécialité du cœur.',
            ]);

        $response->assertRedirect(route('specialites.index'));

        $this->assertDatabaseHas('specialites', [
            'nom' => 'Cardiologie',
            'description' => 'Spécialité du cœur.',
        ]);
    }

    public function test_medecin_cannot_access_specialites(): void
    {
        $medecin = User::factory()->create([
            'role' => 'medecin',
        ]);

        $response = $this->actingAs($medecin)
            ->get(route('specialites.index'));

        $response->assertForbidden();
    }
}