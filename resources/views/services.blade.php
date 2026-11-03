<x-app-layout>
    <x-slot name="header">
        <!-- Bootstrap: d-flex align-items-center justify-content-between w-100 p-3 -->
        <div class="flex items-center justify-between w-full p-3">
            <!-- Bootstrap: h4 mb-0 fw-bold -->
            <div class="text-xl mb-0 font-bold">FOODIES</div>
            <!-- Bootstrap: d-flex gap-4 -->
            <div class="flex gap-4">
                <a href="/menu" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Menu</a>
                <a href="/about" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">About</a>
                <a href="/contact" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Contact</a>
                <!-- Ginawang Active Color (text-blue-600) dahil ito ang Services page -->
                <a href="/services" class="text-blue-600 font-bold">Services</a>
            </div>
        </div>
    </x-slot>

    <!-- Bootstrap: container my-5 -->
    <div class="max-w-7xl mx-auto px-4 my-20">
        <!-- Bootstrap: text-center mb-5 -->
        <div class="text-center mb-12">
            <!-- Bootstrap: fw-bold text-dark -->
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Our Services</h2>
            <!-- Bootstrap: text-muted -->
            <p class="text-gray-500">Paano namin kayo sasalubungin ng masasarap na pagkain?</p>
            <!-- Bootstrap: hr class="w-25 mx-auto" style="..." -->
            <hr class="w-1/4 mx-auto mt-4 border-2 border-[#7b98d2]">
        </div>

        <!-- Bootstrap: row g-4 -> grid grid-cols-1 md:grid-cols-3 gap-6 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Service 1 (Fast Delivery) -->
            <!-- Bootstrap: col-md-4 -> pinalitan ng automatic grid structural handle -->
            <div class="p-6 rounded-lg shadow-lg bg-white text-center h-full border border-gray-100 transition-transform hover:scale-[1.02] duration-150">
                <!-- Bootstrap: mb-3 text-primary fs-1 -->
                <div class="mb-4 text-4xl">🚀</div>
                <!-- Bootstrap: fw-bold -->
                <h4 class="text-lg font-bold text-gray-900 mb-2">Fast Delivery</h4>
                <!-- Bootstrap: text-muted text-sm -->
                <p class="text-gray-500 text-sm leading-relaxed">Mabilis at mainit na makakarating ang paborito mong pagkain diretso sa pintuan ng iyong bahay.</p>
            </div>

            <!-- Service 2 (Fresh Quality) -->
            <div class="p-6 rounded-lg shadow-lg bg-white text-center h-full border border-gray-100 transition-transform hover:scale-[1.02] duration-150">
                <div class="mb-4 text-4xl">🍳</div>
                <h4 class="text-lg font-bold text-gray-900 mb-2">Fresh Quality</h4>
                <p class="text-gray-500 text-sm leading-relaxed">Laging bago, malinis, at de-kalidad na mga sangkap ang ginagamit ng aming mga eksperto sa pagluluto.</p>
            </div>

            <!-- Service 3 (Catering Events) -->
            <div class="p-6 rounded-lg shadow-lg bg-white text-center h-full border border-gray-100 transition-transform hover:scale-[1.02] duration-150">
                <div class="mb-4 text-4xl">🎉</div>
                <h4 class="text-lg font-bold text-gray-900 mb-2">Catering Events</h4>
                <p class="text-gray-500 text-sm leading-relaxed">Handa kaming magsilbi sa inyong mga kaarawan, kasal, o kahit anong selebrasyon na kailangan ng masarap na handaan.</p>
            </div>
        </div>
    </div>
</x-app-layout>
