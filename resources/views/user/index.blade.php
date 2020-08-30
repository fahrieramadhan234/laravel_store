@extends('user.layouts.master')

@section('content')
<div class="container is-fluid columns">
    <div class="column is-2">
        <h2>Tes</h2>
    </div>
    <div class="column is-10">
        <div class="container mt-4">
            <div class="notification">
                <div class="columns">
                    @foreach ($products as $p)
                    <div class="column is-one-fifth">
                        <a href="/product/detail/{{$p->product_id}}" style="text-decoration: none;">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-4by3">
                                        <img src={{asset('backend/images/products_image/' . $p->product_picture[0]->product_pict)}}
                                            alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="card-content px-3">
                                    <div class="media">
                                        <div class="media-content">
                                            <p class="is-size-7 has-text-weight-semibold mb-2">{{$p->product_name}}</p>
                                            <p class="is-size-6 has-text-weight-semibold mb-2"
                                                style="color: #e6632c">
                                                <b>Rp.{{number_format($p->product_price)}}</b>
                                            </p>
                                            @if ($p->product_stock <= 10)
                                            <p>
                                                <span class="tag is-danger mb-2">Stock left: {{$p->product_stock}}</span>
                                            </p>
                                            @endif
                                            <span class="icon is-small has-text-warning">
                                                <i class="fas fa-star fa-sm"></i>
                                            </span>
                                            <span class="icon is-small has-text-warning">
                                                <i class="fas fa-star fa-sm"></i>
                                            </span>
                                            <span class="icon is-small has-text-warning">
                                                <i class="fas fa-star fa-sm"></i>
                                            </span>
                                            <span class="icon is-small has-text-warning">
                                                <i class="fas fa-star fa-sm"></i>
                                            </span>
                                            <span class="icon is-small has-text-warning">
                                                <i class="fas fa-star fa-sm"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('footer')
<script>
    @if (Session::has('Success'))
        Swal.fire(
            'Success!',
            "{{Session::get('Success')}}",
            'success'
        )
    @elseif (Session::has('Error'))
        Swal.fire({
            title: "Error!",
            text: "{{Session::get('Error')}}",
            type: "error",
            button: "Close!",
        });
    @endif
</script>
@endsection