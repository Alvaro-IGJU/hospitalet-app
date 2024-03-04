<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/header_footer.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-**" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Agrega las bibliotecas de Fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="{{ url('css/show.css') }}" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
</head>

<body>
    @include('header')
    <section class="show-house">
        <h2 class="title-house">{{ $apartment->name }}</h2>
        <div class="photos">
            @foreach ($photos as $index => $photo)
            @if ($index == 0)
            <a href="{{ asset($photo) }}" data-fancybox="gallery" class="first-photo">
                <img src="{{ asset($photo) }}" alt="Foto principal del apartamento">
            </a>
            @elseif ($index > 0 && $index < 5) @if ($index==1) <div class="side-photos">
                @endif
                <a href="{{ asset($photo) }}" data-fancybox="gallery" class="side-photo">
                    <img src="{{ asset($photo) }}" alt="Foto del apartamento">
                </a>
                @if ($index == 4)
        </div>
        @endif
        @else
        <a hidden href="{{ asset($photo) }}" data-fancybox="gallery" class="first-photo">
            <img src="{{ asset($photo) }}" alt="Foto principal del apartamento">
        </a>
        @endif
        @endforeach
        </div>
    </section>
    <section class="house-specs">
        <div class="specs-container">
            <h4>Algo que poner aquí</h4>
            <div class="separator"></div>
            <p>{{ $apartment->description }}</p>
            <div class="separator"></div>
            <div>
                @php
                $shownIds = [];
                @endphp

                @foreach ($apartment->icons as $icon)
                @if (!in_array($icon->id, $shownIds))
                <span>{!! $icon->tag !!}</span> <span>{{ $icon->text }}</span><br>
                @php
                $shownIds[] = $icon->id;
                @endphp
                @else
                <span class="hidden">{!! $icon->tag !!}</span> <span class="hidden">{{ $icon->text }}</span><br>
                @endif
                @endforeach




            </div>
        </div>
        <div class="specs-container">
            <div id='calendar'></div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12057.588654651208!2d0.8369571726501279!3d40.92896200360809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a115c7152cc26f%3A0x7997ac69c89313b3!2sCalafat%2C%20Tarragona!5e0!3m2!1ses!2ses!4v1709579150804!5m2!1ses!2ses" width="1600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <script src="{{ asset('js/calendar.js') }}"></script>



</body>

</html>