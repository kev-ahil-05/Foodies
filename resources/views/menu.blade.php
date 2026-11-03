<x-app-layout>
    <x-slot name="header">
        <!-- Bootstrap: d-flex align-items-center justify-content-between w-100 p-3 -->
        <div class="flex items-center justify-between w-full p-3">
            <div class="text-xl mb-0 font-bold tracking-wider text-gray-900">Menu</div>
            <div class="flex gap-6">
                <a href="/about" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">About</a>
                <!-- Ginawang active color dahil ito ang link sa Contact -->
                <a href="/contact" class="text-blue-600 font-bold">Contact</a>
                <a href="/services" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Services</a>
            </div>
        </div>
    </x-slot>

    <!-- Main Container (Bootstrap: container my-5) -->
    <div class="max-w-7xl mx-auto px-4 my-12" x-data="{ openAddModal: false }">
        
        <!-- 1. Trigger Button para sa ADD New Menu (Para sa Admin Lang) -->
        @auth
            @if(auth()->user()->role == 'admin')
            <div class="w-full text-left mb-6 flex gap-3">
                <!-- Add New Menu Button -->
                <button type="button" @click="openAddModal = true" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm h-10 w-36 rounded shadow transition duration-150 text-center">
                    Add New Menu
                </button>
                
                <!-- Admin Info Link -->
                <a href="{{ route('admin.index') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm h-10 w-36 rounded shadow transition duration-150 inline-flex items-center justify-center">
                    Admin Info        
                </a>
            </div>

            <!-- ADD MENU MODAL -->
            <div x-show="openAddModal" class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" x-cloak>
                <!-- Backdrop/Overlay -->
                <div class="fixed inset-0 bg-black/50 transition-opacity" @click="openAddModal = false"></div>

                <!-- Modal Content Wrapper -->
                <div class="bg-white rounded-lg shadow-xl overflow-hidden max-w-md w-full mx-4 z-10 border border-gray-100 transform transition-all p-6 text-gray-900">
                    <div class="flex items-center justify-between pb-3 border-b border-gray-200 mb-4">
                        <h5 class="text-lg font-bold">Add New Menu Item</h5>
                        <button type="button" @click="openAddModal = false" class="text-gray-400 hover:text-gray-600 font-bold text-xl">×</button>
                    </div>
                    
                    <form method="POST" action="{{ route('menus.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1 text-left">Product Name</label>
                            <input type="text" name="product_name" placeholder="ex: Pizza, Burger" class="w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1 text-left">Product Image</label>
                            <input type="file" name="product_image" class="w-full px-3 py-1.5 text-sm bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" accept="image/*" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1 text-left">Initial Quantity</label>
                            <input type="number" name="quantity" placeholder="Qty" class="w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-400" min="1" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1 text-left">Price ($)</label>
                            <input type="number" name="price" placeholder="Price" class="w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-400" min="0" step="0.01" required>
                        </div>
                        
                        <div class="flex flex-col gap-2 pt-2">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow transition duration-150" type="submit">Save Menu Item</button>
                            <button type="button" @click="openAddModal = false" class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-md shadow transition duration-150">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        @endauth

        <!-- Dashboard Banner Title (Bootstrap: col-12) -->
        <div class="w-full mb-8">
            <div class="p-4 rounded-lg shadow bg-white border border-gray-100 text-center">
                <h2 class="text-lg font-bold text-gray-800 m-0">Foodies Orders</h2>
            </div>
        </div>
       
        <!-- 3. DYNAMIC MENU CARDS SECTION (Bootstrap: row g-4) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($Menus as $menu)
                <!-- Card Container sa bawat produkto -->
                <div class="w-full" x-data="{ openEditModal: false, openDeleteModal: false }">
                    <div class="p-6 rounded-lg shadow bg-gray-50 border border-gray-100 text-gray-900 h-100 text-center flex flex-col justify-between relative transition-transform hover:scale-[1.01]">
                        
                        <!-- ADMIN CONTROLS -->
                        @auth
                            @if(auth()->user()->role == 'admin')
                            <div class="flex justify-end gap-2 mb-3">
                                <!-- Edit Button -->
                                <button type="button" @click="openEditModal = true" class="bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs px-3 py-1 rounded transition duration-150">
                                    Edit
                                </button>
                                <!-- Delete Button -->
                                <button type="button" @click="openDeleteModal = true" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs px-3 py-1 rounded transition duration-150">
                                    Delete
                                </button>
                            </div>
                            @endif
                        @endauth

                        <form method="POST" action="{{ url('/products') }}" class="flex flex-col items-center justify-between h-full w-full">
                            @csrf
                            <input type="hidden" name="Product_name" value="{{ $menu->product_name }}">
                            <input type="hidden" name="Price" value="{{ $menu->price }}">
                       
                            <label class="font-bold block mb-2 capitalize text-lg text-gray-900">{{ $menu->product_name }}</label>
                            
                            <!-- Image Framework -->
                            <img src="{{ asset('assets/' . $menu->product_image) }}" alt="{{ $menu->product_name }}" class="rounded-md my-2 h-20 w-24 object-cover shadow-sm">
                            
                            <input type="number" placeholder="Qty" name="Quantity" class="w-full max-w-[150px] px-3 py-1.5 text-sm bg-white border border-gray-300 rounded-md text-center mb-3 focus:outline-none focus:ring-2 focus:ring-blue-400" min="1" required>
                            
                            <label class="block mb-3 font-semibold text-gray-500 text-sm">Price: ${{ number_format($menu->price, 2) }}</label>
                            
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow transition duration-150" type="submit">Order Now</button>
                        </form> 
                    </div>

                    <!-- UPDATE MENU MODAL (Embedded sa loop para sa tamang IDs) -->
                    @auth
                        @if(auth()->user()->role == 'admin')
                        <div x-show="openEditModal" class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" x-cloak>
                            <div class="fixed inset-0 bg-black/50 transition-opacity" @click="openEditModal = false"></div>
                            <div class="bg-white rounded-lg shadow-xl overflow-hidden max-w-md w-full mx-4 z-10 p-6 text-gray-900">
                                <div class="flex items-center justify-between pb-3 border-b border-gray-200 mb-4">
                                    <h5 class="text-lg font-bold">Update {{ $menu->product_name }}</h5>
                                    <button type="button" @click="openEditModal = false" class="text-gray-400 hover:text-gray-600 font-bold text-xl">×</button>
                                </div>
                                
                                <form method="POST" action="{{ route('menus.update', $menu->id) }}" enctype="multipart/form-data" class="space-y-4">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div>
