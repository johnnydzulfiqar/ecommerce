<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kategori_produk' => $this->faker->randomElement(['Baju', 'Celana', 'Outer']),
            'nama_produk' => $this->faker->firstNameMale,
            'stok' => $this->faker->numberBetween(int1: 10, int2: 100),
            'harga_produk' => $this->faker->numberBetween(int1: 10000, int2: 1500000),
        ];
    }
}
