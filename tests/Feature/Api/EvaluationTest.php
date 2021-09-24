<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Client;
use Illuminate\Support\Str;

class EvaluationTest extends TestCase
{
    /**
     * Error create new Evaluation
     *
     * @return void
     */
    public function testErrorCreateNewEvaluation()
    {
        $order = 'fake_value';

        $response = $this->postJson("/api/auth/v1/orders/{$order}/evaluations");

        $response->assertStatus(401);
    }

    /**
     * Create new Evaluation
     *
     * @return void
     */
    public function testCreateNewEvaluation()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;

        $order = $client->orders()->save(factory(Order::class)->make());

        $payload = [
            'stars' => 5,
            'comment' => Str::random(10)
        ];

        $headers = [
            'Authorization' => "Bearer {$token}"
        ];

        $response = $this->postJson(
            "/api/auth/v1/orders/{$order->identify}/evaluations",
            $payload,
            $headers
        );

        $response->assertStatus(201);
    }
}
