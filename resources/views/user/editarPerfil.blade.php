@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/editarPerfil.css') }}" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
@if($user->id) {{method_field('PUT')}} @endif
<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h3 class="dark-color">Sobre Mim</h3>
                    <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.</p>
                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <label>Data</label>
                                <p>04/05/1998</p> <!-- completar base dados: -data nascimento; -Descricão; -->
                            </div>
                            <div class="media">
                                <label>Regiao</label>
                                <p>{{$user->regiao}}</p>
                            </div>
                            <div class="media">
                                <label>Localidade</label>
                                <p>{{$user->localidade}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>E-mail</label>
                                <p>{{$user->email}}</p>
                            </div>
                            <div class="media">
                                <label>Freelance</label>
                                <p>Available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-avatar">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                </div>
            </div>
        </div>

    </div>
</section>
@endsection