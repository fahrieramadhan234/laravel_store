<nav class="navbar container is-fluid" role="navigation" aria-label="main navigation">
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
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">
                            <span class="tag is-danger">{{count(Session::get('cart'))}}</span>
                        </span>
                        @else
                        <i class="fas fa-shopping-cart fa-lg"></i><span
                            class="badge rounded-circle badge-danger"></span>
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
</nav>