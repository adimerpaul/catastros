<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos2.css">
     <!-- Scripts -->
     <script src="{{ mix('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
</head>

<body>
<div id="app">
<header>
    
    <nav>
       
        <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Home</a>
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
        <a href="{{ route('register') }}" class="text-sm text-gray-700 underline">Register</a>
        
    </nav>
    <section class="textos-header">
        <historial-componet></historial-componet>
       
    </section>
   <!-- <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
            style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                style="stroke: none; fill: #fff;"></path>
        </svg></div>-->
</header>
<main>
    
    <p>
    </p>
</main>
<footer>
    <div class="contenedor-footer">
        <div class="content-foo">
            <h4>Telefono</h4>
            <p>8296312</p>
        </div>
        <div class="content-foo">
            <h4>Email</h4>
            <p>8296312</p>
        </div>
        <div class="content-foo">
            <h4>Ubicacion</h4>
            <p>8296312</p>
        </div>
    </div>
    <h2 class="titulo-final">&copy; Catastros | GAMO</h2>
</footer>
</div>

</body>

</html>
