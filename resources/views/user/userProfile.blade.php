
@extends('layouts.app')
<link href="{{ asset('/css/editarPerfil.css') }}" rel="stylesheet">
@section('content')


@if($user->id) {{method_field('PUT')}} @endif

<section class="section about-section gray-bg" id="about" style="background-color:599FDC;color:black">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h3 class="dark-color">Sobre Mim</h3>
                    <p>{{$user->descricao}}</p>
                    <div class="row about-list">
                        <div class="col-md-8">
                            <div class="media">
                                <label>Data Nascimento</label>
                                <p><br>{{$user->date_of_birth}}</p>
                            </div>
                            <div class="media">
                                <label>Regiao</label>
                                <p>{{$user->regiao}}</p>
                            </div>
                            <div class="media">
                                <label>Morada</label>
                                <p>{{$user->localidade}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>E-mail</label>
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                @if($user->image)
                <img class="image" src="{{asset('/storage/images/'.$user->image)}}" alt="profile_image" style="width: 380px;height: 380px; padding: 10px; margin-left: 30px; ">
                @endif
            </div>
        </div>
    </div>

    </div>
</section>
@endsection