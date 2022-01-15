@extends('layouts.app')

@section('content')
@if($anuncio->id) {{method_field('PUT')}} @endif
@if($empresa) {{method_field('PUT')}}@endif
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{$anuncio->titulo}}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/home') }}"> Voltar Atrás</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Criado por:</strong>
            {{ $empresa->companyName }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descricao:</strong>
            {{ $anuncio->descricao }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Setor de Atividade:</strong>
            {{ $anuncio->setorAtividade }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Habilitações Minimas:</strong>
            {{ $anuncio->habilitacoesMinimas}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contactos:</strong>
            {{ $anuncio->contactos }}
        </div>
    </div>
</div>

<div class="container">
    <p> Está interessado neste anúncio?
        Entre já em contacto com o anunciante.</p>
    <form method="POST" action="{{ url('contactarEmpresa', $anuncio->id) }}"  enctype="multipart/form-data">
        @csrf

        <textarea id="mensagem" name="mensagem" class="form-control" placeholder="O utilizador {{Auth::user()->firstName}} {{Auth::user()->lastName}} está interassado no seu anuncio."></textarea>
        <div class="row">

            <div class="col-md-6">
                <input type="file" name="file">

            </div>
          
        </div>
        <button type="submit" class="btn btn-primary">Enviar Candidatura!</button>


    </form>

    <div class="container">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif



    </div>
</div>
</div>

@endsection