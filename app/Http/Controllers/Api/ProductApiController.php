<?php

namespace App\Http\Controllers\Api;

use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\ProductResource;

class ProductApiController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function productsByTenant(TenantFormRequest $request)
    {
        $products = $this->productService->getProductsByTenantUuid($request->token_company);

        return ProductResource::collection($products);
    }
}
