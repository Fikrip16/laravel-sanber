<header id="header" class="header d-flex align-items-center sticky-top" style="border-top:10px solid #000;">
    <div class="container d-flex align-items-center justify-content-between">

        
        <a href="/" class="logo d-flex align-items-center" style="margin:0;">
            <h1 class="sitename m-0">BukuCerdas</h1><span>.</span>
        </a>

 
        
        <nav id="navmenu" class="navmenu">
            <ul class="d-flex align-items-center gap-2 list-unstyled m-0">
                <li><a href="/">Home</a></li>
                <li><a href="/genre">Genre</a></li>
                <li><a href="/books">Books</a></li>

                @auth
                    <li><a href="/profile">Profile</a></li>
                    <li>
                        <form action="/logout" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </li>

                  
                    <li>
                        <span class="btn btn-info btn-sm" style="pointer-events: none;">
                            {{ Auth()->user()->name }}
                        </span>
                    </li>
                @endauth

         
               
      @guest              
    <div class="btn-group" role="group">
        <a href="/login" class="btn btn-outline-primary btn-sm">Login</a>
        <a href="/register" class="btn btn-outline-info btn-sm">Register</a>
    </div>
    @endguest
</li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>


