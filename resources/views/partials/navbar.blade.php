{{-- <nav class="navbar navbar-expand-lg navbar-dark navbar navbar-light" style="background-color: #e3f2fd;">
    <nav class="navbar bg-body-tertiary">
    </nav>
    <div class="container">
      <nav class="navbar bg-body-black">
        <div class="container">
          <a class="navbar-brand" href="#">PT. Charoend Pokphand Indonesia Tbk.
           <img src="/img/logo_CPI.png" alt="Bootstrap" width="70" height="30">
          </a>
        </div>
      </nav>
      <!--<a class="navbar-brand" href="#">Exgrod </a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          
        </ul>
        <li class="nav-item dropdown " >
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item " href="#">Sepatu Compass</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Rucas</a></li>
          </ul>
        </li>
      </div>
    </div>
  </nav> --}}

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      {{-- <a class="navbar-brand" href="#">PT. Charoend Pokphand Indonesia Tbk. --}}
        <img src="/img/logo_CPI.png" alt="Bootstrap" width="70" height="30">
       </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
        </ul>
       
        <ul class="navbar-nav ms-auto">
            @auth
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome Back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/dashboard"> <i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
    
                  <li>
                    <form action="/logout" method="post">
                       @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
            @else
            <nav class="navbar bg-body-tertiary">
              <li class="nav-item">
                <a class="nav-link{{ ($active === "login") ? 'active' : '' }}" href="/login" > <i class="bi bi-box-arrow-in-right"></i> Login </a>
              </li>
            </nav>
            @endauth
        </ul>
        
        

       

      </div>
    </div>
  </nav>

