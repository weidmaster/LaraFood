<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Test get all Tenants.
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        factory(Tenant::class, 10)->create();

        $response = $this->get('/api/v1/tenants');

        $response->assertStatus(200)
            ->assertJsonCount(10, 'data');
    }

    /**
     * Test get error single Tenant
     *
     * @return void
     */
    public function testErrorGetTenant()
    {
        $tenant = 'fake_value';

        $response = $this->get("/api/v1/tenants/{$tenant}");

        $response->assertStatus(404);
    }

    /**
     * Test get single Tenant
     *
     * @return void
     */
    public function testGetTenantByIdentify()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->get("/api/v1/tenants/{$tenant->uuid}");

        $response->assertStatus(200);
    }
}
