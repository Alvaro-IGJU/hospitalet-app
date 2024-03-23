<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/header_footer.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-**" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="{{ url('css/show.css') }}" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
        var apartments = @json($apartments);
    </script>
    <link rel="stylesheet" href="{{ url('css/admin.css') }}" type="text/css">

</head>

<body>
    @include('header')
    <section class="all-apartments-data">
        @foreach ($apartments as $apartment)
            <div id="{{ $apartment->id }}" class="apartment-data">
                <h2 class="title-house">{{ $apartment->name }}</h2>

                <div class="btn-container">
                    <button class="btn btn-success">Agregar semana +</button>
                    <button class="btn btn-excel"><i class="fas fa-file-excel fa-lg" style="color: #3bce59;"></i> Descargar Excel</button>
                    <button class="btn btn-warning">Generar semanas automáticamente</button>
                </div>
                <div class="apartment-table">

                </div>
            </div>
        @endforeach
    </section>
    <div id="bottomSpace">

    </div>
    @include('footer')


    <script src="{{ asset('js/admin.js') }}"></script>
    {{-- <script src="{{ asset('js/calendarAdmin.js') }}"></script> --}}

</body>

</html>
