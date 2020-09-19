@extends('user.layouts.master')

@section('content')

<div class="flex mx-6">
    <div class="w-1/4 my-4 mx-2 ">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <div class="p-6">
                <p class="mb-4">Category</p>
                @foreach ($categories as $cat)
                <div class="my-2">
                    <a href="#">{{$cat->category_name}}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div
        class="w-3/4 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 justify-items-center my-4 mx-2">
        @foreach ($products as $p)
        <div class="w-40 h-auto rounded overflow-hidden shadow-lg my-4">
            <a href="/product/detail/{{$p->product_id}}">
                <img class="w-full h-48" alt=""
                    src={{asset('backend/images/products_image/' . $p->product_picture[0]->product_pict)}} />
                <div class="px-2 py-2">
                    <div class="text-sm font-light mb-2">{{$p->product_name}}</div>
                    <div class="text-md font-medium mb-2">
                        Rp.{{number_format($p->product_price)}}
                    </div>
                    @if ($p->product_stock <= 10) <p>
                        <span class="tag is-danger mb-2">Stock left:
                            {{$p->product_stock}}</span>
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
            </a>
        </div>
        @endforeach
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
    @elseif (Session::has('Warning'))
        Swal.fire({
            title: 'Warning!',
            text: "{{Session::get('Warning')}}",
            type: 'warning',
            button: 'Close!'
        })
    @endif
</script>
@endsection