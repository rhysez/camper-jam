<?php

namespace Database\Factories;

use App\Enums\Wheelbase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Van>
 */
class VanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $manufacturers = [
            ['name' => 'Volkswagen', 'model' => 'Transporter'],
            ['name' => 'Ford', 'model' => 'Transit'],
            ['name' => 'Vauxhall', 'model' => 'Vivaro'],
            ['name' => 'Renault', 'model' => 'Trafic'],
        ];

        $randManufacturer = fake()->randomElement($manufacturers);

        return [
            'user_id' => User::factory(),
            'manufacturer_name' => $randManufacturer['name'],
            'model_name' => $randManufacturer['model'],
            'nickname' => null,
            'is_primary' => fake()->boolean(0.5),
            'wheelbase' => fake()->randomElement(Wheelbase::cases())->value,
        ];
    }
}
