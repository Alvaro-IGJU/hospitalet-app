<header>
    <a class="icon" href="{{ url('/') }}"> <img src="{{ asset('uploads/logo/Archivo/SVG/DEF-02.svg') }}" alt=""><span class="headerTitle">CALAFAT</span></a>
    <nav>
        <ul>
            @if(isset($see_loft) && $see_loft && (isset($apartments) && $apartments->get(1)->enabled || (isset($otherApartmentEnabled) && $otherApartmentEnabled)))
                <li><a href="{{ url('apartments/2') }}">@lang('messages.see_loft')</a></li>
            @endif
            @if(isset($see_apartment) && $see_apartment && (isset($apartments) && $apartments->get(0)->enabled || (isset($otherApartmentEnabled) && $otherApartmentEnabled)))
                <li><a href="{{ url('apartments/1') }}">@lang('messages.see_apartment')</a></li>
            @endif
            <li><a href="{{ url('pointsofinterest') }}">@lang('messages.information_interest_header')</a></li>

        </ul>
    </nav>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</header>
