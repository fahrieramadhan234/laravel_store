@extends('user.layouts.master')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            @foreach ($products as $p)
                            <div class="card mb-4 mr-4" style="width: 18rem;">
                                <a href="/product_detail/{{ $p->product_id }}"><img class="card-img-top"
                                        src="{{$p->getPict()}}" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$p->product_name}}</h5>
                                    <p class="card-text" style="color: #e66a12; font-weight:bold">Rp.
                                        {{number_format($p->product_price)}}.</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection