<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\vincularPacienteMedicoFormRequest;
use App\Models\Cidade;
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

    public function listarPorCidade($id_cidade)
    {
        $cidade = Cidade::find($id_cidade);
        if (!$cidade) {
            return response()->json(['message' => 'Cidade não encontrada'], 404);
        }
        $medicos = $cidade->medicos;

        return response()->json(['medicos' => $medicos]);
    }

    public function vincularPaciente(vincularPacienteMedicoFormRequest $request)
    {
        $data = $request->only(['medico_id', 'paciente_id']);
        $medicoId = $data['medico_id'];
        $pacienteId = $data['paciente_id'];

        $medico = Medico::find($medicoId);
        $paciente = Paciente::find($pacienteId);

        if (!$medico) {
            return response()->json(['error' => 1, 'message' => 'Médico não encontrado'], 404);
        }

        if (!$paciente) {
            return response()->json(['error' => 1, 'message' => 'Paciente não encontrado'], 404);
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
