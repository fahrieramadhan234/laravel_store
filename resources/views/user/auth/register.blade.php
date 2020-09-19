<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register & Signup | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <!-- App css -->
    {{-- <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/custom_css.css')}}"> --}}


    <!-- icons -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="flex justify-center my-6">
        <div class="w-1/3 bg-white rounded-lg shadow-outline p-6">
            <p class="text-center text-xl">Register</p>
            <form action="/register/post" method="post" class="my-6" id="formCheckPassword">
                {{ csrf_field() }}
                <div class="flex my-3">
                    <div class="mr-1">
                        <input
                            class="shadow appearance-none border @if($errors->has('first_name')) border-red-500 @endif rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="firstname" type="text" placeholder="Nama Depan" name="first_name">
                        @if($errors->has('first_name'))
                        <p class="text-red-500 text-xs italic">{{$errors->first('first_name')}}</p>
                        @endif
                    </div>
                    <div class="ml-1">
                        <input
                            class="shadow appearance-none border @if($errors->has('last_name')) border-red-500 @endif rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="lastname" type="text" placeholder="Nama Belakang" name="last_name">
                        <p class="text-red-500 text-xs italic">{{$errors->first('last_name')}}</p>
                    </div>
                </div>
                <div class="my-3">
                    <input type="email" name="email"
                        class="shadow appearance-none border @if($errors->has('email')) border-red-500 @endif rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Email">
                    <p class="text-red-500 text-xs italic">{{$errors->first('email')}}</p>
                </div>
                <div class="my-3">
                    <input type="password" name="password"
                        class="shadow appearance-none border @if($errors->has('password')) border-red-500 @endif rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Password">
                    <p class="text-red-500 text-xs italic">{{$errors->first('password')}}</p>
                </div>
                <div class="my-3">
                    <input type="password" name="confirm_password"
                        class="shadow appearance-none border @if($errors->has('confirm_password')) border-red-500 @endif rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Konfirmasi Password">
                    <p class="text-red-500 text-xs italic">{{$errors->first('confirm_password')}}</p>
                </div>
                <div class="inline-flex my-2">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="sex" value="M">
                            <span class="ml-2 mr-4">Laki-Laki</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="sex" value="F">
                            <span class="ml-2">Perempuan</span>
                        </label>
                    </div>
                </div>
                <p class="text-red-500 text-xs italic">{{$errors->first('sex')}}</p>
                <div class="my-3">
                    <input type="text" name="phone_number"
                        class="shadow appearance-none border @if($errors->has('phone_number')) border-red-500 @endif rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="No Handphone">
                    <p class="text-red-500 text-xs italic">{{$errors->first('phone_number')}}</p>
                </div>
                <div class="flex justify-center mt-10">
                    <button type="submit"
                        class="w-full bg-teal-500 rounded-lg text-white py-2 px-4 shadow-md hover:bg-teal-700">
                        Sumbit
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- end page -->
    <script>
        function showPass() {
            const pass = document.getElementsByClassName('#password');
            const eye = document.getElementsByClassName('#eye')
            if ( pass.type === "password") {
                pass.type = "text"
            }else{
                pass.type = "password";
            }
        }
        $("#formCheckPassword").validate({
           rules: {
               password: { 
                    required: true,
                    minlength: 8,
                }, 
                cfmPassword: { 
                    equalTo: "#password",
                    required: true,
                    minlength: 8,
               }
           },
            messages:{
                password: { 
                    required:"the password is required"
               }
            }
        });
    </script>

    <!-- Vendor js -->
    <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('backend/assets/js/app.min.js')}}"></script>

</body>

</html>