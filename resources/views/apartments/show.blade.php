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
                @elseif ($index > 0 && $index < 5)
                    @if ($index == 1)
                        <div class="side-photos">
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
            <div class="specs">
                <h4>¿Qué hay en este alojamiento?</h4>

                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                    focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;"></svg> --}}
                <h5>Vistas panorámicas</h5>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M28 2a2 2 0 0 1 2 2v24a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 2H4v15.5h.19c.37-.04.72-.17 1-.38l.14-.11A3.98 3.98 0 0 1 8 18c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.97 3.97 0 0 1 16 18c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.98 3.98 0 0 1 24 18c.99 0 1.94.35 2.67 1 .35.33.83.5 1.33.5v2h-.23a3.96 3.96 0 0 1-2.44-1A1.98 1.98 0 0 0 24 20c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 16 20c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 8 20c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1v3h.19c.37-.04.72-.17 1-.38l.14-.11A3.98 3.98 0 0 1 8 23c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.97 3.97 0 0 1 16 23c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.98 3.98 0 0 1 24 23c.99 0 1.94.35 2.67 1 .35.33.83.5 1.33.5v2h-.23a3.96 3.96 0 0 1-2.44-1A1.98 1.98 0 0 0 24 25c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 16 25c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 8 25c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1V28h24zm-6 3a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm0 2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                        </path>
                    </svg>
                    <p>Vistas al mar</p>
                </div>
                <div class="separator-spec"></div>

                <h5>Baño</h5>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M14 27v.2a4 4 0 0 1-3.8 3.8H4v-2h6.15a2 2 0 0 0 1.84-1.84L12 27zM10 1c.54 0 1.07.05 1.58.14l.38.07 17.45 3.65a2 2 0 0 1 1.58 1.79l.01.16v6.38a2 2 0 0 1-1.43 1.91l-.16.04-13.55 2.83 1.76 6.5A2 2 0 0 1 15.87 27l-.18.01h-3.93a2 2 0 0 1-1.88-1.32l-.05-.15-1.88-6.76A9 9 0 0 1 10 1zm5.7 24-1.8-6.62-1.81.38a9 9 0 0 1-1.67.23h-.33L11.76 25zM10 3a7 7 0 1 0 1.32 13.88l.33-.07L29 13.18V6.8L11.54 3.17A7.03 7.03 0 0 0 10 3zm0 2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6z">
                        </path>
                    </svg>
                    <p>Secador</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Productos de limpieza</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Gel de ducha</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Agua caliente</p>
                </div>
                <div class="separator-spec"></div>
                <h5>Dormitorio y lavandería</h5>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Lavadora</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Elementos básicos</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Perchas</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Ropa de cama</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Almohadas y mantas adicionales</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Plancha</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Tendedero para ropa</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Espacio para guardar la ropa: armario</p>
                </div>
                <div class="separator-spec"></div>
                <h5>Entretenimiento</h5>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>TV</p>
                </div>
                <div class="separator-spec"></div>
                <div class="individual-spec">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                       
                    </svg>
                    <p>Libros y material de lectura</p>
                </div>
                <div class="separator-spec"></div>
                <h5>para familias</h5>

            </div>
        </div>
        <div class="specs-container">
            <div id='calendar'></div>
        </div>
    </section>
    <script src="{{ asset('js/calendar.js') }}"></script>


</body>

</html>
