<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::all();
        return response()->json($cidades);
    }

    public function medicosPorCidade($cidadeId)
    {
        $cidade = Cidade::with('medicos')->find($cidadeId);

        if (!$cidade) {
            return response()->json(['message' => 'Cidade não encontrada'], 404);
        }

        $medicos = $cidade->medicos;
        return response()->json($medicos);
    }
}
