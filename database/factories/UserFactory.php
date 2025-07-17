<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'sur_name' => fake()->name(),
            'second_sur_name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'date_of_birth'=> now(),
            'phone_number' => fake()->numerify('809#######'),
            'sex' => fake()->randomElement(['masculino', 'femenino']),
            'gender' => fake()->randomElement(['masculino', 'femenino', 'no binario','otros']),
            'nacionality' => fake()->randomElement(['Republica Domicana', 'USA', 'Brazil','Mexico']),
            'address' => fake()->address(),
            // 'DNI' => fake()->unique()->numerify('########'),
            'status' => true,
            'created_at' => now(),
            'updated_at'=> now(),
            'ocupation' => fake()->randomElement(['Oftalmologo', 'Otorrinolaringolo', 'Cardiologo', 'Tecnico de Maquinaria', 'recepcionista']),
            'insurance' => fake()->randomElement(['Humano', 'Monumental', 'Universal', 'Senasa']),
            'email' => fake()->unique()->safeEmail(),
            'place_of_birth' => fake()->randomElement(['Centro Medico Guadalupe', 'HOMS', 'Centro de Especialidades', 'Dura Cura Todo','Su Casa']),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
