@extends ('layouts\app')

@section('title')
Jobs R'Us
@endsection

@section('content')
@if($message=Session::get('error'))
    <div class="alert alert-danger">
        <p>{{$message}}</p>
    </div>
    @endif
    @if($message=Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

<div class="container">
    <div class="row pt-1 pb-1">
        <div class="col-lg-12">
            <h4 class="text-center">Jobs R'Us</h4>
        </div>
    </div>
</div>
<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="height:550px;width:1100px" src="https://www.job-hunt.org/wp-content/uploads/2021/05/Build-Your-Personal-SEO-The-25-Best-Keywords-for-You-in-Your-Job-Search.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img style="height:550px;width:1100px" src="https://www.franksonnenbergonline.com/wp-content/uploads/2014/07/image_simplify-your-job-search.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img style="height:550px;width:1100px" src="https://macaulay.cuny.edu/wp-content/uploads/2020/11/job-search.jpg" class="d-block w-100" alt="...">
            </div>
            <!--https://upload.wikimedia.org/wikipedia/commons/8/8d/Yarra_Night_Panorama%2C_Melbourne_-_Feb_2005.jpg-->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="search-sec">
    <div class="container">
        <form action="{{url('searchAdd')}}" method="get">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" name="nome" placeholder="O que procura?">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="regiao">
                                <option>Onde?</option>
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
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="tipo">
                                <option>Tipo de contrato</option>
                                <option>Emprego</option>
                                <option>Estagio</option>
                                <option>Voluntariado</option>
                                <option>Part-Time</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="btn btn-danger wrn-btn">Pesquisar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
 
</section>


@endsection