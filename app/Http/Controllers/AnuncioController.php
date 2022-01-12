<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUrlGenerator;
use App\Models\Candidatura;

class AnuncioController extends Controller
{

	public function report($id)
	{
		Anuncio::find($id)->increment('nrReports', 1);
		return back()->with('report', 'O anúncio foi reportado, um admistrador irá tentar resolver o problema. Obrigado!');
	}

	public function searchAnuncio(Request $request)
	{
		$nome = $request['nome'];
		$regiao = $request['regiao'];
		$tipo = $request['tipo'];

		$results = Anuncio::where('titulo', 'Like', '%' . $nome . '%')
			->orwhere('regiao', $regiao)
			->orwhere('tipo', $tipo)
			->get();
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
			'nrReports' => 0,

		]);
		return redirect()->route('/meusAnuncios');
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

		return redirect(route('/meusAnuncios'));
	}

	public function meshowCriarAnuncio()
	{

		return view('anuncios.criarAnuncio');
	}

	public function showMeusAnuncios()
	{
		$anuncios = Anuncio::where('idEmpresa', Auth()->user()->id)->paginate(3);
		if (sizeof($anuncios) > 0) {
			return view('anuncios.meusAnuncios', ['anuncios' => $anuncios]);
		}
			return back()->with('error', 'Nenhum anúncio criado.');
	}

	public function deleteAnuncio($id)
	{
		$anuncio = Anuncio::where('id', $id)->firstOrFail();
		$anuncio->delete();
		$aux = Anuncio::get()->all();
		if (sizeof($aux) > 0) {
			return redirect(route('/meusAnuncios'));
		}
		return redirect(route('home'));
	}

	public function showVerMais($id)
	{
		$anuncio = Anuncio::find($id);
		$empresa = User::find($anuncio->idEmpresa);

		return view('anuncios.verMais', compact('anuncio', 'empresa'));
	}
}
