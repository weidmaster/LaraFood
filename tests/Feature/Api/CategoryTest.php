<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Tenant;
use App\Models\Category;

class CategoryTest extends TestCase
{
    /**
     * Error get Categories by Tenant
     *
     * @return void
     */
    public function testErrorGetAllCategoriesByTenant()
    {
        $response = $this->getJson('/api/v1/categories');

        $response->assertStatus(422);
    }

    /**
     * Get Categories by Tenant
     *
     * @return void
     */
    public function testGetAllCategoriesByTenant()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/categories/?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }

    /**
     * Error get single Category
     *
     * @return void
     */
    public function testErrorGetCategoryByIdentify()
    {
        $category = 'fake_value';
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/categories/{$category}?token_company={$tenant->uuid}");

        $response->assertStatus(404);
    }

    /**
     * Get single Category
     *
     * @return void
     */
    public function testGetCategoryByIdentify()
    {
        $category = factory(Category::class)->create();
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/categories/{$category->uuid}?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }
}
