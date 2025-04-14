<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employees;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 fake employees
        Employees::factory()->count(300)->create();
    }
}
