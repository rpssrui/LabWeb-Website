@extends ('layouts\app')

@section('title')
Meus Anuncios
@endsection


@section('content')
<div class="container">
    <div class="row">
        <h1>{{Auth::user()->companyName}}</h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h5 class="panel-title">Resultado da Pesquisa:</h5>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Data</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $add)
                            <tr>
                                <td>{{$add->titulo}}</td>
                                <td>{{$add->created_at}}</td>
                                <td>{{$add->tipo}}</td>
                                <td> <button type="button" class="btn btn-outline-success">Ver Mais</button> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection