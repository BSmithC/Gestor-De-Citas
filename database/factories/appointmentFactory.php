<?php

namespace Database\Factories;

use App\Models\appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    protected $model = appointment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('now', '+1 week');
        $end = (clone $start)->modify('+1 hour');

        return [
            'title' => $this->faker->sentence(3),
            'doctor_id' => $this->faker->numberBetween(1,10), // O usa un ID fijo si ya tienes datos
            'patient_id' => $this->faker->numberBetween(1,10),
            'attended' => $this->faker->boolean(),
            'date' => $start->format('Y-m-d'),
            'starttime' => $start->format('H:i:s'),
            'endtime' => $end->format('H:i:s'),
            'active' => $this->faker->boolean(),
        ];
    }
}
