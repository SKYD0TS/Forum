    <div class="container mt-2">
        <nav class="navbar navbar-expand-sm navbar-dark rounded-4" style="background-color: #7888ee;">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">Forum</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ $title == 'Posts' ? 'active border-bottom' : '' }}"
                                href="/posts">Posts</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ $title == 'Login' ? 'active border-bottom' : '' }}"
                                    aria-current="page" href="/login">Login</a>
                            </li>
                        @endauth
                    </ul>

                </div>
            </div>
        </nav>

    </div>
