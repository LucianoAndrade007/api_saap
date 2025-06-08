<?php

namespace Tests\Feature;
use App\Models\User;
use Tests\TestCase;
use App\Models\TipoReclamo;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TipoReclamoUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_actualizar_un_tipo_de_reclamo()
    {
        $user = User::factory()->create();

        $tipo = TipoReclamo::create([
            'name' => 'Fuga antigua',
            'status' => 1,
        ]);

        $payload = ['name' => 'Fuga actualizada'];

        $response = $this->actingAs($user, 'sanctum')
                        ->json('PATCH', "/api/tipos-reclamos/{$tipo->id_claims_type}", $payload);
        //$response->dump(); // muestra cuerpo
        //$response->dumpSession(); // muestra sesión
        //$response->dumpHeaders(); // muestra headers
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Tipo de reclamo actualizado',
                'data' => [
                    'id_claims_type' => $tipo->id_claims_type,
                    'name' => 'Fuga actualizada',
                ],
            ]);

    }
}
