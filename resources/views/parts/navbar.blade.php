    <nav class="navbar navbar-expand-lg text-dark bg-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Forum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ ($title=='Login')?'active border-bottom':'' }}" aria-current="page"
                            href="/">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title=='Posts')?'active border-bottom':'' }}" href="/posts">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>