<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomeCandidato',
        'emaiCandidato',
        'dataCandidatura',
        'mensagem',
        'idCandidato',
        'emailCandidato',
        'idAnuncio',
    ];

    public function anuncio(){
        return $this->belongsTo(Anuncio::class,'idAnuncio','id');
    }

    public function candidatos()
    {
        return $this->hasMany(User::class, 'idCandidato', 'id');
    }

}

