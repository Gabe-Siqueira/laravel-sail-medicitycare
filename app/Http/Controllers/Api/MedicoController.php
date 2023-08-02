<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MedicoFormRequest;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return response()->json($medicos);
    }

    public function store(MedicoFormRequest $request)
    {
        $dadosMedico = $request->validated();
        $medico = Medico::create($dadosMedico);
        return response()->json($medico, 201);
    }

    public function vincularPaciente(Request $request)
    {
        $medicoId = $request->medico_id;
        $pacienteId = $request->paciente_id;

        $medico = Medico::find($medicoId);
        $paciente = Paciente::find($pacienteId);

        if (!$medico || !$paciente) {
            return response()->json(['error' => 1, 'message' => 'Médico ou Paciente não encontrado'], 404);
        }

        if (!$medico->pacientes()->where('paciente_id', $pacienteId)->exists()) {
            $medico->pacientes()->attach($paciente, ['created_at' => now(), 'updated_at' => now()]);
        }

        return response()->json([
            'medico' => $medico,
            'paciente' => $paciente,
        ]);
    }
}
