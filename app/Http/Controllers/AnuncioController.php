<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUrlGenerator;

class AnuncioController extends Controller
{
 

    /* public function searchAnuncio(Request $request){
        $results=Anuncio::query();
        if(request('pesquisar')){
            $results->where('titulo','Like','%'.request('pesquisar').'%');
        }
        $results->orderBy('id','DESC');
        return view('anuncios.anunciosIndex',compact('results'));
    }*/
    public function searchAnuncio(Request $request)
    {

       $pesquisar=$_GET['pesquisar'];
       $results=Anuncio::where('titulo','Like','%'.$pesquisar.'%')->get();
        return view('anuncios.anunciosIndex', compact('results'));
    }

    protected function createAnuncio(Request $request)
		{
			 Anuncio::create([
				'descricao' => $request['descricao'],
				'titulo' => $request['titulo'],
				'tipo' => $request['tipo'],
				'idEmpresa' => $request['idEmpresa'],
				'localidade'=>$request['localidade'],
				'regiao'=>$request['regiao'],
				'habilitacoes minimas'=>$request['habilitacoes minimas'],
				'contactos'=>$request['contactos'],
				'setor de atividade'=>$request['setor de atividade'],
				
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
					'localidade'=>$request['localidade'],
					'regiao'=>$request['regiao'],
					'habilitacoes minimas'=>$request['habilitacoes minimas'],
					'contactos'=>$request['contactos'],
					'setorAtividade'=>$request['setorAtividade'],
			]);

			return redirect(route('meusAnuncios'));
		}

    public function showCriarAnuncio()
    {

        return view('anuncios.criarAnuncio');
    }

    public function showMeusAnuncios()
    {
        $anuncios = Anuncio::all();
        return view('anuncios.meusAnuncios', ['anuncios' => $anuncios]);
    }
    public function deleteAnuncio($id)
    {
        $anuncio = Anuncio::where('id', $id)->firstOrFail();
        $anuncio->delete();
        return redirect(route('meusAnuncios'));
    }
}
