<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Candidatura;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUrlGenerator;
use Illuminate\Support\Collection;

class CandidaturaController extends Controller
{   
    public function showRespostaForm($id){
        $candidatura=Candidatura::find($id);
        return view('anuncios.resposta', ['candidatura' => $candidatura]);
    }
    public function showCandidaturas($id)
    {
        $candidaturasAUX = Candidatura::all();
        $candidaturas = $candidaturasAUX->where('idAnuncio', $id);
        
        if (sizeof($candidaturas)==0) {
            echo "sadisdabnsdapsd";
            return redirect()->back()->with('error', 'Não existem Candidaturas para esse anúncio.');
        }
        return view('anuncios.Candidaturas', ['candidaturas' => $candidaturas]);
    }

    public function enviarCandidatura($idAnuncio, Request $request)
    {
        Candidatura::create([
            'nomeCandidato' => Auth()->user()->firstName,
            'idCandidato' => Auth()->user()->id,
            'emailCandidato' => Auth()->user()->email,
            'idAnuncio' => $idAnuncio,
            'mensagem' => $request['mensagem'],
        ]);
        return view('home');
    }
}
