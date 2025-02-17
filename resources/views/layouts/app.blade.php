<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100" style="background-image: url('/src/sfondo1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; ">

@include('partials.header')

<div class="container mx-auto my-6 p-6 bg-white/30 backdrop-blur-md rounded-lg shadow-lg ">
    @yield('content')
</div>

@include('partials.footer')

</body>
</html>

