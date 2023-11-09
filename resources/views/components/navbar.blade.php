<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container-xxl">
        <a class="navbar-brand" href="/dashboard">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/017/208/923/small/luxury-letter-a-logo-a-logotype-for-elegant-and-stylish-fashion-symbol-vector.jpg" alt="" style="width: 50px; margin: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/items">Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/logs">User Logs</a>
            </li>
        </ul>
        <div style="position: relative;">
            <a class="nav-link dropdown-toggle fs-6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                You are logged in as {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" style="left: 70px; top: 50px;">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="text-start" style="background-color: white; border: none; width: 100%;">Logout</button>
                    </form>
                </li>

            </ul>
        </div>

        </div>
    </div>
</nav>

