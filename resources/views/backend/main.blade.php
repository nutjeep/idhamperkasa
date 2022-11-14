<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="developer" content="Muhammad Najib Abdulloh">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Goole font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>

    {{-- Bootstrap CSS and Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Animate CSS -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    {{-- Summernote --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.js"></script>

    {{-- Local CSS --}}
    {{-- <link rel="stylesheet" href="css/main.css"> --}}
    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <style>
      trix-toolbar [data-trix-button-group="file-tools"],
      trix-toolbar .trix-button--icon-heading-1,
      trix-toolbar .trix-button--icon-quote,
      trix-toolbar .trix-button--icon-strike,
      trix-toolbar .trix-button--icon-link,
      trix-toolbar .trix-button--icon-increase-nesting-level,
      trix-toolbar .trix-button--icon-decrease-nesting-level
      { display:none; }

      .create-product trix-toolbar [data-trix-button-group="file-tools"]
      {display: inherit;}

      .create-product trix-toolbar [data-trix-button-group="text-tools"],
      .create-product trix-toolbar [data-trix-button-group="block-tools"]
      { display:none; }
    </style>

    <title>{{ $title }}</title>
</head>
<body>
    @include('backend.header')

    <div class="container-fluid">
      <div class="row">
        @include('backend.sidebar')
  
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-4">
          @yield('container')
        </main>
  
      </div>
    </div>

    <script>
      const createTitle = document.querySelector('main #product_name');
      const createSlug = document.querySelector('main #slug');
  
      createTitle.addEventListener("keyup", function() {
        let preslug = createTitle.value;
        preslug = preslug.replace(/ /g,"-");
        createSlug.value = preslug.toLowerCase();
      });

      // Summernote
      $(document).ready(function() {
          $('#summernote').summernote();
      });
    </script>
            
    {{-- Bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    {{-- Feather Icons --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    {{-- <script src="js/main.js"></script> --}}
    <script src="{{ asset('summernote/summernote.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

</body>
</html>