<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAST_DANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @stack('styles')  <!-- Para agregar estilos personalizados desde otras vistas -->
</head>
<body>
  @yield('nav')

        <!-- Mensajes flash de Laravel (Éxito o Error) -->
        @if(session('mensaje'))
            <div class="alert alert-success mt-4">
                {{ session('mensaje') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Contenido de la página -->
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 LAST_DANCE. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')  <!-- Para agregar scripts personalizados desde otras vistas -->
</body>
</html>
