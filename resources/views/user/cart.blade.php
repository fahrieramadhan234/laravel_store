@extends('user.layouts.master')

@section('content')

<div class="container my-6">
    <div class="columns">
        @if (session('cart'))
        <div class="column is-8 mr-2">
            <?php $totalHarga = 0; ?>
            @foreach (session('cart') as $key => $detail)
            <?php $total = $detail['product_price'] * $detail['quantity']; ?>
            <div class="box">
                <div class="columns is-desktop is-vcentered ">
                    <div class="column is-2 is-centered">
                        <img src={{asset('backend/images/products_image/'.$detail['product_picture']->product_pict)}}
                            class="image is-64x64 is-centered">
                    </div>
                    <div class="column is-6">
                        <a href="/product/detail/{{$detail['product_id']}}">
                            <p class="mb-2 has-text-weight-bold">{{$detail['product_name']}}</p>
                        </a>
                        <p class="is-size-6 has-text-weight-bold" style="color: #e6632c">
                            Rp.{{number_format($detail['product_price'])}}</p>
                    </div>
                    <div class="column is-4">
                        <div class="columns buttons has-addons is-pulled-right">
                            <div class="column is-vcentered">
                                <a href="/cart/delete/{{$detail['product_id']}}" class="mr-4">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="/cart/minus/{{$detail['product_id']}}" class="minus-qty my-2">
                                    <i class="fas fa-minus-circle"></i>
                                </a>
                                <input name="qty" type="number" min="1" value="{{$detail['quantity']}}"
                                    class="input is-small" placeholder="Qty" style="width: 90px; text-align: center">
                                <a href="" class="plus-qty">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $totalHarga+=$total; ?>
            @endforeach
        </div>
        <div class="column is-4">
            <div class="box">
                <p class="mb-3 has-text-weight-bold">Ringkasan Belanja</p>
                <div class="columns is-right">
                    <div class="column is-4">
                        <span>Total Harga</span>
                    </div>
                    <div class="column is-8 is-right">
                        <span class="has-text-weight-bold"
                            style="color: #e6632c">Rp.{{number_format($totalHarga)}}</span>
                    </div>
                </div>
                <a href="/checkout/payment" class="button is-primary is-right">Checkout
                    ({{count(Session::get('cart'))}})</a>
            </div>
        </div>
        @else
        Cart Kosong
        @endif
    </div>
</div>
@endsection

@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
        $(function(){
        $(".quantity-input-up").click(function(){
            var inpt = $(this).parents(".plus-qty").find("[name=qty]");
            var val = parseInt(inpt.val());
            if ( val < 0 ) inpt.val(val=0);
            inpt.val(val+1);
        });
        $(".quantity-input-down").click(function(){
            var inpt = $(this).parents(".minus-qty").find("[name=qty]");
            var val = parseInt(inpt.val());
            if ( val < 0 ) inpt.val(val=0);
            if ( val == 0 ) return;
            inpt.val(val-1);
        });
    });
</script>
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