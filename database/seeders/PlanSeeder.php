<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'Básico',
            'price_monthly' => 49.90,
            'price_yearly' => 499.00,
            'max_members' => 100,
            'max_users' => 2,
            'features' => ['Membros', 'Relatórios básicos']
        ]);

        Plan::create([
            'name' => 'Profissional',
            'price_monthly' => 99.90,
            'price_yearly' => 999.00,
            'max_members' => 500,
            'max_users' => 5,
            'features' => ['Membros', 'Documentos', 'Relatórios completos']
        ]);

        Plan::create([
            'name' => 'Premium',
            'price_monthly' => 199.90,
            'price_yearly' => 1999.00,
            'max_members' => 9999,
            'max_users' => 20,
            'features' => ['Tudo liberado']
        ]);
    }
}
