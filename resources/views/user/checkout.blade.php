@extends('user.layouts.master')

@section('content')
<div class="container is-fluid my-4">
    <div class="columns">
        @if (session('cart'))
        <?php $totalHarga = 0; ?>
        @foreach (session('cart') as $key => $detail)
        <?php $total = $detail['product_price'] * $detail['quantity']; ?>

        <div class="column is-8 has-background-primary pl-10">
            <p class="is-size-4 my-4"><strong>Checkout</strong></p>
            <div class="box">
                <p><strong>Alamat Pengiriman</strong></p>
                <hr>
                @if (Session::has('address'))
                <?php $data = Session::get('address') ?>
                <p>{{$data['nama_penerima']}}</p>
                <p>{{$data['no_telp']}}</p>
                <p>{{$data['alamat']}} {{$data['kota']}} {{$data['kode_pos']}}</p>
                <a href="/checkout_delete_session" class="button is-primary">Delete Session Alamat</a>
                @else
                <a href="#" class="button is-primary my-4" data-toggle="modal" data-target="#modal-alamat">Tambahkan
                    alamat</a>
                @endif
            </div>
        </div>
        <?php $totalHarga+=$total; ?>
        @endforeach
        <div class="column is-4 has-background-info">
            <div class="box my-20">
                <p>Ringkasan Belanja</p>
                <p>Total Harga ({{count(Session::get('cart'))}} Produk)</p>
                <span>Rp.{{number_format($totalHarga)}}</span>
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
                    <div class="columns">
                        <div class="column is-9">
                            <label for="">Kota atau Kabupaten</label>
                            <input type="text" name="kota" class="input is-primary">
                        </div>
                        <div class="column is-3">
                            <label for="">Kode Pos</label>
                            <input type="number" name="kode_pos" class="input is-primary">
                        </div>
                    </div>
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
<script>
    $(document).ready(function() {
        $('.field input, textarea').on('keyup', function() {
            let empty = false;

            $('.field input, textarea').each(function() {
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