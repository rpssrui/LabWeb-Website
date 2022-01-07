@extends ('layouts\app')

@section('title')
Jobs R'Us
@endsection

@section('content')

<!-- Team -->

<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1 text-center"><strong>OUR TEAM</strong></h5>
        <div class="row">
            <!-- Team member -->
            <div class="col">

                <div class="card" style="height: 35em;">
                    <div class="card-body text-center">
                 
                <img class="image" src="{{asset('/storage/images/1')}}" alt="profile_image" style="width: 380px;height: 380px; padding: 10px; margin-left: 30px; ">
                                     <h4 class="card-title">Diogão</h4>
                        <p class="card-text">Warriors Fanboy</p>
                        <p class="card-text">38716</p>
                        <a href="https://github.com/diogosilv" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>

            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col">

            <div class="card" style="height: 35em;">
                    <div class="card-body text-center">
                 
                <img class="image" src="{{asset('/storage/images/1')}}" alt="profile_image" style="width: 380px;height: 380px; padding: 10px; margin-left: 30px; ">
                                     <h4 class="card-title">Diogão</h4>
                        <p class="card-text">Warriors Fanboy</p>
                        <p class="card-text">38716</p>
                        <a href="https://github.com/diogosilv" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>

            </div>
            <!-- ./Team member -->
            <div class="col">

            <div class="card" style="height: 35em;">
                    <div class="card-body text-center">
                 
                <img class="image" src="{{asset('/storage/images/1')}}" alt="profile_image" style="width: 380px;height: 380px; padding: 10px; margin-left: 30px; ">
                                     <h4 class="card-title">Diogão</h4>
                        <p class="card-text">Warriors Fanboy</p>
                        <p class="card-text">38716</p>
                        <a href="https://github.com/diogosilv" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->

        </div>
    </div>
</section>
<!-- Team -->
@endsection