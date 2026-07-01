<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center justify-content-between w-100 p-3">
            <div class="h4 mb-0 fw-bold">FOODIES</div>
            <div class="d-flex gap-4">
                
                <a href="/menu" class="text-decoration-none text-dark fw-bold">Menu</a>
                <a href="/about" class="text-decoration-none text-dark fw-bold">About</a>
                <a href="/contact" class="text-decoration-none text-dark fw-bold">Contact</a>
                <a href="/services" class="text-decoration-none text-primary fw-bold">Services</a>
            </div>
        </div>
    </x-slot>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Our Services</h2>
            <p class="text-muted">Paano namin kayo sasalubungin ng masasarap na pagkain?</p>
            <hr class="w-25 mx-auto" style="border: 2px solid #7b98d2;">
        </div>

        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-md-4">
                <div class="p-4 rounded shadow bg-white text-center h-100 border border-light">
                    <div class="mb-3 text-primary fs-1">🚀</div>
                    <h4 class="fw-bold">Fast Delivery</h4>
                    <p class="text-muted text-sm">Mabilis at mainit na makakarating ang paborito mong pagkain diretso sa pintuan ng iyong bahay.</p>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="col-md-4">
                <div class="p-4 rounded shadow bg-white text-center h-100 border border-light">
                    <div class="mb-3 text-success fs-1">🍳</div>
                    <h4 class="fw-bold">Fresh Quality</h4>
                    <p class="text-muted text-sm">Laging bago, malinis, at de-kalidad na mga sangkap ang ginagamit ng aming mga eksperto sa pagluluto.</p>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="col-md-4">
                <div class="p-4 rounded shadow bg-white text-center h-100 border border-light">
                    <div class="mb-3 text-warning fs-1">🎉</div>
                    <h4 class="fw-bold">Catering Events</h4>
                    <p class="text-muted text-sm">Handa kaming magsilbi sa inyong mga kaarawan, kasal, o kahit anong selebrasyon na kailangan ng masarap na handaan.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>