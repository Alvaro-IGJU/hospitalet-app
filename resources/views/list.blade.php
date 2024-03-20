<section class="listHouses">
    <div class="presentation">
        <h2>¡Bienvenido a nuestra página web!</h2>
        <p>Explora nuestros apartamentos en Calafat.</p>
    </div>
    <div class="list-houses">
        <a class="card-house" href="{{ url('apartments/2') }}">
            <img src="{{ asset('uploads/2/Terraza.jpg') }}" alt="">
            <h2>Loft en Calafat</h2>

            <div class="specs">
                <div><i class="fa-solid fa-bed"></i>1 habitación</div>
                <div><i class="fa-solid fa-plate-wheat"></i>Cocina</div>
                <div><i class="fa-solid fa-bath"></i>1 baño</div>
                <div><i class="fa-solid fa-ruler-combined"></i>100 m²</div>
                <div><i class="fa-solid fa-elevator"></i>Ascensor</div>
                <div> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M23 1a2 2 0 0 1 2 1.85V19h4v2h-2v8h2v2H3v-2h2v-8H3v-2h4V3a2 2 0 0 1 1.85-2H9zM9 21H7v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm-10-8H9v6h6zm8 0h-6v6h6zM15 3H9v8h6zm8 0h-6v8h6z">
                        </path>
                    </svg>
                    Balcón</div>
                <div><i class="fa-solid fa-fan"></i>Aire acondicionado</div>

            </div>
        </a>
        <a class="card-house" href="{{ url('apartments/1') }}">
            <img src="{{ asset('uploads/1/Terraza.jpg') }}" alt="">
            <h2>Calafat</h2>

            <div class="specs">
                <div><i class="fa-solid fa-bed"></i> 1 habitación</div>
                <div><i class="fa-solid fa-plate-wheat"></i>Cocina</div>
                <div><i class="fa-solid fa-bath"></i> 1 baño</div>
                <div><i class="fa-solid fa-ruler-combined"></i>100 m²</div>
                <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                        <path
                            d="M23 1a2 2 0 0 1 2 1.85V19h4v2h-2v8h2v2H3v-2h2v-8H3v-2h4V3a2 2 0 0 1 1.85-2H9zM9 21H7v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm-10-8H9v6h6zm8 0h-6v6h6zM15 3H9v8h6zm8 0h-6v8h6z">
                        </path>
                    </svg>Balcón</div>
                <div><i class="fa-solid fa-fan"></i>Aire acondicionado</div>
            </div>
        </a>
    </div>

</section>
