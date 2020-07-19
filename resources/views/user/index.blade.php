@extends('user.layouts.master')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h4 class="my-4">Decks</h4>
                    <div class="card-deck-wrapper">
                        <div class="card-deck">
                            @foreach ($products as $p)
                            <div class="card">
                                <a href="">
                                    <img class="card-img-top img-fluid" src="{{$p->getPict()}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$p->product_name}}</h4>
                                        <h4 class="card-title" style="color: purple">Rp.
                                            {{number_format($p->product_price)}}</h4>
                                        <p class="card-text">This is a longer card with supporting text below as
                                            a natural lead-in to additional content. This content is a little
                                            bit longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div> <!-- end card-deck-->
                    </div> <!-- end card-deck-wrapper-->
                </div> <!-- end col-->
            </div>
        </div>
    </div>
</div>
@endsection