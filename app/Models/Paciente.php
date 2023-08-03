<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'paciente';

    protected $fillable = [
        'nome', 'cpf', 'celular',
    ];

    protected $dates = ['deleted_at'];

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'medico_paciente', 'paciente_id', 'medico_id');
    }
}
