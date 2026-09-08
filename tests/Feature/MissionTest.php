<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_hopital_can_view_his_missions(): void
    {
        $hopital = User::factory()->create([
            'role' => 'hopital',
        ]);

        $response = $this->actingAs($hopital)
            ->get(route('missions.index'));

        $response->assertStatus(200);
    }

    public function test_medecin_can_view_open_missions(): void
{
    $medecin = User::factory()->create([
        'role' => 'medecin',
    ]);

    $response = $this->actingAs($medecin)
        ->get(route('medecin.missions.index'));

    $response->assertStatus(200);
}

    public function test_medecin_cannot_access_hopital_missions(): void
{
    $medecin = User::factory()->create([
        'role' => 'medecin',
    ]);

    $response = $this->actingAs($medecin)
        ->get(route('missions.index'));

    $response->assertForbidden();
}

    
}