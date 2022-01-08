@extends('layouts.app')

@section('content')

<!------ Include the above in your HEAD tag ---------->

@if($user->id) {{method_field('PUT')}} @endif
<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <form method="POST" class="col-md-9 go-right" action="{{url('/user/editar/'.$user->id)}}">
                        @csrf
                        <h3 class="dark-color">Sobre Mim</h3>

                        <div class="form-group">
                            <label for="Sobre Mim">Sobre Mim</label>
                            <textarea id="descricao" name="descricao" type="text" class="form-control" required>{{$user->descricao}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth">Data de nascimento</label>
                            <input id="date_of_birth" name="date_of_birth" type="date" value="{{$user->date_of_birth}}" class="form-control" required></input>
                        </div>


                        <div class="form-group">
                            <label for="descricao">Regiao</label>
                            <input id="regiao" name="regiao" type="text" value="{{$user->regiao}}" class="form-control" required></input>
                        </div>

                        <div class="form-group">
                            <label for="localidade">Localidade</label>
                            <input id="localidade" name="localidade" type="text" value="{{$user->localidade}}" class="form-control" required></input>
                        </div>

                        <div class="form-group">
                            <label for="setorAtividade">E-mail</label>
                            <input id="setorAtividade" name="email" type="text" value="{{$user->email}}" class="form-control" required></input>
                        </div>

                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Editar') }}
                </button>

            </div>
            </form>
            <div class="col-lg-6">
                @if($user->image)
                <img class="image" src="{{asset('/storage/images/'.$user->image)}}" alt="profile_image" style="width: 380px;height: 380px; padding: 10px; margin-left: 30px; ">
                @endif
                <div class="about-avatar">
                    <form action="{{ url('uploadPP', [Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="submit" value="Upload">

                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    @if($message=Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
</section>
@endsection