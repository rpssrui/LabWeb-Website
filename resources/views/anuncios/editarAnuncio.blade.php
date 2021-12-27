@extends ('layouts\app')

@section('title')
Criar Anuncio
@endsection

@section('content')

<div class="container">
	<div class="row">
		<form method="POST" class="col-md-9 go-right" action="{{url('anuncios/update/'.$anuncio->id)}}">
		@csrf
		@if($anuncio->id) {{method_field('PUT')}} @endif <!-- para ir buscar o id do anuncio -->
			<h2>Editar Anuncio</h2>
			<p>Por favor insira uma descrição detalhada</p>
			<div class="form-group">
				<input id="titulo" name="titulo" type="text" value="{{$anuncio->titulo}}" class="form-control" required></input>
				<label for="titulo">Titulo</label>
			</div>
			<div class="form-group">
				<textarea id="descricao" name="descricao" class="form-control"  required >{{$anuncio->descricao}}</textarea>
				<label for="descricao">Descrição</label>
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
		</form>
	</div>
</div>



@endsection