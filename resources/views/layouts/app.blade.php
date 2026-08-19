<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'VegQuality - Consultoria em FLV Processados.')</title>
  <meta name="description" content="@yield('meta_description', 'Soluções tecnológicas e biotecnologia para extensão de shelf-life e segurança dos alimentos na sua produção. Reduza oxidação e perdas com VegQuality.')">
  
  <!-- Fontes -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <x-navbar />

  <main class="main-content">
    @yield('content')
  </main>

  <x-footer />

</body>
</html>
