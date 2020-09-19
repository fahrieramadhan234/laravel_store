{{-- <nav class="navbar container is-fluid my-4" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
            data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a href="/" class="navbar-item">
                Home
            </a>
        </div>
        <form action="" method="POST">
            <div class="field has-addons">
                <div class="control mt-3">
                    <input class="input" type="text" placeholder="Search...">
                </div>
                <div class="control mt-3">
                    <a class="button is-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>
        </form>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="/cart" class="mr-5">
                        @if (Session::has('cart'))
                        @if (count(Session::get('cart')) >= 1)
                        <i class="fas fa-shopping-cart fa-lg" data-notifications={{count(Session::get('cart'))}}></i>
@else
<i class="fas fa-shopping-cart fa-lg"></i>
@endif
@else
<i class="fas fa-shopping-cart fa-lg"></i>
@endif
</a>
@if (Session::has('login'))
<span class="mr-2">Hi, {{$account->customer->first_name}}</span>
<span class="mt-2"><a href="/logout" class="button is-text">Logout</a></span>
@else
<a href="/register" class="button is-primary">
    <strong>Sign up</strong>
</a>
<a href="/login" class="button is-light">
    Log in
</a>
@endif
</div>
</div>
</div>
</div>
</nav> --}}


<nav class="flex content-center justify-between flex-wrap shadow-md bg-white-500 p-6">
    <div class="w-1/7 flex justify-start text-teal-500 items-center">
        <span class="font-semibold text-xl tracking-tight">
            Logic Store
        </span>
        <a href="/" class="ml-4">
            Home
        </a>
    </div>
    <div class="block lg:hidden">
        <button
            class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>
    <div class="w-1/2 flex justify-center justify-self-center">
        <form action="/search" method="GET" class="w-full inline-flex items-center">
            <div class="w-full flex border rounded-full bg-gray-300 items-center p-2 ">
                <input type="text" placeholder="Search..." name="q"
                    class="bg-gray-300 w-full focus:outline-none text-gray-700 pl-2" />
                <button class="pr-2"><i class="fas fa-search fill-current "></i></button>
            </div>
        </form>
    </div>
    <div class="w-1/7 flex justify-end items-center">
        <a href="/cart" class="mr-4">
            @if (Session::has('cart'))
            @if (count(Session::get('cart')) >= 1)
            <i class="fas fa-shopping-cart fa-lg">
                <span class="badge badge-cart">{{count(Session::get('cart'))}}</span>
            </i>
            @else
            <i class="fas fa-shopping-cart fa-lg"></i>
            @endif
            @else
            <i class="fas fa-shopping-cart fa-lg"></i>
            @endif
        </a>
        @if (Session::has('login'))
        <span class="mr-2">Hi, {{$account->customer->first_name}}</span>
        <span class=""><a href="/logout" class="text-teal-500 font-semibold">Logout</a></span>

        @else
        <a href="/login"
            class="bg-transparent hover:bg-teal-500 text-teal-500 hover:text-white font-bold py-2 px-4 border border-teal-500 hover:border-transparent shadow-md rounded-lg mr-2">
            Login
        </a>
        <a href="/register"
            class="bg-teal-500 text-white hover:bg-teal-700 hover:text-white font-bold py-2 px-4 shadow-md rounded-lg">
            Daftar
        </a>
        @endif
    </div>
</nav>