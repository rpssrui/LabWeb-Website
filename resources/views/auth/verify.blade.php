@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificar Endereço de Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Foi enviado um novo email de confirmação.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor verifique o seu email.') }}
                    {{ __('Se não recebeu o Email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Carregue aqui para que o email seja reenviado') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
