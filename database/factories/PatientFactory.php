<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'DNI' => $this->faker->unique()->numerify('8##-#######-#'),
            'name' => $this->faker->firstName,
            'sur_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'second_sur_name' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date('Y-m-d', '-18 years'),
            'phone_number' => $this->faker->phoneNumber,
            'nacionality' => $this->faker->country,
            'address' => $this->faker->address,
            'gender' => $this->faker->randomElement(['Masculino', 'Femenino', 'Otro']),
            'sex' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'marital_status' => $this->faker->randomElement(['Soltero', 'Casado', 'Divorciado']),
            'ocupation' => $this->faker->jobTitle,
            'place_of_birth' => $this->faker->city,
            'blood_type' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'insurance' => $this->faker->randomElement(['Universal','Humano','Palic','Mapfre Salud','SEMMA','Metromed',
            'Futuro','SER','Ever','Salud Total','CIMA','Familiar']),
            'status' => $this->faker->boolean,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
