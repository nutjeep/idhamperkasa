<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muhammad Najib 'Abduloh - Abdi Solution">

    <meta name="keywords" content="Surabaya, Perusahaan seal Surabaya, Perusahaan seal, Seal Maker, Seal berkualitas, CNC, Rubber product, Anti slip, Pallet, Membran">
    <meta title="CV. IDHAM PERKASA" content="CV.IDHAM PERKASA adalah perusahaan swasta yang bergerak di bidang Rubber Product (Seal, Anti Slip, Pallet, Membran, dll). Dengan didukung oleh sumber daya manusia yang berpengalaman di dalam lingkup karet dan ditunjang dengan mesin cetak & CNC modern">
    <meta name="description" content="CV. IDHAM PERKASA merupakan perusahaaan yang bergerak di bidang general supplier, untuk menjadi bagian support kebutuhan mitra kerja dalam bidang pengadaan barang. CV.IDHAM PERKASA juga melayani segala macam jenis cetak karet dengan berbagai bentuk untuk memenuhi kebutuhan pasar dan perkembangan  yang begitu pesat. Kami menggunakan mesin CNC dalam pembuatan matras moding agar menghasilkan matras dengan presisi yang cukup tinggi, sehingga memenuhi persyaratan untuk kebutuhan yang sangat spesifik. |@if($title == $product->product_name) {{ $product->product_name }} @endif">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="zNh5HQd2fqGuVak1hgKj7aHF8E8ODgxfJmMjHAj3WyE" />
    <meta name="theme-color" content="#1E6F5C, #E6DD3B">
    <link rel="canonical" href="{{ $canonical }}">
    
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Goole font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Animate CSS -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>{{ $title }}</title>
</head>
<body>
        <div class="container">
            @include('component.navbar')

            @yield('body')

            @include('component.footer')
        </div>
        
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>