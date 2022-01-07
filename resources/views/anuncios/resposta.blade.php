@extends ('layouts\app')

@section('title')
Responder Candidatura
@endsection
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container contact-form">

            <form method="get" action="{{url('enviarResposta/'.$candidatura->id)}}">
              @csrf
                <h3>Contactar Candidato</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" value="{{Auth::user()->email}}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="enviarResposta" class="btn btn-primary" value="Enviar Resposta" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="mensagem" class="form-control" placeholder="Insira aqui a mensagem que prentende enviar ao candidato {{$candidatura->nomeCandidato}}." style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
    
            </form>
            @if($message=Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                        @endif
</div>
@endsection