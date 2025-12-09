<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Patient::factory(100)->create();
        // $this->call(PatientSeeder::class);

        \App\Models\Drug::factory(100)->create();
        // $this->call(DrugSeeder::class);
        
        \App\Models\Bill::factory(100)->create();

        \App\Models\BillDetail::factory(100)->create();
        
        \App\Models\User::factory(100)->create();

        \App\Models\Appointment::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
