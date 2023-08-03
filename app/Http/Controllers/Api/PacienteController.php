<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePacienteFormRequest;
use App\Http\Requests\Api\UpdatePacienteFormRequest;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function index()
    {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }

    public function listarPorMedico($id_medico)
    {
        $medico = Medico::find($id_medico);
        if (!$medico) {
            return response()->json(['message' => 'Médico não encontrado.'], 404);
        }
        $pacientes = $medico->pacientes;

        return response()->json(['pacientes' => $pacientes]);
    }

    public function store(StorePacienteFormRequest $request)
    {
        $data = $request->validated();
        $paciente = Paciente::create($data);
        return response()->json($paciente, 201);
    }

    public function update(UpdatePacienteFormRequest $request, Paciente $id_paciente)
    {
        $data = $request->only(['nome', 'celular']);

        $id_paciente->fill($data);
        $id_paciente->update();

        return response()->json($id_paciente, 201);
    }
}
