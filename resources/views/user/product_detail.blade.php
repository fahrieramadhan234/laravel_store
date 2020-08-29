@extends('user.layouts.master')

@section('content')
{{-- {{dd($product_picture)}} --}}
<div class="container is-fluid mt-6">
    <div class="columns">
        <div class="column is-1by1 mx-2 my-2">
            <div class="box px-0">
                <figure class="image is-square">
                    <img src="{{asset('backend/images/products_image/'.$main_picture->product_pict)}}">
                </figure>
            </div>
            <div class="columns is-centered my-4">
                @foreach ($product_picture as $pp)
                <div class="column is-narrow mr-1">
                    <a href="#">
                        <figure class="image is-64x64">
                            <img src="{{asset('backend/images/products_image/'. $pp->product_pict)}}">
                        </figure>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="column is-7 mx-2 my-2">
            <form action="/add_cart/{{$product->product_id}}" method="post">
                {{ csrf_field() }}
                <p class="is-size-4 has-text-weight-bold"> {{$product->product_name}}</p>
                <div class="columns">
                    <div class="column is-2">
                        <p class="my-3">Harga</p>
                    </div>
                    <hr>
                    <div class="column is-6 ">
                        <p class="my-3 is-size-4 has-text-weight-bold" style="color: #e6632c">
                            Rp.{{number_format($product->product_price)}}</p>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-2">
                        <p class="my-3">Jumlah</p>
                    </div>
                    <hr>
                    <div class="column is-2">
                        <input type="number" name="qty" id="" class="input is-primary" min="0" value="1">
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-2">
                        <button type="submit" class="button is-primary">Add To Card</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
    @if (Session::has('Warning'))
        Swal.fire(
            'Info!',
            "{{Session::get('Warning')}}",
            'info',
        ).then(function(){
            window.location = "/login";
        });
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