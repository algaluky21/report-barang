@extends('layouts.main')

@section('container')
<!--<div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-regritration w-100 m-auto">
     
        <h1 class="h3 mb-3 fw-normal text-center">Registrasi Form</h1>
        <form action="/register" method="post">
          @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control roundep-top @error('name') is-invalid @enderror" placeholder="name" id="name">
          <label for="floatingInput">Nama </label>
          @error('name')
          <div class="invalid-feedback">
           {{$message}}
          </div>
          @enderror
        </div>

        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="floatingInput">Email Addres </label>
          </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control roundep-bot" id="password" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
    
        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>

      </form>
      <small class="d-block text-center" mt-3>Already registered? <a href="/login">Login</a></small>
  </main>
  </div>
</div>-->


 {{-- <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
      <div class="card border border-light-subtle rounded-3 shadow-sm">
        <div class="card-body p-3 p-md-3 p-xl-4">
          <div class="text-center mb-2">
            <a href="#!">
              <!--<img src="https://www.itsolutionstuff.com/assets/images/footer-logo-2.png" alt="BootstrapBrain Logo" width="250">-->
              <img src="/img/logo_CPI.PNG" alt="Bootstrap" width="225" height="125">
            </a>
          </div>
          <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Register to your account</h2>
            <!--@session('error')
                <div class="alert alert-danger" role="alert"> 
              
                </div>
            @endsession-->
             <div class="col-md-6">
            @if($errors->any())
            @foreach($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
            @endif
            <form action="/register" method="POST">
            @csrf
            <div class="row gy-2 overflow-hidden">
              <div class="col-12">
                <div class="form-floating mb-2">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}"  placeholder="name@example.com" required>
                  <label for="name" class="form-label">{{ __('Name') }}</label>
                </div>
                @error('name')
                      <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="col-12">
                <div class="form-floating mb-2">
                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}"  placeholder="name@example.com" required>
                  <label for="username" class="form-label">{{ __('Username') }}</label>
                </div>
                @error('name')
                      <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- <div class="col-12">
                <div class="form-floating mb-2">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('username') }}" placeholder="name@example.com" required>
                  <label for="email" class="form-label">{{ __('Email Address') }}</label>
                </div>
                @error('email')
                      <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div> 

              <div class="col-12">
                <div class="form-floating mb-2">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                  <label for="password" class="form-label">{{ __('Password') }}</label>
                </div>
                @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12">
                <div class="form-floating mb-2">
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="password_confirmation" required>
                  <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                </div>
                @error('password_confirmation')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12">
                <div class="d-grid my-3">
                  <button class="btn btn-primary btn-lg"</button>
                </div>
              </div>
              <div class="col-12">
                <p class="m-0 text-secondary text-center">Have an account? <a href="/login" class="link-primary text-decoration-none">Login</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div> --}} 

<div class="row justify-content-center">
  <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
    <div class="card border border-light-subtle rounded-3 shadow-sm">
      <div class="card-body p-3 p-md-3 p-xl-4">
        <div class="text-center mb-2">
          <a href="#!">
            <!--<img src="https://www.itsolutionstuff.com/assets/images/footer-logo-2.png" alt="BootstrapBrain Logo" width="250">-->
            <img src="/img/logo_CPI.PNG" alt="Bootstrap" width="225" height="125">
          </a>
        </div>
        <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Register to your account</h2>

        
            @if($errors->any())
            @foreach($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
            @endif
            <form action="/register" method="POST">
            @csrf
            <div class="row gy-2 overflow-hidden">
              <div class="col-12"> 
                <div class="form-floating mb-2">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}"  placeholder="name@example.com" required>
                  <label for="name" class="form-label">{{ __('Name') }}</label>
                </div>
                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

                    <div class="col-12">
                      <div class="form-floating mb-2">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}"  placeholder="name@example.com" required>
                        <label for="username" class="form-label">{{ __('Username') }}</label>
                      </div>
                      @error('name')
                            <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                  <div class="col-12">
                    <div class="form-floating mb-2">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                      <label for="password" class="form-label">{{ __('Password') }}</label>
                    </div>
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-2">
                      <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm" id="password_confirm" value="" placeholder="password_confirm" required>
                      <label for="password_confir" class="form-label">{{ __('Confirm Password') }}</label>
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>    
              <div class="col-12">
                <div class="d-grid my-2">
                  <button class="btn btn-primary mb-2">Register</button>

                  <a href="/barang" class="btn btn-danger" role="button" >Kembali</a>
                  <div class="col-12 mb-2">
                   
                  </div>
                  
                </div>
              </div>  
              </div>
              
            </form>
            
          </div>
      </div>
    </div>  
  </div>
</div>

@endsection