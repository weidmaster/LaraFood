<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '154648415454564',
            'name' => 'Eduardo WB',
            'url' => 'eduardowb',
            'email' => 'contato@eduardowb.com.br'
        ]);
    }
}
