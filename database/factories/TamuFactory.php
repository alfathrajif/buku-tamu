<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tamu>
 */
class TamuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_lengkap' => fake()->name(),
            'alamat' => fake()->state(),
            'no_hp' => fake()->phoneNumber(),
            'event_id' => fake()->numberBetween(1, 10),
            'tanggal' => fake()->unique()->date(),
            'waktu' => fake()->time(),
        ];
    }
}
