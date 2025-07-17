<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BillDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bills_id' => $this->faker->numberBetween(1, 10), // Asumiendo que hay 10 facturas en la base de datos
            'service' => $this->faker->text(), // Asumiendo que hay servicio
            'hour' => $this->faker->time(1, 0, 24),
            'price' => $this->faker->randomFloat(1, 0, 10000),
        ];
    }
}
