<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="developer" content="Muhammad Najib Abdulloh">

    <!-- Goole font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            background-image: linear-gradient(to bottom right, #165f4e, #3adaa2);
            height: 100vh;
            overflow: hidden;
        }
        main {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        main .form {
            background-color: rgba(255,255,255,0.5);
            padding: 2rem 1.5rem;
            border-radius: .8rem;
            transform: translateY(-20%);
            width: 450px;
            box-shadow: 5px 5px 10px rgba(0,0,0,0.2);
            z-index: 5;
        }

        main .form button {
            width: 100%;
        }

        main img {
            position: absolute;
            z-index: -1;
            transform: translateY(40%);
            width: 90%;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Login | IDHAM</title>
</head>
<body>
    <div class="container logo">
        <h1 style="color: white">IDHAM <span>PERKASA</span></h1>
    </div>
    <div class="navbar">
        <div class="container">
            <div class="toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/contact">Contact us</a></li>
            </ul>
        </div>
    </div>   

    <main>
        <div class="form">
            <h3 class="text-center mb-5 fw-bold text-white">Login Form</h3>

            @if(session()->has('loginError'))
                <div class="alert alert-danger" role="alert">
                    {{ session('loginError') }}
                </div>
            @endif

            <form action="/login" method="post">
                @csrf
                <div class="input">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="name@example.com" name="username" value="{{ old('username') }}" autofocus required>
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-floating mb-5">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                </div>
                <button class="btn btn-primary">Login</button>
            </form>
        </div>
        <img src="img/doodle.png" alt="doodle">
    </main>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>