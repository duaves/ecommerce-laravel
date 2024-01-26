<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->realText(rand(20, 30));
        return [
            'name' => $name,
            'content' => $this->faker->realText(rand(150, 200)),
            'slug' => Str::slug($name),
        ];
    }
}
