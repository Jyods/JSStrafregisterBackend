<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Entry;
use App\Models\Law;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EntryLaw>
 */
class EntryLawFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'entry_id' => $this->faker->randomElement(Entry::get()),
            'law_id' => $this->faker->randomElement(Law::get()),
        ];
    }
}
