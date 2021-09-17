<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'categories';
    }

    public function getCategoriesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)
                    ->join('tenants', 'tenants.id', '=', 'categories.tenant_id')
                    ->where('tenants.uuid', $uuid)
                    ->select('categories.*')
                    ->get();
    }

    public function getCategoriesByTenantId(string $idTenant)
    {
        return DB::table($this->table)->where('tenant_id', $idTenant)->get();
    }
}
