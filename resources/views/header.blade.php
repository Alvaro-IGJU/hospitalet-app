<header>
    <a class="icon" href="{{ url('/') }}">CALAFAT</a>
    <nav>
        <ul class="">
            @if(isset($see_loft) && $see_loft)
            <li><a href="{{ url('apartments/2') }}">Ver loft</a></li>
            @endif
            @if(isset($see_apartment) &&  $see_apartment)
            <li><a href="{{ url('apartments/1') }}">Ver apartamento</a></li>
            @endif
        </ul>
    </nav>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</header>
