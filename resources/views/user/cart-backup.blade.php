@extends('user.layouts.master')

@section('content')

<div class="container is-fluid my-6">
    <div class="box">
        <table class="table table-cart">
            <thead class="">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th style="width: 50px;"></th>
                </tr>
            </thead>
            <tbody>
                @if(session('cart'))
                <?php $totalharga = 0; ?>
                @foreach (session('cart') as $key => $detail)
                <?php $total = $detail['product_price'] * $detail['quantity']; ?>
                <tr>
                    <td class="">
                        <a href="/product/detail/{{$detail['product_id']}}">
                            <div class="columns is-desktop is-vcentered is-3">
                                <div class="column is-2">
                                    <img src={{asset('backend/images/products_image/'.$detail['product_picture']->product_pict)}}
                                        class="image is-64x64">
                                </div>
                                <div class="column is-6">
                                    <span>{{$detail['product_name']}}</span>
                                </div>
                            </div>
                        </a>
                        {{-- <a href="/product/detail/{{$detail['product_id']}}">{{$detail['product_name']}}</a> --}}
                    </td>
                    <td class="is-desktop is-vcentered">
                        Rp.{{number_format($detail['product_price'])}}
                    </td>
                    <td class="is-desktop is-vcentered">
                        <div class="custom-quantity-input">
                            <a href="/cart/minus/{{$detail['product_id']}}" class="action-icon quantity-input-down">
                                <i class="mdi mdi-minus-circle mr-2"></i>
                            </a>
                            <input name="qty" type="number" min="1" value="{{$detail['quantity']}}"
                                class="form-control d-inline-block mr-2" placeholder="Qty" style="width: 90px;">
                            <a href="/cart/plus/{{$detail['product_id']}}" class="action-icon quantity-input-up">
                                <i class="mdi mdi-plus-circle"></i>
                            </a>
                        </div>
                    </td>
                    <td class="is-desktop is-vcentered">
                        Rp.{{number_format($total)}}
                    </td>
                    <td class="is-desktop is-vcentered">
                        <a href="/cart/delete/{{$detail['product_id']}}" class="action-icon"> <i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
                <?php $totalharga+=$total; ?>
                @endforeach
            <tfoot>
                <tr>
                    <td colspan="3"><b>Total</b></td>
                    <td><b>
                            <h3>Rp. {{number_format($totalharga)}}</h3>
                        </b></td>
                </tr>
            </tfoot>
            @else
            <tr>
                <td colspan="4">
                    <center>Cart is empty</center>
                </td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    //     $(function(){
//   $(".quantity-input-up").click(function(){
//     var inpt = $(this).parents(".custom-quantity-input").find("[name=qty]");
//     var val = parseInt(inpt.val());
//     if ( val < 0 ) inpt.val(val=0);
//     inpt.val(val+1);
//   });
//   $(".quantity-input-down").click(function(){
//     var inpt = $(this).parents(".custom-quantity-input").find("[name=qty]");
//     var val = parseInt(inpt.val());
//     if ( val < 0 ) inpt.val(val=0);
//     if ( val == 0 ) return;
//     inpt.val(val-1);
//   });
// });
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