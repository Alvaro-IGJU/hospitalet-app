<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('uploads/logo/Archivo/SVG/DEF-02_icon.svg') }}">

    <link rel="stylesheet" href="{{ url('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/header_footer.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-************" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('header', ['see_loft' => true, 'see_apartment' => true, 'apartments' => $apartments])
    @include('list', ['apartments' => $apartments])

    @include('footer')

</body>

</html>
