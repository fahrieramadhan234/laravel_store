@extends('user.layouts.master')

@section('content')
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-8 has-background-primary">
        </div>
        <div class="column is-4 has-background-info">

        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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