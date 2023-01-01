<header class="navbar navbar-expand navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav flex-row">
        <li class="d-flex nav-item px-2 ">
            <a class="m-auto nav-link text-light" href="/posts">All Posts</a>
        </li>
        <li class="nav-item ">
            <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
                aria-label="Search">
        </li>
    </ul>
    <ul class="nav flex-row  ms-auto">
        <li class="d-flex nav-item">
            <form class="d-flex" action="/logout" method="POST">
                @csrf
                <button class="m-auto nav-link dropdown-item text-light" type="submit">
                    <span data-feather='log-out'></span>Logout</button>
            </form>
        </li>
    </ul>

</header>
