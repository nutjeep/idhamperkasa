<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="developer" content="M. Najib Abdulloh - Abdi Tech">

  <meta name="robots" content="index, follow">

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
  </style>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <title>Registration | IDHAM PERKASA</title>
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
      <h3 class="text-center mb-5 fw-bold text-white">Registration</h3>

      <form action="/registration" method="post">
        @csrf
        <div class="input">
          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autofocus required>
            <label for="email">Email</label>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" name="username" value="{{ old('username') }}" required>
            <label for="username">Username</label>
            @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
           
          <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <input class="mt-2" type="checkbox" onclick="show_password()"> Show password
          </div>

          <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="confirm password" name="password_confirmation" required>
            <label for="password_confirmation">Confirm password</label>
            @error('password_confirmation')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <input class="mt-2" type="checkbox" onclick="show_password_confirmation()"> Show confirmation
          </div>
        </div>
        <button class="btn btn-primary">Register</button>
      </form>
    </div>
  </main>

  <script>
    function show_password() {
      const password = document.getElementById("password");
      if ( password.type === "password" ) {
        password.type = "text"
      } else {
        password.type = "password"
      }
    }
    function show_password_confirmation() {
      const password = document.getElementById("password_confirmation");
      if ( password.type === "password" ) {
        password.type = "text"
      } else {
        password.type = "password"
      }
    }
  </script> 

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>