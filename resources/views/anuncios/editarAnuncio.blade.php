@extends ('layouts\app')

@section('title')
Editar Anuncio
@endsection

@section('content')

<div class="container">
	<div class="row">
		<form method="POST" class="col-md-9 go-right" action="{{url('anuncios/update/'.$anuncio->id)}}">
			@csrf
			@if($anuncio->id) {{method_field('PUT')}} @endif
			<!-- para ir buscar o id do anuncio -->
			<h2>Editar Anuncio</h2>
			<p>Por favor insira uma descrição detalhada</p>
			<div class="form-group">
				<label for="titulo">Título</label>
				<input id="titulo" name="titulo" type="text" value="{{$anuncio->titulo}}" class="form-control" required></input>

			</div>
			<div class="form-group">
				<label for="descricao">Descrição</label>
				<textarea id="descricao" name="descricao" class="form-control" required>{{$anuncio->descricao}}</textarea>

			</div>
			<div class="form-group">
				<label for="localidade">Localidade</label>
				<input id="localidade" name="localidade" class="form-control" value="{{$anuncio->localidade}}" required></input>

			</div>
			<div class="form-group">
				<label for="regiao">Região</label>
				<input id="regiao" name="regiao" class="form-control" value="{{$anuncio->regiao}}" required></input>

			</div>
			<div class="form-group">
				<label for="habilitacoes">Habilitações</label>
				<input id="habilitacoes" name="habilitacoes" class="form-control" value="{{$anuncio->habilitacoesMinimas}}" required></input>

			</div>
			<div class="form-group">
				<label for="setorAtividade">Setor de Atividade</label>
				<input id="setorAtividade" name="setorAtividade" class="form-control" value="{{$anuncio->setorAtividade}}" required></input>

			</div>
			<div class="form-group">
				<label for="contactos">Contactos</label>
				<input id="contactos" name="contactos" class="form-control" value="{{$anuncio->contactos}}" required></input>
			</div>
			<div class="form-group">
				<label for="tipo">Tipo de Contrato</label>
				<select name="tipo" id="tipo">
					<option value="Emprego">Emprego</option>
					<option value="Estagio">Estagio</option>
					<option value="Voluntariado">Voluntariado</option>
					<option value="Part-Time">Part-Time</option>
				</select>
			</div>
			<div class="form-group">
				<input type="hidden" id="idEmpresa" name="idEmpresa" value="{{Auth::user()->id}}" class="form-control"> </input>
			</div>
			<button type="submit" class="btn btn-primary">
				{{ __('Editar') }}
			</button>
			<a class="btn btn-primary" href="{{url('/meusAnuncios')}}"> Voltar Atrás</a>
		</form>
		
	</div>
</div>



@endsection