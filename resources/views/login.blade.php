<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
        }

        @media (min-width: 1025px) {
        .h-custom-2 {
        height: 90%;
        }
        }

        .fontAwesome {
        font-family: Helvetica, 'FontAwesome', sans-serif;
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 text-black">
      
              <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
      
                <form action="/login" method="POST" style="width: 23rem;">
                  @csrf
                  <h4 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;"><i class="fa-solid fa-bag-shopping" style="color: #ff0000;"></i> SIMS Web App</h4>
                  <h2 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Masuk atau buat akun<br>untuk memulai</h2>
      
                  @if (session()->has('loginError'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif

                  <div class="form-outline mb-4">
                    <input name="email" type="email" class="form-control fontAwesome @error('email')
                    is-invalid
                  @enderror" value="{{ old('email') }}" placeholder="&#xf1fa; masukkan email anda" />
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  </div>
      
                  <div class="form-outline mb-4">
                    <input name="password" type="password" class="form-control fontAwesome @error('password')
                    is-invalid
                  @enderror" placeholder="&#xf023; masukkan password anda" />
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  </div>
      
                  <div class="pt-1 d-grid mb-4">
                    <button class="btn btn-danger btn-lg btn-block" type="submit">Login</button>
                  </div>
      
                </form>
      
              </div>
      
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
              <img src="{{ asset('img/Frame 98699.png') }}"
                alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
          </div>
        </div>
      </section>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>