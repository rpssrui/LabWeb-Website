@extends ('layouts\app')

@section('title')
Jobs R'Us
@endsection

@section('content')

<!-- Team -->

<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1 text-center"><strong>NOSSA EQUIPA</strong></h5>
        <div class="row">
            <!-- Team member -->
            <div class="col">
                <div  class="card"  style="height: 35em; background-color:599FDC">
                    <div class="card-body text-center">

                    <img class="image rounded-circle" src="{{asset('/storage/images/1.jpg')}}" alt="profile_image" style="width: 200px;height: 200px; padding: 10px; margin: 0px; ">

                        <h4 class="card-title">Tiago</h4>
                        <p class="card-text">38217</p>
                        <a href="https://github.com/tiagoss29/emprego_lab" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>

            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col">

                <div class="card" style="height: 35em;background-color:599FDC">
                    <div class="card-body text-center">

                    <img class="image rounded-circle" src="{{asset('/storage/images/5.jpg')}}" alt="profile_image" style="width: 200px;height: 200px; padding: 10px; margin: 0px; ">

                        <h4 class="card-title">Rui</h4>

                        <p class="card-text">38170</p>
                        <a href="https://github.com/tiagoss29/emprego_lab" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>

            </div>
            <!-- ./Team member -->
            <div class="col">

                <div class="card" style="height: 35em;background-color:599FDC">
                    <div class="card-body text-center">

                    <img class="image rounded-circle" src="{{asset('/storage/images/8.jpg')}}" alt="profile_image" style="width: 200px;height: 200px; padding: 10px; margin: 0px; ">

                        <h4 class="card-title">Ruben</h4>

                        <p class="card-text">38000</p>
                        <a href="https://github.com/tiagoss29/emprego_lab" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->

        </div>
    </div>
</section>
<!-- Team -->
@endsection