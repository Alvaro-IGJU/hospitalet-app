<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:text-gray-300">Inicio</a></li>
                    <li><a href="#" class="hover:text-gray-300">Acerca</a></li>
                    <li><a href="#" class="hover:text-gray-300">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="container mx-auto mt-8">
        <div class="px-4">
            <h2 class="text-2xl font-bold mb-4">Bienvenido a mi sitio</h2>
            <p class="text-gray-800">Esta es una sección de ejemplo. Puedes modificarla según tus necesidades.</p>
        </div>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
