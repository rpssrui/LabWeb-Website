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

<p> Está interessado neste anúncio?
    Entre já em contacto com o anunciante.</p>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="contactForm">
    Contactar Anunciante
</button>

<div class="collapse" id="collapseExample">
    <div class="card card-body">

        <div class="container">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{route('contactarEmpresa')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Endereço de Email</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{Auth::user()->email}}" required></input>
                </div>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{Auth::user()->firstName}} {{Auth::user()->lastName}}" required></input>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mensagem</label>
                    <textarea name="info" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" id="emailEmpresa" name="emailEmpresa" value="{{$empresa->email}}" class="form-control"> </input>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

    @endsection