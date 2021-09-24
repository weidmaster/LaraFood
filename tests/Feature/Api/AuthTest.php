<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Tests\TestCase;
use Illuminate\Support\Str;

class AuthTest extends TestCase
{
    /**
     * Validation Auth
     *
     * @return void
     */
    public function testValidationAuth()
    {
        $response = $this->postJson('/api/auth/token');

        $response->assertStatus(422);
    }

    /**
     * Auth Client fake
     *
     * @return void
     */
    public function testAuthClientFake()
    {
        $payload = [
            'email' => 'fakemail@test.com.br',
            'password' => '8798465',
            'device_name' => Str::random(10)
        ];

        $response = $this->postJson('/api/auth/token', $payload);

        $response->assertStatus(404)
            ->assertExactJson([
                'message' => trans('messages.invalid_credentials')
            ]);
    }

    /**
     * Auth success
     *
     * @return void
     */
    public function testAuthSuccess()
    {
        $client = factory(Client::class)->create();

        $payload = [
            'email' => $client->email,
            'password' => 'password',
            'device_name' => Str::random(10)
        ];

        $response = $this->postJson('/api/auth/token', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }
}
