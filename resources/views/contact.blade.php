<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center justify-content-between w-100 p-3">
            <div class="h4 mb-0 fw-bold">FOODIES</div>
            <div class="d-flex gap-4">
                
                <a href="/menu" class="text-decoration-none text-dark fw-bold">Menu</a>
                <a href="/about" class="text-decoration-none text-dark fw-bold">About</a>
                <a href="/contact" class="text-decoration-none text-primary fw-bold">Contact</a>
                <a href="/services" class="text-decoration-none text-dark fw-bold">Services</a>
            </div>
        </div>
    </x-slot>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Contact Us</h2>
            <p class="text-muted">May mga katanungan o mungkahi ba kayo? May mensahe ba kayo kay Sir? Ipadala rito!</p>
            <hr class="w-25 mx-auto" style="border: 2px solid #7b98d2;">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <!-- Success Alert Box -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow border-0 p-4 rounded bg-light">
                    <!-- BINAGO: Nilagyan ng route at POST method -->
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pangalan</label>
                            <!-- BINAGO: Nilagyan ng name="name" at value="{{ old('name') }}" -->
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Ipasok ang iyong pangalan" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email Address</label>
                            <!-- BINAGO: Nilagyan ng name="email" at value="{{ old('email') }}" -->
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Mensahe</label>
                            <!-- BINAGO: Nilagyan ng name="message" at old content sa loob ng textarea -->
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4" placeholder="Isulat ang iyong mensahe rito..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 shadow-sm fw-bold" style="background-color: #7b98d2; border: none;">Ipadala ang Mensahe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Halimbawa ng view sa Admin Dashboard -->

</x-app-layout>