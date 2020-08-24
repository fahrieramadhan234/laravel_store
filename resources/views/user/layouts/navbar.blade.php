<nav class="navbar navbar-light bg-light container-fluid">
    <div class="col-sm-2">
        <a class="navbar-brand">Navbar</a>
    </div>
    <div class="col-sm-7 ">
        <form class="" action="/cart">
            <div class="input-group">
                <div class="input-group">
                    <input type="text" name="search" id="search" value="test"
                        placeholder="Search accounts, contracts and transactions" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-btn">
                            <button type="submit" name="commit" class="btn btn-primary" data-disable-with="Search">
                                <i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-3 bg-grey text-right">
        <a href="/cart" class="mr-3">
            @if (Session::has('cart'))
            <i class="fas fa-shopping-cart fa-lg"></i><span
                class="badge badge-danger rounded-circle noti-icon-badge">{{count(Session::get('cart'))}}</span>
            @else
            <i class="fas fa-shopping-cart fa-lg"></i><span class="badge rounded-circle badge-danger"></span>
            @endif
        </a>
        @if (Session::has('login'))
        <span>
            <span>Hi, </span>{{$account->customer->first_name}}
            <a href="/logout" class="btn btn-link btn-sm">Logout</a>
        </span>
        @else
        <a href="/login" class="btn btn-outline-primary mr-2">Login</a>
        <a href="/register" class="btn btn-primary">Daftar</a>
        @endif
    </div>
</nav>