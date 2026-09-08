<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HopitalDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_hopital_can_view_hopital_dashboard(): void
    {
        $hopital = User::factory()->create([
            'role' => 'hopital',
        ]);

        $response = $this->actingAs($hopital)
            ->get(route('hopital.dashboard'));

        $response->assertStatus(200);
    }

    public function test_medecin_cannot_access_hopital_dashboard(): void
    {
        $medecin = User::factory()->create([
            'role' => 'medecin',
        ]);

        $response = $this->actingAs($medecin)
            ->get(route('hopital.dashboard'));

        $response->assertForbidden();
    }

    public function test_admin_cannot_access_hopital_dashboard(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)
            ->get(route('hopital.dashboard'));

        $response->assertForbidden();
    }
}