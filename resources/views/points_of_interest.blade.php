<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('messages.page_interest_title')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('uploads/logo/Archivo/SVG/DEF-02.svg') }}">

    <link rel="stylesheet" href="{{ url('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/header_footer.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/pointsofinterest.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-**" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
@include('header', ['see_loft' => true, 'see_apartment' => true])
    <section class="points-interest">
        <h2 class="title-points-interest">@lang('messages.information_interest')</h2>
        <div class="list-interest">
            <a href="https://karting.circuitcalafat.com/" class="point-of-interest">
                <h5 class="title-link">@lang('messages.karting_calafat')</h5>
                <img src="{{ asset('uploads/interesting_points/FotoKarting.webp') }}" alt="@lang('messages.alt_karting_calafat')">
            </a>
            <a href="https://www.visitametllademar.com/live" class="point-of-interest">
                <h5 class="title-link">@lang('messages.ametlla_de_mar')</h5>
                <img src="{{ asset('uploads/interesting_points/ametllademar.avif') }}" alt="@lang('messages.alt_ametlla_de_mar')">
            </a>
            <a href="https://marinadiving.cat/" class="point-of-interest">
                <h5 class="title-link">@lang('messages.diving')</h5>
                <img src="{{ asset('uploads/interesting_points/marinadiving.jpg') }}" alt="@lang('messages.alt_diving')">
            </a>
            <a href="https://tuna-tour.com/tuna-tour-experience/" class="point-of-interest">
                <h5 class="title-link">@lang('messages.tuna_experience')</h5>
                <img src="{{ asset('uploads/interesting_points/tunatour.png') }}" alt="@lang('messages.alt_tuna_experience')">
            </a>
            <a href="https://www.wikiloc.com/hiking-trails/gr-92-lametlla-de-mar-lampolla-16735726" class="point-of-interest">
                <h5 class="title-link">@lang('messages.gr92')</h5>
                <img src="{{ asset('uploads/interesting_points/gr92.jpg') }}" alt="@lang('messages.alt_gr92')">
            </a>
            <a href="https://www.portaventuraworld.com/" class="point-of-interest">
                <h5 class="title-link">@lang('messages.portaventura')</h5>
                <img src="{{ asset('uploads/interesting_points/portaventura.avif') }}" alt="@lang('messages.alt_portaventura')">
            </a>
            <a href="https://hospitalet-valldellors.cat/ca/el-mar/platges/beach_view/platja-del-torn" class="point-of-interest">
                <h5 class="title-link">@lang('messages.nudist_beach')</h5>
                <img src="{{ asset('uploads/interesting_points/playa_nudista_del_torn.jpeg') }}" alt="@lang('messages.alt_nudist_beach')">
            </a>
            <a href="https://terresdelebre.travel/es" class="point-of-interest">
                <h5 class="title-link">@lang('messages.terres_de_ebre')</h5>
                <img src="{{ asset('uploads/interesting_points/terres_de_lebre.jpg') }}" alt="@lang('messages.alt_terres_de_ebre')">
            </a>
            <a href="https://www.getyourguide.es/salou-l1884/" class="point-of-interest">
                <h5 class="title-link">@lang('messages.cambrils_cruise')</h5>
                <img src="{{ asset('uploads/interesting_points/crucero_desde_cambrils.webp') }}" alt="@lang('messages.alt_cambrils_cruise')">
            </a>
            <a href="https://www.termesmontbrio.com/" class="point-of-interest">
                <h5 class="title-link">@lang('messages.thermal_spa')</h5>
                <img src="{{ asset('uploads/interesting_points/spa_termal.jpg') }}" alt="@lang('messages.alt_thermal_spa')">
            </a>
            <a href="https://www.tarragonaturisme.cat/es" class="point-of-interest">
                <h5 class="title-link">@lang('messages.tarragona')</h5>
                <img src="{{ asset('uploads/interesting_points/tarragona.jpg') }}" alt="@lang('messages.alt_tarragona')">
            </a>
            <a href="https://www.casinotarragona.com/" class="point-of-interest">
                <h5 class="title-link">@lang('messages.tarragona_casino')</h5>
                <img src="{{ asset('uploads/interesting_points/casino-de-tarragona.png') }}" alt="@lang('messages.alt_tarragona_casino')">
            </a>
            <a href="https://www.aena.es/es/reus.html?utm_source=Google&utm_medium=GMB_REU" class="point-of-interest">
                <h5 class="title-link">@lang('messages.reus_airport')</h5>
                <img src="{{ asset('uploads/interesting_points/aeropuerto_reus.jpeg') }}" alt="@lang('messages.alt_reus_airport')">
            </a>
            <a href="https://www.aena.es/es/josep-tarradellas-barcelona-el-prat.html?utm_source=Google&utm_medium=GMB_BCN" class="point-of-interest">
                <h5 class="title-link">@lang('messages.barcelona_airport')</h5>
                <img src="{{ asset('uploads/interesting_points/aeropuerto_barcelona.jpg') }}" alt="@lang('messages.alt_barcelona_airport')">
            </a>
        </div>
    </section>
    @include('footer')
</body>
</html>
