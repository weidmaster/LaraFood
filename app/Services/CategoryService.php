<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryService
{
    protected $categoryRepository;
    protected $tenantRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        TenantRepositoryInterface $tenantRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getCategoriesByUuid(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->categoryRepository->getCategoriesByTenantId($tenant->id);
    }

    public function getCategoryByUrl(string $url)
    {
        return $this->categoryRepository->getCategoryByUrl($url);
    }
}
