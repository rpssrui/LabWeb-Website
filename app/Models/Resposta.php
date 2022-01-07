<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = [
        'resposta',
        'idCandidatura'
    ];

    public function candidatura(){
        return $this->belongsTo(Candidatura::class,'idCandidatura','id');
    }
}
