@extends ('layouts\app')

@section('title')
Meus Anuncios
@endsection


@section('content')

@if($message=Session::get('error'))
<div class="alert alert-danger">
    <p>{{$message}}</p>
</div>
@endif
<div class="container">
    <div class="row">
        <h1>{{Auth::user()->companyName}}</h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h5 class="panel-title">Meus Anuncios</h5>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                <table class="table table-secondary">
                        <thead class="thead thead-dark">>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th>Título</th>
                                <th>Data</th>
                                <th>Tipo</th>
                                <th>Candidaturas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anuncios as $add)
                            <tr>
                                <td align="center">
                                    <a href="anuncios/edit/{{$add->id}}" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                    <a href="anuncios/delete/{{$add->id}}" class="btn btn-danger" onclick="return confirm('Tem a certeza que pretende apagar este Anuncio?');"><em class="fa fa-trash"></em></a>
                                </td>
                                <td align="center">{{$add->titulo}}</td>
                                <td align="center">{{$add->created_at}}</td>
                                <td align="center">{{$add->tipo}}</td>
                                <td align="center"><a href="anuncios/Candidaturas/{{$add->id}}" class="btn btn-default"><em class="fa fa-plus"></em></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$anuncios->links()}}
                </div>
                <!-- AQUI -->
            </div>

        </div>
    </div>
</div>




@endsection