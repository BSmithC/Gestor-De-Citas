<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalHistory>
 */
class MedicalHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'diagnosis' => $this->faker->word,
            'reason' => $this->faker->sentence,
            'symptoms' => $this->faker->sentence,
            'diagnosis_description' => $this->faker->paragraph,
            'description' => $this->faker->sentence,
            'blood_pressure' => $this->faker->word,
            'temperature' => $this->faker->word,
            'weight' => $this->faker->word,
            'heart_rate' => $this->faker->word,
            'observation' => $this->faker->sentence,
            'patient_id' => $this->faker->numberBetween(1,10),
            'doctor_id' => $this->faker->numberBetween(1,10),
            'drug_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
