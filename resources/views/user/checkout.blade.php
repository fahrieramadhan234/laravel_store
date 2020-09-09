@extends('user.layouts.master')

@section('content')
{{-- {{dd(Session::get('address'))}} --}}
<div class="container is-fluid my-4 has-background-light">
    <div class="columns">
        <div class="column is-8 pl-10">
            <p class="is-size-4 my-4"><strong>Checkout</strong></p>
            <div class="box">
                <p><strong>Alamat Pengiriman</strong></p>
                <hr>
                @if (Session::has('address'))
                <?php $data = Session::get('address') ?>
                <p>{{$data['nama_penerima']}}</p>
                <p>{{$data['no_telp']}}</p>
                <p>{{$data['alamat']}} - {{$data['city_name']}} -
                    {{$data['province_name']}}</p>
                <a href="#" class="button is-primary my-4" data-toggle="modal" data-target="#modal-alamat">Ganti
                    alamat</a>
                <input type="text" name="origin" id="origin" value="457" hidden>
                <input type="text" name="city_id" id="city_id" value="{{$data['city']}}" hidden>
                @else
                <a href="#" class="button is-primary my-4" data-toggle="modal" data-target="#modal-alamat">Tambahkan
                    alamat</a>
                @endif
            </div>
            @if (session('cart'))
            <?php $totalHarga = 0; ?>
            <?php $totalBerat = 0; ?>
            @foreach (session('cart') as $key => $detail)
            <?php $total = $detail['product_price'] * $detail['quantity']; ?>
            <?php $berat = $detail['product_weight'] * $detail['quantity'] ?>
            <div class="box">
                <div class="columns">
                    <div class="column is-2 card-content is-flex level-item has-text-centered">
                        <figure class="image is-64x64 is-inline-block">
                            <img class="image is-64x64"
                                src={{asset('backend/images/products_image/'.$detail['product_picture']->product_pict)}}>
                        </figure>
                    </div>
                    <div class="column is-6 ">
                        <p class="mb-2 has-text-weight-bold">{{$detail['product_name']}}</p>
                        <div class="columns">
                            <div class="column is-4">
                                <p class="is-size-6 has-text-weight-bold" style="color: #e6632c">
                                    Rp.{{number_format($detail['product_price'])}}</p>
                                <p class="is-size-7">Berat : {{$detail['product_weight']}}(gram)</p>
                            </div>
                            <div class="column is-4">
                                x {{$detail['quantity']}}
                            </div>
                            <div class="column is-4 level-right">
                                <p class="has-text-weight-bold" style="color: #e6632c">
                                    Rp.{{number_format($detail['product_price'] * $detail['quantity'])}}</p>
                                <p class="is-size-7"> {{$detail['product_weight'] * $detail['quantity']}} (gram)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $totalHarga+=$total; ?>
            <?php $totalBerat+=$berat ?>
            @endforeach
            <div class="box" id="box-courier">
                <p class="has-text-weight-bold mb-4">Pilih Kurir</p>
                <div class="control">
                    <div class="select is-primary">
                        <select name="courier" id="courier">
                            <option value="">Pilih Kurir</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS INDONESIA</option>
                        </select>
                    </div>
                </div>
                <div class="control mt-4">
                    <div class="select is-primary">
                        <select name="service" id="service">
                            <option value="">Pilih Layanan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4">
            <div class="box my-20">
                <p>Ringkasan Belanja</p>
                <div class="columns">
                    <div class="column is-6">
                        <p>Total Harga Barang </p>
                        <p>Total Ongkos Kirim</p>
                        <p class="mt-4 has-text-weight-bold">Total pembayaran</p>
                    </div>
                    <div class="column is-6">
                        <p id="total-harga">Rp.{{$totalHarga}}</p>
                        <p class="" id="total-ongkir"> - </p>
                        <p class="has-text-weight-bold mt-4" id="total-pembayaran"></p>
                    </div>
                </div>
                <p><a href="#" class="button is-primary mt-4">Pilih Pembayaran</a></p>
                <input type="number" name="weight" id="weight" value="{{$totalBerat}}" hidden>
            </div>
        </div>
        @endif
    </div>
</div>



<div id="modal-alamat" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card mt-4">
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
                            <select name="province" id="province">
                                <option value="">Pilih provinsi</option>
                                @foreach ($province as $p)
                                <option value="{{ $p['province_id']}}" province-name="{{$p['province']}}">
                                    {{$p['province']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="text" name="province_name" id="province_name" class="input is-primary" hidden>
                    </div>
                </div>
                <div class="field">
                    <label class="">Kota/Kabupaten</label>
                    <div class="control">
                        <div class="select is-primary">
                            <select name="city" id="city">
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="text" name="city_name" id="city_name" class="input is-primary" hidden>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label for="">Kode Pos</label>
                        <input type="number" name="kode_pos" class="input is-primary">
                    </div>
                </div>
                <div class="field">
                    <label class="">Alamat Lengkap</label>
                    <div class="control">
                        <textarea class="textarea is-primary" placeholder="Nama Jalan, Kelurahan, Kecamatan"
                            name="alamat" cols="30" rows="2"></textarea>
                    </div>
                </div>
        </section>
        <footer class="modal-card-foot">
            <div class="actions">
                <input id="submit_address" type="submit" class="button is-primary" disabled="disabled" value="Submit">
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
    let login = false;
    @if(Session::has('address'))
        login = true
    @else
        login = false;
    @endif

    $(document).ready(function () {
        if (login === !true)
        {
            $("#box-courier").hide();
        }
    })

    $(document).ready(function (){
        $('#province').on('change', function () {
            let name = $(this).find(':selected').attr('province-name');
            $('#province_name').val(name);
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
                        $('#city').append(`<option value=${value['city_id']} city-name=${value['city_name']}>${value['type']} ${value['city_name']}</option>`)
                    })
                }
            })
        })

        $('#city').on('change', function () {
            let name = $(this).find(':selected').attr('city-name');
            $('#city_name').val(name);
        })
    
        $('#courier').on('change',function () {
            let origin = $('#origin').val();
            let destination = $('#city_id').val();
            let weight = $('#weight').val();
            let courier = $('#courier').val();
            $('#service').empty();
            $('#service').append(`<option value="0" disable selected> Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: `/origin=${origin}&destination=${destination}&weight=${weight}&courier=${courier}`,
                success: function (response) {
                    // console.log(response)
                    var data = JSON.parse(response);
                    $('#service').empty();
                    $('#service').append(`<option value="0" disable selected> Pilih Layanan...</option>`);
                    $.each(data, function(key, value) {
                        console.log(value)
                        $.each(value.costs, function(key1, value1){
                            $.each(value1.cost, function (key2, value2) {
                                $('#service').append(`<option value="${key}" ongkir="${value2.value}">${value1.service} - ${value1.description} - Rp.${value2.value}</option>`);
                            })
                        })
                    })
                }
            })
        })

        $('#service').on('change', function () {
            let ongkir = $(this).find(':selected').attr('ongkir');
            let total_harga = $('#total-harga').text();
            let total_harga2 = total_harga.substring(3, total_harga.length + 1)
            let total_pembayaran = parseInt(ongkir) + parseInt(total_harga2);
            console.log(total_harga2)
            $('#total-ongkir').empty();
            $('#total-ongkir').text('Rp.' + ongkir);
            $('#total-pembayaran').text('Rp.'+ total_pembayaran)
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