@extends ('layouts\app')

@section('title')
Criar Anuncio
@endsection

@section('content')
<div class="container">
	<div class="row">
		<form method="POST" class="col-md-9 go-right" action="{{ route('createAnuncio') }}">
			@csrf
			<h2>Criar Anuncio</h2>
			<p>Por favor insira uma descrição detalhada</p>
			<div class="form-group">
				<input id="titulo" name="titulo" type="text" class="form-control" required>
				<label for="titulo">Titulo</label>
			</div>
			<div class="form-group">
				<textarea id="descricao" name="descricao" class="form-control" required></textarea>
				<label for="descricao">Descrição</label>
			</div>

			<div class="form-group">
				<input id="localidade" name="localidade" class="form-control" required></input>
				<label for="localidade">localidade</label>
			</div>
			<div class="form-group">
				<input id="regiao" name="regiao" class="form-control" required></input>
				<label for="regiao">regiao</label>
			</div>
			<div class="form-group">
				<input id="habilitacoes" name="habilitacoes" class="form-control" required></input>
				<label for="habilitacoes">habilitacoes</label>
			</div>
			<div class="form-group">
				<input id="setorAtividade" name="setorAtividade" class="form-control" required></input>
				<label for="setorAtividade">setor de atividade</label>
			</div>
			<div class="form-group">
				<input id="contactos" name="contactos" class="form-control" required></input>
				<label for="contactos">contactos</label>
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
				{{ __('Criar') }}
			</button>
		</form>
	</div>
</div>



@endsection