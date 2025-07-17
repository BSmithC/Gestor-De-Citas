<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'drug_id' => $this->faker->numberBetween(1, 10), // Asumiendo que hay 10 drogas en la base de datos
            'patient_id' => $this->faker->numberBetween(1, 10), // Asumiendo que hay 10 pacientes en la base de datos
            'users_id' => $this->faker->numberBetween(1, 10), // Asumiendo que hay 10 usuarios en la base de datos
            'itbis' => $this->faker->randomFloat(2, 0, 100),
            'sub_total' => $this->faker->randomFloat(2, 0, 1000),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'payment_type' => $this->faker->randomElement(['credit_card', 'cash', 'insurance']),
            'status' => $this->faker->boolean,
        ];
    }
}
