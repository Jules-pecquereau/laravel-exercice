<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Univers;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Univers>
 */
class UniversFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'=>$this->faker->name,
            'description'=>$this->faker->text(5),
            "lien_vers_l'image"=>$this->faker->text(100),
            "lien_vers_le_logo"=>$this->faker->text(100),
            'couleur_principale'=>$this->faker->hexcolor(),
            'couleur_secondaire'=>$this->faker->hexcolor(),
        ];
    }
}
