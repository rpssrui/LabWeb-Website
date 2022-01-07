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
			<p>Por favor insira uma descrição detalhada.</p>
			<div class="form-group">
				<input id="titulo" name="titulo" type="text" class="form-control" required>
				<label for="titulo">Título</label>
			</div>
			<div class="form-group">
				<textarea id="descricao" name="descricao" class="form-control" required></textarea>
				<label for="descricao">Descrição</label>
			</div>

			<div class="form-group">
				<input id="localidade" name="localidade" class="form-control" required></input>
				<label for="localidade">Localidade</label>
			</div>
			<div class="form-group">
			<select class="form-control search-slt" id="exampleFormControlSelect1" name="regiao">
                                <option>Aveiro</option>
                                <option>Beja</option>
                                <option>Braga</option>
                                <option>Bragança</option>
                                <option>Castelo Branco</option>
                                <option>Coimbra</option>
                                <option>Évora</option>
                                <option>Faro</option>
                                <option>Guarda</option>
                                <option>Leiria</option>
                                <option>Lisboa</option>
                                <option>Portalegre</option>
                                <option>Porto</option>
                                <option>Santarém</option>
                                <option>Setúbal</option>
                                <option>Viana do Castelo</option>
                                <option>Vila Real</option>
                                <option>Ilha da Madeira</option>
                                <option>Ilha de S.Miguel</option>
                                <option>Ilha de Porto Santo</option>
                                <option>Ilha de Santa Maria</option>
                                <option>Ilha Terceira</option>
                                <option>Ilha da Graciosa</option>
                                <option>Ilha S.Jorge</option>
                                <option>Ilha do Pico</option>
                                <option>Ilha do Faial</option>
                                <option>Ilha das Flores</option>
                                <option>Ilha do Corvo</option>
                            </select>
				<label for="regiao">Região</label>
			</div>
			<div class="form-group">
				<input id="habilitacoesMinimas" name="habilitacoesMinimas" class="form-control" required></input>
				<label for="habilitacoesMinimas">Habilitacoes</label>
			</div>
			<div class="form-group">
				<input id="setorAtividade" name="setorAtividade" class="form-control" required></input>
				<label for="setorAtividade">Setor de Atividade</label>
			</div>
			<div class="form-group">
				<input id="contactos" name="contactos" class="form-control" required></input>
				<label for="contactos">Contactos</label>
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
			<button type="submit" class="btn btn-primary">
				{{ __('Criar') }}
			</button>
		</form>
	</div>
</div>



@endsection