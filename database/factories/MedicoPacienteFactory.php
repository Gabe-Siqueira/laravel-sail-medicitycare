<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MedicoPaciente;
use App\Models\Medico;
use App\Models\Paciente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicoPaciente>
 */
class MedicoPacienteFactory extends Factory
{
    protected $model = MedicoPaciente::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'medico_id' => Medico::factory()->create()->id,
            'paciente_id' => Paciente::factory()->create()->id,
        ];
    }
}
