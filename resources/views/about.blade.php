<x-app-layout>
    <x-slot name="header">
        <!-- Pinalitan ang w-100 -> w-full, p-3 -> p-3 -->
        <div class="flex items-center justify-between w-full p-3">
            <!-- Pinalitan ang h4, mb-0, fw-bold -> text-xl mb-0 font-bold -->
            <div class="text-xl mb-0 font-bold">FOODIES</div>
            <!-- Pinalitan ang d-flex, gap-4 -> flex gap-4 -->
            <div class="flex gap-4">
                <!-- Tinanggal ang text-decoration-none (default na sa Tailwind) at text-dark/text-primary -> text-gray-900 / text-blue-600 -->
                <a href="/menu" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Menu</a>
                <a href="/about" class="text-blue-600 font-bold">About</a>
                <a href="/contact" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Contact</a>
                <a href="/services" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Services</a>
            </div>
        </div>
    </x-slot>

    <!-- Pinalitan ang container, my-5 -> max-w-7xl mx-auto px-4 my-20 -->
    <div class="max-w-7xl mx-auto px-4 my-20">
        <!-- Pinalitan ang row, align-items-center, g-5 -> grid md:grid-cols-2 items-center gap-12 -->
        <div class="grid md:grid-cols-2 items-center gap-12">
            <div>
                <!-- Pinalitan ang fw-bold, text-dark, mb-3 -> font-bold text-gray-900 text-3xl mb-3 -->
                <h2 class="font-bold text-gray-900 text-3xl mb-3">Tungkol sa FOODIES</h2>
                <!-- Pinalitan ang text-secondary, mb-4 -> text-gray-600 text-xl mb-4 -->
                <h5 class="text-gray-600 text-xl mb-4">Ang Inyong Kasangga sa Masasarap na Pagkain</h5>
                <!-- Pinalitan ang text-muted, lead, fs-6, style -> text-gray-500 text-lg leading-relaxed -->
                <p class="text-gray-500 text-lg leading-relaxed">
                    Nagsimula ang FOODIES sa simpleng pangarap na maihatid ang pinakamasasarap na pagkain sa bawat pamilya nang mabilis at abot-kaya. Mula sa aming tanyag na Pizza, malalaking Hamburger, hanggang sa pampalamig na Milk Tea, sinisiguro naming may ngiti sa bawat subo ninyo.
                </p>
                <!-- Pinalitan ang text-muted, fs-6 -> text-gray-500 text-base mt-4 -->
                <p class="text-gray-500 text-base mt-4">
                    Ang aming misyon ay magbigay ng maginhawang online ordering experience para sa lahat ng food lovers.
                </p>
            </div>
            <!-- Pinalitan ang text-center -> text-center -->
            <div class="text-center">
                <!-- Pinalitan ang p-5, rounded, shadow, style -> p-12 rounded-lg shadow-lg bg-[#7b98d2] text-white -->
                <div class="p-12 rounded-lg shadow-lg bg-[#7b98d2] text-white">
                    <!-- Pinalitan ang fw-bold, display-4 -> font-bold text-6xl md:text-7xl mb-2 -->
                    <h3 class="font-bold text-6xl md:text-7xl mb-2">100%</h3>
                    <!-- Pinalitan ang mb-0, fw-semibold, text-uppercase -> mb-0 font-semibold uppercase tracking-wider -->
                    <p class="mb-0 font-semibold uppercase tracking-wider">Satisfied and Full Customers</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
