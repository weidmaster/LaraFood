<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Tenant;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Error get all Products by Tenant
     *
     * @return void
     */
    public function testErrorGetAllProductsByTenant()
    {
        $tenant = 'fake_value';

        $response = $this->getJson("/api/v1/products?token_company={$tenant}");

        $response->assertStatus(422);
    }

    /**
     * Get all Products by Tenant
     *
     * @return void
     */
    public function testGetAllProductsByTenant()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/products?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }

    /**
     * Product not found (404)
     *
     * @return void
     */
    public function testNotFoundProduct()
    {
        $product = 'fake_value';
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/products/{$product}?token_company={$tenant->uuid}");

        $response->assertStatus(404);
    }

    /**
     * Get Product by identify
     *
     * @return void
     */
    public function testGetProductByIdentify()
    {
        $product = factory(Product::class)->create();
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/products/{$product->uuid}?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }
}
