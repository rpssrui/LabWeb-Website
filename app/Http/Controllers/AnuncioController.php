<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUrlGenerator;
use App\Models\Candidatura;

class AnuncioController extends Controller
{
	
	public function searchAnuncio(Request $request)
	{
		$nome = $_GET['nome'];
		$regiao = $_GET['regiao'];
		$tipo = $_GET['tipo'];

		$results = Anuncio::where('titulo', 'Like',$nome.'%')
			->orwhere('regiao', $regiao)
			->orwhere('tipo', $tipo)
			->get();
			return view('anuncios.anunciosIndex', compact('results'));
		if(empty($results)){

		}
		return view('anuncios.anunciosIndex', compact('results'));
	}

	protected function createAnuncio(Request $request)
	{
		Anuncio::create([
			'descricao' => $request['descricao'],
			'titulo' => $request['titulo'],
			'tipo' => $request['tipo'],
			'idEmpresa' => Auth()->user()->id,
			'localidade' => $request['localidade'],
			'regiao' => $request['regiao'],
			'habilitacoesMinimas' => $request['habilitacoesMinimas'],
			'contactos' => $request['contactos'],
			'setorAtividade' => $request['setorAtividade'],

		]);
		return redirect()->route('meusAnuncios');
	}

	public function editAnuncio($id)
	{
		$anuncio = Anuncio::find($id);
		return view('anuncios.editarAnuncio', compact('anuncio'));
	}

	public function updateAnuncio(Request $request, $id)
	{
		$anuncio = Anuncio::where('id', $id)
			->update([
				'descricao' => $request['descricao'],
				'titulo' => $request['titulo'],
				'tipo' => $request['tipo'],
				'localidade' => $request['localidade'],
				'regiao' => $request['regiao'],
				'habilitacoesMinimas' => $request['habilitacoesMinimas'],
				'contactos' => $request['contactos'],
				'setorAtividade' => $request['setorAtividade'],
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

	public function showVerMais($id)
	{
		$anuncio = Anuncio::find($id);
		$empresa = User::find($anuncio->idEmpresa);

		return view('anuncios.verMais', compact('anuncio', 'empresa'));
	}
}
