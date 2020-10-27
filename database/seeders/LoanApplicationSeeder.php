<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LoanApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\LoanApplication::factory(10)->create();
    }
}
