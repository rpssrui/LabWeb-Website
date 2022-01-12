@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createCandidato') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('Primeiro Nome') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Apelido') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="localidade" class="col-md-4 col-form-label text-md-right">{{ __('Localidade') }}</label>

                            <div class="col-md-6">
                                <input id="localidade" type="text" class="form-control @error('localidade') is-invalid @enderror" name="localidade" value="{{ old('localidade') }}" required autocomplete="localidade" autofocus>

                                @error('localidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="regiao" class="col-md-4 col-form-label text-md-right">{{ __('Região') }}</label>

                            <div class="col-md-6">
                                <select style="max-width:90%;" class="form-control search-slt" id="exampleFormControlSelect1" name="regiao">

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
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ 'Password invalida' }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registo') }}
                        </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection