@extends('user.layouts.master')

@section('content')
<div class="container is-fluid my-4">
    <div class="columns">
        <div class="column is-8 has-background-primary pl-10">
            <p class="is-size-4 my-4"><strong>Checkout</strong></p>
            <div class="box">
                <p><strong>Alamat Pengiriman</strong></p>
                <hr>
                @if (Session::has('address'))
                <?php $data = Session::get('address') ?>
                <p>{{$data['nama_penerima']}}</p>
                <p>{{$data['no_telp']}}</p>
                <p>{{$data['alamat']}} {{$data['village']}} {{$data['district']}} - {{$data['city']}} - {{$data['province']}}</p>
                <a href="#" class="button is-primary my-4" data-toggle="modal" data-target="#modal-alamat">Ganti
                    alamat</a>
                @else
                <a href="#" class="button is-primary my-4" data-toggle="modal" data-target="#modal-alamat">Tambahkan
                    alamat</a>
                @endif
            </div>
            @if (session('cart'))
            <?php $totalHarga = 0; ?>
            @foreach (session('cart') as $key => $detail)
            <?php $total = $detail['product_price'] * $detail['quantity']; ?>
            <div class="box">
                <div class="columns">
                    <div class="column is-2 card-content is-flex level-item has-text-centered">
                        <figure class="image is-64x64 is-inline-block">
                            <img class="image is-64x64" src={{asset('backend/images/products_image/'.$detail['product_picture']->product_pict)}}>
                        </figure>
                    </div>
                    <div class="column is-6 ">
                        <p class="mb-2 has-text-weight-bold">{{$detail['product_name']}}</p>
                        <p class="is-size-6 has-text-weight-bold" style="color: #e6632c">
                            Rp.{{number_format($detail['product_price'])}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <?php $totalHarga+=$total; ?>
            <div class="box">

            </div>
        </div>
        <div class="column is-4 has-background-info">
            <div class="box my-20">
                <p>Ringkasan Belanja</p>
                <p>Total Harga ({{count(Session::get('cart'))}} Produk)</p>
                <span>Rp.{{number_format($totalHarga)}}</span>
                <p><a href="#" class="button is-primary mt-4">Pilih Pembayaran</a></p>
            </div>
        </div>
        @endif
    </div>
</div>

<div id="modal-alamat" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Modal title</p>
            <button class="delete" aria-label="close" data-dismiss="modal"></button>
        </header>
        <section class="modal-card-body">
            <form action="/checkout/add_address/" method="POST">
                {{ csrf_field() }}
                <div class="field">
                    <div class="columns">
                        <div class="column is-6">
                            <label for="">Nama Penerima</label>
                            <input type="text" name="nama_penerima" class="input is-primary" id="nama_penerima">
                        </div>
                        <div class="column is-6">
                            <label for="">No. Telepon</label>
                            <input type="text" name="no_telp" class="input is-primary">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="">Provinsi</label>
                    <div class="control">
                        <div class="select is-primary">
                          <select name="province" id="province" >
                            <option value="">Pilih provinsi</option>
                            @foreach ($provinces as $id => $name)
                            <option value="{{ $id }}">{{$name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="">Kota</label>
                    <div class="control">
                        <div class="select is-primary">
                          <select name="city" id="city" >
                            <option value="">Pilih Kota</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="">Kecamatan</label>
                    <div class="control">
                        <div class="select is-primary">
                          <select name="district" id="district" >
                            <option value="">Pilih Kecamatan</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="">Kelurahan</label>
                    <div class="control">
                        <div class="select is-primary">
                          <select name="village" id="village" >
                            <option value="">Pilih Kelurahan</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="">Kode Pos</label>
                    <input type="number" name="kode_pos" class="input is-primary">
                </div>
                <div class="field">
                    <label class="">Alamat Lengkap</label>
                    <div class="control">
                        <textarea class="textarea is-primary" placeholder="Textarea" name="alamat"></textarea>
                    </div>
                </div>
        </section>
        <footer class="modal-card-foot">
            <div class="actions">
                <input type="submit" class="button is-primary" disabled="disabled" value="Submit">
                <input class="button" aria-label="close" data-dismiss="modal" value="Cancel">
            </div>
        </footer>
        </form>
    </div>
</div>
@endsection

@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $(document).ready(function (){
        $('#province').on('change', function () {
            console.log($(this).val())
            let id = $(this).val();
            $('#city').empty();
            $('#city').append(`<option value="0" disable selected> Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: '/checkout/shipment/get-city/' + id,
                success: function (response) {
                    var data = JSON.parse(response);
                    $('#city').empty();
                    $('#city').append(`<option value="0" disable selected> Pilih Kota...</option>`);
                    $.each(data, function(index, value) {
                        $('#city').append(`<option value=${value['id']}> ${value['name']}</option>`)
                    })
                }
            })
        })

        $('#city').on('change', function () {
            console.log($(this).val())
            let id = $(this).val();
            $('#district').empty();
            $('#district').append(`<option value="0" disable selected> Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: '/checkout/shipment/get-district/' + id,
                success: function (response) {
                    var data = JSON.parse(response);
                    $('#district').empty();
                    $('#district').append(`<option value="0" disable selected> Pilih Kecamatan...</option>`);
                    $.each(data, function(index, value) {
                        $('#district').append(`<option value=${value['id']}> ${value['name']}</option>`)
                    })
                }
            })
        })

        $('#district').on('change', function () {
            console.log($(this).val())
            let id = $(this).val();
            $('#village').empty();
            $('#village').append(`<option value="0" disable selected> Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: '/checkout/shipment/get-village/' + id,
                success: function (response) {
                    var data = JSON.parse(response);
                    $('#village').empty();
                    $('#village').append(`<option value="0" disable selected> Pilih Kecamatan...</option>`);
                    $.each(data, function(index, value) {
                        $('#village').append(`<option value=${value['id']}> ${value['name']}</option>`)
                    })
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('.field input').on('keyup', function() {
            let empty = false;

            $('.field input').each(function() {
            empty = $(this).val().length == 0;
            });

            if (empty)
                $('.actions input').attr('disabled', 'disabled');
            else
                $('.actions input').attr('disabled', false);
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