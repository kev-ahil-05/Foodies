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
                <!-- Ginawang Active Color (text-blue-600) dahil ito ang Contact page -->
                <a href="/contact" class="text-blue-600 font-bold">Contact</a>
                <a href="/services" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Services</a>
            </div>
        </div>
    </x-slot>

    <!-- Bootstrap: container my-5 -->
    <div class="max-w-7xl mx-auto px-4 my-20">
        <!-- Bootstrap: text-center mb-5 -->
        <div class="text-center mb-12">
            <!-- Bootstrap: fw-bold text-dark -->
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Contact Us</h2>
            <!-- Bootstrap: text-muted -->
            <p class="text-gray-500">May mga katanungan o mungkahi ba kayo? May mensahe ba kayo kay Sir? Ipadala rito!</p>
            <!-- Bootstrap: hr class="w-25 mx-auto" style="..." -->
            <hr class="w-1/4 mx-auto mt-4 border-2 border-[#7b98d2]">
        </div>

        <!-- Bootstrap: row justify-content-center -->
        <div class="flex justify-center">
            <!-- Bootstrap: col-md-6 -->
            <div class="w-full max-w-xl">
                
                <!-- Success Alert Box -->
                @if(session('success'))
                    <!-- Bootstrap: alert alert-success alert-dismissible fade show shadow-sm mb-4 -->
                    <!-- Dahil gumagamit ng Tailwind, tinanggal natin ang data-bs attributes ng Bootstrap dismiss button at gumamit ng simpleng flex layout -->
                    <div class="flex items-center justify-between p-4 mb-6 text-emerald-800 bg-emerald-50 border border-emerald-200 rounded-lg shadow-sm" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2 text-emerald-500"></i>
                            <span class="text-sm font-medium">{{ session('success') }}</span>
                        </div>
                        <button type="button" onclick="this.parentElement.remove();" class="text-emerald-500 hover:text-emerald-700 font-bold text-lg px-2" aria-label="Close">×</button>
                    </div>
                @endif

                <!-- Bootstrap: card shadow border-0 p-4 rounded bg-light -->
                <div class="bg-gray-50 rounded-lg shadow-lg border-0 p-6 sm:p-8">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        
                        <!-- Pangalan Input Section -->
                        <div class="mb-5">
                            <!-- Bootstrap: form-label fw-bold -->
                            <label class="block text-sm font-bold text-gray-700 mb-2">Pangalan</label>
                            <!-- Pinalitan ang form-control at is-invalid dynamic state gamit ang Blade @error directive -->
                            <input type="text" 
                                   name="name" 
                                   class="w-full px-4 py-2 text-sm bg-white border @error('name') border-red-500 focus:ring-red-400 @else border-gray-300 focus:ring-blue-400 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 transition duration-150" 
                                   placeholder="Ipasok ang iyong pangalan" 
                                   value="{{ old('name') }}" 
                                   required>
                            @error('name')
                                <!-- Bootstrap: invalid-feedback -->
                                <div class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Email Address Input Section -->
                        <div class="mb-5">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                            <input type="email" 
                                   name="email" 
                                   class="w-full px-4 py-2 text-sm bg-white border @error('email') border-red-500 focus:ring-red-400 @else border-gray-300 focus:ring-blue-400 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 transition duration-150" 
                                   placeholder="name@example.com" 
                                   value="{{ old('email') }}" 
                                   required>
                            @error('email')
                                <div class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Mensahe Textarea Section -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Mensahe</label>
                            <textarea name="message" 
                                      class="w-full px-4 py-2 text-sm bg-white border @error('message') border-red-500 focus:ring-red-400 @else border-gray-300 focus:ring-blue-400 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 transition duration-150" 
                                      rows="4" 
                                      placeholder="Isulat ang iyong mensahe rito..." 
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Bootstrap: btn btn-primary w-100 shadow-sm fw-bold sa native style -->
                        <button type="submit" class="w-full bg-[#7b98d2] hover:bg-[#6683be] text-white font-bold py-2.5 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-[#7b98d2] focus:ring-offset-2 transition duration-150">
                            Ipadala ang Mensahe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
