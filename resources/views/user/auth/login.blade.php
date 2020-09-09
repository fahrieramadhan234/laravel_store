<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom_css.css')}}">

    <!-- Sweet Alert-->
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- icons -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body class="auth-fluid-pages pb-0">

    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="text-center mt-4">
                        <h2>Login</h2>
                    </div>
                    <form action="/login/post" method="post" class="m-3">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="emailaddress">Email address</label>
                            <input name="email" class="form-control" type="email" id="emailaddress" required=""
                                placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <a href="auth-recoverpw-2.html" class="text-muted float-right"><small>Forgot your
                                    password?</small></a>
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input name="password" type="password" class="form-control"
                                    placeholder="Enter your password">
                                {{-- <a href="#"><i class="fa fa-eye"></i></a> --}}
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit">Log In </button>
                        </div>
                        <!-- social-->
                        <div class="text-center mt-4">
                            <p class="text-muted font-16">Sign in with</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"
                                        class="social-list-item border-primary text-primary"><i
                                            class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                            class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                            class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"
                                        class="social-list-item border-secondary text-secondary"><i
                                            class="mdi mdi-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end auth-fluid-->

    <!-- Vendor js -->
    <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>


    <!-- App js -->
    <script src="{{asset('backend/assets/js/app.min.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{asset('backend/assets/js/pages/sweet-alerts.init.js')}}"></script>

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

</body>

</html>