<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getCategoriesByTenantUuid(string $uuid);
    public function getCategoriesByTenantId(string $idTenant);
    public function getCategoryByUuid(string $uuid);
}
