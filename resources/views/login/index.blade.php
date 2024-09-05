@extends('layouts.main')

@section('container')
<!--<div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-signin w-100 m-auto">
      <form>
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
        
    
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
    
        
        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>

      </form>
      <small class="d-block text-center" mt-3>Not registered? <a href="/register">Register Now!</a></small>
  </main>
  </div>
</div>-->

<div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm mt-5">
          @if(session()->has('success'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
          @endif

          @if(session()->has('loginError'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
          @endif

          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
                <!--<img src="https://www.itsolutionstuff.com/assets/images/footer-logo-2.png" alt="BootstrapBrain Logo" width="250">-->
                <img src="/img/logo_CPI.PNG" alt="Bootstrap" width="225" height="125">
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Login to your account</h2>
            <form action="/login" method="POST">
              @csrf

              {{-- @session('error')
                  <div class="alert alert-danger" role="alert"> 
                      
                  </div>
              @endsession --}}

              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" autofocus required>
                    <label for="username" class="form-label">{{ __('Username') }}</label>
                  </div>
                  @error('username')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                  </div>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="d-flex gap-2 justify-content-between">
                    {{-- <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                      <label class="form-check-label text-secondary" for="rememberMe">
                        Keep me logged in
                      </label>
                    </div> --}}
                    {{-- <a href="#!" class="link-primary text-decoration-none">{{ __('forgot password?') }}</a> --}}
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">{{ __('Login') }}</button>
                  </div>
                  <a href="/" class="btn btn-danger" role="button" >Kembali</a>
                </div>
                <div class="col-12">
                  {{-- <p class="m-0 text-secondary text-center">Don't have an account? <a href="/register" class="link-primary text-decoration-none">Register</a></p> --}}
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection