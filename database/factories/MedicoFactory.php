<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Medico;
use App\Models\Cidade;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    protected $model = Medico::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'especialidade' => $this->faker->randomElement(['Cardiologista', 'Pediatra', 'Dermatologista', 'Ginecologista', 'Obstetrícia', 'Ortopedia']),
            'cidade_id' => Cidade::factory()->create()->id,
        ];
    }
}
