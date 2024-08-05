<section class="listHouses">
    <div class="presentation">
        <h2>@lang('messages.welcome_message')</h2>
        <p>@lang('messages.explore_apartments')</p>
    </div>
    <div class="list-houses">
        <a class="card-house" href="{{ url('apartments/2') }}">
            <img src="{{ asset('uploads/2/Terraza.jpg') }}" alt="">
            <h2>@lang('messages.apartment_2')</h2>

            <div class="specs">
                <div><i class="fa-solid fa-user-group"></i>
                    <p>@lang('messages.apartment_2_description')</p>
                </div>
                <div> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M28 2a2 2 0 0 1 2 2v24a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 2H4v15.5h.19c.37-.04.72-.17 1-.38l.14-.11A3.98 3.98 0 0 1 8 18c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.97 3.97 0 0 1 16 18c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.98 3.98 0 0 1 24 18c.99 0 1.94.35 2.67 1 .35.33.83.5 1.33.5v2h-.23a3.96 3.96 0 0 1-2.44-1A1.98 1.98 0 0 0 24 20c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 16 20c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 8 20c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1v3h.19c.37-.04.72-.17 1-.38l.14-.11A3.98 3.98 0 0 1 8 23c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.97 3.97 0 0 1 16 23c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.98 3.98 0 0 1 24 23c.99 0 1.94.35 2.67 1 .35.33.83.5 1.33.5v2h-.23a3.96 3.96 0 0 1-2.44-1A1.98 1.98 0 0 0 24 25c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 16 25c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 8 25c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1V28h24zm-6 3a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm0 2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                        </path>
                    </svg>
                    <p>@lang('messages.ocean_view')</p>
                </div>
                <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z">
                        </path>
                    </svg>
                    <p>@lang('messages.mini_kitchen')</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M23 1a2 2 0 0 1 2 1.85V19h4v2h-2v8h2v2H3v-2h2v-8H3v-2h4V3a2 2 0 0 1 1.85-2H9zM9 21H7v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm-10-8H9v6h6zm8 0h-6v6h6zM15 3H9v8h6zm8 0h-6v8h6z">
                        </path>
                    </svg>
                    <p>@lang('messages.terrace')</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M9 29v-2h2v-2H6a5 5 0 0 1-5-4.78V8a5 5 0 0 1 4.78-5H26a5 5 0 0 1 5 4.78V20a5 5 0 0 1-4.78 5H21v2h2v2zm10-4h-6v2h6zm7-20H6a3 3 0 0 0-3 2.82V20a3 3 0 0 0 2.82 3H26a3 3 0 0 0 3-2.82V8a3 3 0 0 0-2.82-3z">
                        </path>
                    </svg>
                    <p>@lang('messages.tv')</p>
                </div>
                <div>
                    <svg enable-background="new 0 0 510 510" viewBox="0 0 510 510" xmlns="http://www.w3.org/2000/svg"
                        style="display: block; height: 30px; width: 30px; fill: currentcolor;">><g>
                            <path
                                d="m465 97.5c-41.355 0-75 33.645-75 75v15h-75.25c-24.675 0-44.75 20.075-44.75 44.75v15.25h-225c-24.814 0-45 20.186-45 45v120h30v-75h240v75h240v-315zm-45 75c0-24.813 20.186-45 45-45h15v120h-60v-60zm-120 59.75c0-8.133 6.617-14.75 14.75-14.75h75.25v30h-90zm-270 75.25v-15c0-8.272 6.728-15 15-15h225v30zm270 75v-105h180v105z" />
                        </g></svg>
                    <p>@lang('messages.sofa_bed')</p>
                </div>
            </div>
        </a>
        <a class="card-house" href="{{ url('apartments/1') }}">
            <img src="{{ asset('uploads/1/Terraza.jpg') }}" alt="">
            <h2>@lang('messages.apartment_1')</h2>

            <div class="specs">
                <div><i class="fa-solid fa-user-group"></i>
                    <p>@lang('messages.apartment_1_description')</p>
                </div>
                <div> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M28 2a2 2 0 0 1 2 2v24a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 2H4v15.5h.19c.37-.04.72-.17 1-.38l.14-.11A3.98 3.98 0 0 1 8 18c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.97 3.97 0 0 1 16 18c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.98 3.98 0 0 1 24 18c.99 0 1.94.35 2.67 1 .35.33.83.5 1.33.5v2h-.23a3.96 3.96 0 0 1-2.44-1A1.98 1.98 0 0 0 24 20c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 16 20c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 8 20c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1v3h.19c.37-.04.72-.17 1-.38l.14-.11A3.98 3.98 0 0 1 8 23c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.97 3.97 0 0 1 16 23c.99 0 1.95.35 2.67 1 .35.33.83.5 1.33.5.5 0 .98-.17 1.33-.5A3.98 3.98 0 0 1 24 23c.99 0 1.94.35 2.67 1 .35.33.83.5 1.33.5v2h-.23a3.96 3.96 0 0 1-2.44-1A1.98 1.98 0 0 0 24 25c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 16 25c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1 3.98 3.98 0 0 1-2.67-1A1.98 1.98 0 0 0 8 25c-.5 0-.98.17-1.33.5a3.98 3.98 0 0 1-2.67 1V28h24zm-6 3a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm0 2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                        </path>
                    </svg>
                    <p>@lang('messages.ocean_view')</p>
                </div>
                <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M26 1a5 5 0 0 1 5 5c0 6.39-1.6 13.19-4 14.7V31h-2V20.7c-2.36-1.48-3.94-8.07-4-14.36v-.56A5 5 0 0 1 26 1zm-9 0v18.12c2.32.55 4 3 4 5.88 0 3.27-2.18 6-5 6s-5-2.73-5-6c0-2.87 1.68-5.33 4-5.88V1zM2 1h1c4.47 0 6.93 6.37 7 18.5V21H4v10H2zm14 20c-1.6 0-3 1.75-3 4s1.4 4 3 4 3-1.75 3-4-1.4-4-3-4zM4 3.24V19h4l-.02-.96-.03-.95C7.67 9.16 6.24 4.62 4.22 3.36L4.1 3.3zm19 2.58v.49c.05 4.32 1.03 9.13 2 11.39V3.17a3 3 0 0 0-2 2.65zm4-2.65V17.7c.99-2.31 2-7.3 2-11.7a3 3 0 0 0-2-2.83z">
                        </path>
                    </svg>
                    <p>@lang('messages.american_kitchen')</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M23 1a2 2 0 0 1 2 1.85V19h4v2h-2v8h2v2H3v-2h2v-8H3v-2h4V3a2 2 0 0 1 1.85-2H9zM9 21H7v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm-10-8H9v6h6zm8 0h-6v6h6zM15 3H9v8h6zm8 0h-6v8h6z">
                        </path>
                    </svg>
                    <p>@lang('messages.terrace')</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M9 29v-2h2v-2H6a5 5 0 0 1-5-4.78V8a5 5 0 0 1 4.78-5H26a5 5 0 0 1 5 4.78V20a5 5 0 0 1-4.78 5H21v2h2v2zm10-4h-6v2h6zm7-20H6a3 3 0 0 0-3 2.82V20a3 3 0 0 0 2.82 3H26a3 3 0 0 0 3-2.82V8a3 3 0 0 0-2.82-3z">
                        </path>
                    </svg>
                    <p>@lang('messages.tv')</p>
                </div>
                <div>
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                        style="enable-background:new 0 0 512 512; display: block; height: 24px; width: 24px; fill: currentcolor;"
                        xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M482,233.539V117.007c0-49.626-40.374-90-90-90h-94.5c-5.523,0-10,4.477-10,10s4.477,10,10,10H392 c38.598,0,70,31.402,70,70v106.005c-7.532-2.59-15.6-4.017-24-4.017h-2v-57.333c0-21.321-17.346-38.667-38.667-38.667H284.667 c-11.358,0-21.586,4.924-28.667,12.747c-7.081-7.823-17.309-12.747-28.667-12.747H114.667C93.346,122.995,76,140.341,76,161.661 v57.333h-2c-8.4,0-16.468,1.427-24,4.017V117.007c0-38.598,31.402-70,70-70h96.5c5.523,0,10-4.477,10-10s-4.477-10-10-10H120 c-49.626,0-90,40.374-90,90v116.533c-18.188,13.495-30,35.12-30,59.456v128c0,5.523,4.477,10,10,10h20v44c0,5.523,4.477,10,10,10 h54.012c5.523,0,10-4.477,10-10v-44h303.976v44c0,5.523,4.477,10,10,10H472c5.523,0,10-4.477,10-10v-44h20c5.523,0,10-4.477,10-10 v-128C512,268.659,500.188,247.034,482,233.539z M266,161.661c0-10.293,8.374-18.667,18.667-18.667h112.667 c10.293,0,18.667,8.374,18.667,18.667v57.333H266V161.661z M96,161.661c0-10.293,8.374-18.667,18.667-18.667h112.667 c10.293,0,18.667,8.374,18.667,18.667v57.333H96V161.661z M84.012,464.995H50v-34h34.012V464.995z M462,464.995h-34.012v-34H462 V464.995z M492,362.995H91.921c-5.523,0-10,4.477-10,10s4.477,10,10,10H492v28h-19.758c-0.081-0.002-0.16-0.012-0.242-0.012 h-54.012c-0.082,0-0.161,0.01-0.242,0.012H94.254c-0.081-0.002-0.16-0.012-0.242-0.012H40c-0.082,0-0.161,0.01-0.242,0.012H20 v-118c0-29.776,24.224-54,54-54h12h170h170h12c29.776,0,54,24.224,54,54V362.995z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M263.07,29.935c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21,1.07-7.07,2.93s-2.93,4.44-2.93,7.07s1.07,5.21,2.93,7.07 s4.44,2.93,7.07,2.93s5.21-1.07,7.07-2.93s2.93-4.43,2.93-7.07C266,34.375,264.93,31.794,263.07,29.935z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M59.15,365.924c-1.86-1.86-4.44-2.93-7.07-2.93c-2.64,0-5.21,1.07-7.07,2.93s-2.93,4.44-2.93,7.07s1.07,5.21,2.93,7.07 c1.86,1.86,4.44,2.93,7.07,2.93s5.21-1.07,7.07-2.93c1.86-1.86,2.93-4.44,2.93-7.07S61.01,367.784,59.15,365.924z" />
                            </g>
                        </g>
                    </svg>
                    <p>@lang('messages.one_bedroom')</p>
                </div>
            </div>
        </a>
    </div>
</section>
