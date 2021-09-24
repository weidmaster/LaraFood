<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Table;
use App\Models\Tenant;

class TableTest extends TestCase
{
    /**
     * Error get Tables by Tenant
     *
     * @return void
     */
    public function testErrorGetAllTablesByTenant()
    {
        $response = $this->getJson('/api/v1/tables');

        $response->assertStatus(422);
    }

    /**
     * Get Tables by Tenant
     *
     * @return void
     */
    public function testGetAllTablesByTenant()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tables/?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }

    /**
     * Error get single Table
     *
     * @return void
     */
    public function testErrorGetTableByIdentify()
    {
        $table = 'fake_value';
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tables/{$table}?token_company={$tenant->uuid}");

        $response->assertStatus(404);
    }

    /**
     * Get single Table
     *
     * @return void
     */
    public function testGetTableByIdentify()
    {
        $table = factory(Table::class)->create();
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tables/{$table->uuid}?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }
}
