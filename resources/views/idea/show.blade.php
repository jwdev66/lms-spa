@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
<!-- <h1>Idea {{ $idea->title}}</h1> -->


<div class="row p-4">

    <div class="col-md-3">

        <div class="card" style="">
            <div class="card-header">
                <h5 class="card-title">Documents</h5>
            </div>
            <!-- <div class="card-body"> -->
            <div class="">

                <div class="accordion" id="accordionExample">
                    <div class="">
                        <div class="card-header p-0" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Item #1
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card-header p-0" id="headingTwo">
                            <h5 class="mb-0">
                            <!-- collapsed -->
                                <button class="btn btn-link text-dark " type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Item #2
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    Item #3
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 z
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="card" style="">
            <div class="card-header">
                <h5 class="card-title">Summary
                <span class="badge badge-secondary float-right">New</span>
                </h5>
            </div>
            <div class="card-body">

                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="card" style="">
            <div class="card-header">
                <h5 class="card-title">Activity</h5>
            </div>
            <div class="card-body">

                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
@parent
<!-- <script src="{{ asset('js/app1.js') }}" defer></script> -->
@endsection
