<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUrlGenerator;

class AnuncioController extends Controller
{
    
    protected function createAnuncio(Request $request)
    {
         Anuncio::create([
            'descricao' => $request['descricao'],
            'titulo' => $request['titulo'],
            'tipo' => $request['tipo'],
            'idEmpresa' => $request['idEmpresa'],
        ]);
       return redirect()->route('meusAnuncios');
    }

    public function editAnuncio($id){
        $anuncio= Anuncio::find($id);
        return view('anuncios.editarAnuncio', compact('anuncio'));
    }

    public function updateAnuncio(Request $request, $id)
    {
        $anuncio = Anuncio::where('id', $id)
            ->update([
                'descricao' => $request['descricao'],
                'titulo' => $request['titulo'],
                'tipo' => $request['tipo'],
        ]);

        return redirect(route('meusAnuncios'));
    }

    public function showCriarAnuncio()
    {
         
        return view('anuncios.criarAnuncio');
    }

    public function showMeusAnuncios()
    {
        $anuncios=Anuncio::all(); 
        return view('anuncios.meusAnuncios',['anuncios'=>$anuncios]);
    }
    public function deleteAnuncio($id){
        $anuncio = Anuncio::where('id', $id)->firstOrFail();
        $anuncio->delete();
        return redirect(route('meusAnuncios'));
    }
}
