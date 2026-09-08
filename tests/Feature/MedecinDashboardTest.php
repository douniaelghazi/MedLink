<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MedecinDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_medecin_can_view_medecin_dashboard(): void
    {
        $medecin = User::factory()->create([
            'role' => 'medecin',
        ]);

        $response = $this->actingAs($medecin)
            ->get(route('medecin.dashboard'));

        $response->assertStatus(200);
    }

    public function test_admin_cannot_access_medecin_dashboard(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)
            ->get(route('medecin.dashboard'));

        $response->assertForbidden();
    }

    public function test_hopital_cannot_access_medecin_dashboard(): void
    {
        $hopital = User::factory()->create([
            'role' => 'hopital',
        ]);

        $response = $this->actingAs($hopital)
            ->get(route('medecin.dashboard'));

        $response->assertForbidden();
    }
}