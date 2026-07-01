<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center justify-content-between w-100 p-3">
            <div class="h4 mb-0 fw-bold">FOODIES</div>
            <div class="d-flex gap-4">
                
                <a href="/menu" class="text-decoration-none text-dark fw-bold">Menu</a>
                <a href="/about" class="text-decoration-none text-primary fw-bold">About</a>
                <a href="/contact" class="text-decoration-none text-dark fw-bold">Contact</a>
                <a href="/services" class="text-decoration-none text-dark fw-bold">Services</a>
            </div>
        </div>
    </x-slot>

    <div class="container my-5">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <h2 class="fw-bold text-dark mb-3">Tungkol sa FOODIES</h2>
                <h5 class="text-secondary mb-4">Ang Inyong Kasangga sa Masasarap na Pagkain</h5>
                <p class="text-muted lead fs-6" style="line-height: 1.8;">
                    Nagsimula ang FOODIES sa simpleng pangarap na maihatid ang pinakamasasarap na pagkain sa bawat pamilya nang mabilis at abot-kaya. Mula sa aming tanyag na Pizza, malalaking Hamburger, hanggang sa pampalamig na Milk Tea, sinisiguro naming may ngiti sa bawat subo ninyo.
                </p>
                <p class="text-muted fs-6">
                    Ang aming misyon ay magbigay ng maginhawang online ordering experience para sa lahat ng food lovers.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <div class="p-5 rounded shadow text-white text-center" style="background-color: #7b98d2;">
                    <h3 class="fw-bold display-4">100%</h3>
                    <p class="mb-0 fw-semibold text-uppercase">Satisified and Full Customers</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>