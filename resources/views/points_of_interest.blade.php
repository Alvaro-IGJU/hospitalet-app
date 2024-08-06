<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AÑADIR TITULO</title>
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
    <h2 class="title-points-interest">Información de interés de Calafat y alrededores:</h2>
<div class="list-interest">
    <a href="https://karting.circuitcalafat.com/" class="point-of-interest">
        <h5 class="title-link">Karting Calafat</h5>
        <img src="{{ asset('uploads/interesting_points/FotoKarting.webp') }}" alt="Karting Calafat">
    </a>
    <a href="https://www.visitametllademar.com/live" class="point-of-interest">
        <h5 class="title-link">L´Ametlla de Mar</h5>
        <img src="{{ asset('uploads/interesting_points/ametllademar.avif') }}" alt="L´Ametlla de Mar">
    </a>
    <a href="https://marinadiving.cat/" class="point-of-interest">
        <h5 class="title-link">Buceo</h5>
        <img src="{{ asset('uploads/interesting_points/marinadiving.png') }}" alt="Buceo">
    </a>
    <a href="https://karting.circuitcalafat.com/" class="point-of-interest">
        <h5 class="title-link">Experiencia con atunes</h5>
        <img src="{{ asset('uploads/interesting_points/FotoKarting.webp') }}" alt="Experiencia con atunes">
    </a>
    <a href="https://www.wikiloc.com/hiking-trails/gr-92-lametlla-de-mar-lampolla-16735726" class="point-of-interest">
        <h5 class="title-link">GR 92</h5>
        <img src="{{ asset('uploads/interesting_points/gr92.jpg') }}" alt="GR 92">
    </a>
    <a href="https://www.portaventuraworld.com/" class="point-of-interest">
        <h5 class="title-link">Portaventura</h5>
        <img src="{{ asset('uploads/interesting_points/portaventura.avif') }}" alt="Portaventura">
    </a>
    <a href="https://hospitalet-valldellors.cat/ca/el-mar/platges/beach_view/platja-del-torn" class="point-of-interest">
        <h5 class="title-link">Playa nudista del Torn (Hospitalet de l´Infant)</h5>
        <img src="{{ asset('uploads/interesting_points/playa_nudista_del_torn.jpeg') }}" alt="Playa nudista del Torn">
    </a>
    <a href="https://terresdelebre.travel/es" class="point-of-interest">
        <h5 class="title-link">Terres de l´Ebre</h5>
        <img src="{{ asset('uploads/interesting_points/terres_de_lebre.jpg') }}" alt="Terres de l´Ebre">
    </a>
    <a href="https://www.getyourguide.es/salou-l1884/" class="point-of-interest">
        <h5 class="title-link">Crucero desde Cambrils</h5>
        <img src="{{ asset('uploads/interesting_points/crucero_desde_cambrils.webp') }}" alt="Crucero desde Cambrils">
    </a>
    <a href="https://www.termesmontbrio.com/" class="point-of-interest">
        <h5 class="title-link">Spa termal</h5>
        <img src="{{ asset('uploads/interesting_points/spa_termal.jpg') }}" alt="Spa termal">
    </a>
    <a href="https://www.tarragonaturisme.cat/es" class="point-of-interest">
        <h5 class="title-link">Tarragona</h5>
        <img src="{{ asset('uploads/interesting_points/tarragona.jpg') }}" alt="Tarragona">
    </a>
    <a href="https://www.casinotarragona.com/" class="point-of-interest">
        <h5 class="title-link">Casino de Tarragona</h5>
        <img src="{{ asset('uploads/interesting_points/casino_de_tarragona.jpeg') }}" alt="Casino de Tarragona">
    </a>
    <a href="https://www.aena.es/es/reus.html?utm_source=Google&utm_medium=GMB_REU" class="point-of-interest">
        <h5 class="title-link">Aeropuerto Reus (40 km de Calafat)</h5>
        <img src="{{ asset('uploads/interesting_points/aeropuerto_reus.jpeg') }}" alt="Aeropuerto Reus">
    </a>
    <a href="https://www.aena.es/es/josep-tarradellas-barcelona-el-prat.html?utm_source=Google&utm_medium=GMB_BCN" class="point-of-interest">
        <h5 class="title-link">Aeropuerto Barcelona (135 km de Calafat)</h5>
        <img src="{{ asset('uploads/interesting_points/aeropuerto_barcelona.jpg') }}" alt="Aeropuerto Barcelona">
    </a>
</div>
    </section>
    @include('footer')

</body>
</html>