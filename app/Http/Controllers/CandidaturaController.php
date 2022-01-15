<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Candidatura;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUrlGenerator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;



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
           
           /* $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');*/

            if ($request->hasFile('file')) {
                $filename = $request->file->getClientOriginalName();
                $filePath = $request->file->storeAs('uploads',$filename,'public');
                error_log($filePath);
           
                /*Debugbar::info($filename);*/
            }

        Candidatura::create([
            'nomeCandidato' => Auth()->user()->firstName,
            'idCandidato' => Auth()->user()->id,
            'emailCandidato' => Auth()->user()->email,
            'file_name' => $filename,
            'file_path'=>  $filePath,
            'idAnuncio' => $idAnuncio,
            'mensagem' => $request['mensagem'],
        ]);
        return redirect()->route('home')->with('success','Candidatura enviada com sucesso!');
    }
   
}