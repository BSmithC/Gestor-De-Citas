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

<<<<<<< HEAD
<<<<<<< HEAD
        \App\Models\Patient::factory(10)->create();
        // $this->call(PatientSeeder::class);

        \App\Models\Drug::factory(10)->create();
        // $this->call(DrugSeeder::class);
        
        \App\Models\Bill::factory(10)->create();

        \App\Models\BillDetail::factory(10)->create();
        
        \App\Models\User::factory(10)->create();

        \App\Models\Appointment::factory(10)->create();

        \App\Models\MedicalHistory::factory(10)->create();
=======
        \App\Models\Patient::factory(50)->create();
=======
        \App\Models\Patient::factory(100)->create();
>>>>>>> 7800c40 (Modificaciones de Show, index, controller, etc...)
        // $this->call(PatientSeeder::class);

        \App\Models\Drug::factory(100)->create();
        // $this->call(DrugSeeder::class);
        
        \App\Models\Bill::factory(100)->create();

        \App\Models\BillDetail::factory(100)->create();
        
        \App\Models\User::factory(100)->create();

<<<<<<< HEAD
        \App\Models\Appointment::factory(50)->create();
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
=======
        \App\Models\Appointment::factory(100)->create();
>>>>>>> 7800c40 (Modificaciones de Show, index, controller, etc...)

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
