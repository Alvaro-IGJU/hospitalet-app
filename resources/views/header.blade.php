<header>
    <a class="icon" href="{{ url('/') }}">CALAFAT</a>
    <nav>
        <ul>
            @if(isset($see_loft) && $see_loft && (isset($apartments) && $apartments->get(1)->enabled || (isset($otherApartmentEnabled) && $otherApartmentEnabled)))
                <li><a href="{{ url('apartments/2') }}">@lang('messages.see_loft')</a></li>
            @endif
            @if(isset($see_apartment) && $see_apartment && (isset($apartments) && $apartments->get(0)->enabled || (isset($otherApartmentEnabled) && $otherApartmentEnabled)))
                <li><a href="{{ url('apartments/1') }}">@lang('messages.see_apartment')</a></li>
            @endif
        </ul>
    </nav>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</header>
