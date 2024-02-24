<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/header_footer.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-**" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Agrega las bibliotecas de Fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="{{ url('css/show.css') }}" type="text/css">

</head>

<body>
    @include('header')
    <section class="show-house">
        <h2 class="title-house">{{ $apartment->name }}</h2>
        <div class="photos">
            @foreach ($photos as $index => $photo)
                @if ($index == 0)
                    <a href="{{ asset($photo) }}" data-fancybox="gallery" class="first-photo">
                        <img src="{{ asset($photo) }}" alt="Foto principal del apartamento" >
                    </a>
                @elseif ($index > 0 && $index < 5)
                    @if ($index == 1)
                        <div class="side-photos">
                    @endif
                        <a href="{{ asset($photo) }}" data-fancybox="gallery" class="side-photo">
                            <img src="{{ asset($photo) }}" alt="Foto del apartamento" >
                        </a>
                    @if ($index == 4)
                        </div>
                    @endif
                @else
                <a hidden href="{{ asset($photo) }}" data-fancybox="gallery" class="first-photo">
                    <img src="{{ asset($photo) }}" alt="Foto principal del apartamento" >
                </a>
                @endif
            @endforeach
        </div>
    </section>
    @include('footer')

</body>

</html>