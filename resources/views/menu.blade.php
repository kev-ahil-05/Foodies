<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center justify-content-between w-100 p-3">
            <div class="h4 mb-0 fw-bold">Menu</div>
            <div class="d-flex gap-4">
                <a href="/about" class="text-decoration-none text-dark fw-bold">About</a>
                <a href="/contact" class="text-decoration-none text-primary fw-bold">Contact</a>
                <a href="/services" class="text-decoration-none text-dark fw-bold">Services</a>
            </div>
        </div>
    </x-slot>

    <div class="container my-5">
        <div class="row g-4"> 
            
            <!-- 1. Trigger Button para sa ADD New Menu (Para sa Admin Lang) -->
            @auth
                @if(auth()->user()->role == 'admin')
                <div class="col-12 text-start mb-2">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addMenuModal" style="height: 40px; width: 150px;">
                        Add New Menu
                    </button>
                    
                     <!-- Palitan ang route('admin.page') ng route('admin.index') -->
                        <a href="{{ route('admin.index') }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="height: 40px; width: 150px; text-decoration: none;">
                        Admin Info        
                        </a>
                 
                </div>

                <!-- ADD MENU MODAL -->
                <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-dark">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="addMenuModalLabel">Add New Menu Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <form method="POST" action="{{ route('menus.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <label class="fw-bold d-block mb-1 text-start ps-2">Product Name</label>
                                    <input type="text" name="product_name" placeholder="ex: Pizza, Burger" class="form-control mb-3" required>
                                    
                                    <label class="fw-bold d-block mb-1 text-start ps-2">Product Image</label>
                                    <input type="file" name="product_image" class="form-control mb-3" accept="image/*" required>
                                    
                                    <label class="fw-bold d-block mb-1 text-start ps-2">Initial Quantity</label>
                                    <input type="number" name="quantity" placeholder="Qty" class="form-control w-100 mb-3 text-center" min="1" required>
                                    
                                    <label class="fw-bold d-block mb-1 text-start ps-2">Price ($)</label>
                                    <input type="number" name="price" placeholder="Price" class="form-control mb-4 text-center" min="0" step="0.01" required>
                                    
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary w-100" type="submit">Save Menu Item</button>
                                        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endauth

            <!-- Dashboard Banner Title -->
            <div class="col-12">
                <div class="p-4 rounded shadow text-black text-center" style="background-color: white;">
                    <h2 class="h5 font-weight-bold m-0">Foodies Orders</h2>
                </div>
            </div>
           
            <!-- 3. DYNAMIC MENU CARDS SECTION -->
            @forelse($Menus as $menu)
                <div class="col-md-4 mb-4">
                    <div class="p-4 rounded shadow bg-light text-black h-100 text-center d-flex flex-column justify-content-between position-relative">
                        
                        <!-- ADMIN CONTROLS: Lalabas lang sa bawat card kung admin ang naka-login -->
                        @auth
                            @if(auth()->user()->role == 'admin')
                            <div class="d-flex justify-content-end gap-2 mb-2">
                                <!-- Edit Trigger Button -->
                                <button type="button" class="btn btn-sm btn-warning text-white" data-bs-toggle="modal" data-bs-target="#updateMenuModal-{{ $menu->id }}">
                                    Edit
                                </button>
                                <!-- Delete Trigger Button -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMenuModal-{{ $menu->id }}">
                                    Delete
                                </button>
                            </div>
                            @endif
                        @endauth

                        <form method="POST" action="{{ url('/products') }}">
                            @csrf
                            <input type="hidden" name="Product_name" value="{{ $menu->product_name }}">
                            <input type="hidden" name="Price" value="{{ $menu->price }}">
                       
                            <label class="fw-bold d-block mb-2 text-capitalize fs-5">{{ $menu->product_name }}</label>
                            
                            <img src="{{ asset('assets/' . $menu->product_image) }}" alt="{{ $menu->product_name }}" class="rounded my-2" style="height: 80px; width: 90px; object-fit: cover;">
                            
                            <input type="number" placeholder="Qty" name="Quantity" class="form-control w-100 mb-2 text-center" min="1" required>
                            
                            <label class="d-block mb-2 fw-semibold text-muted">Price: ${{ number_format($menu->price, 2) }}</label>
                            
                            <button class="btn btn-primary w-100" type="submit">Order Now</button>
                        </form> 
                    </div>
                </div>

                <!-- UPDATE MENU MODAL (Naka-embed sa loop para makuha ang lumang value gamit ang ID) -->
                @auth
                    @if(auth()->user()->role == 'admin')
                    <div class="modal fade" id="updateMenuModal-{{ $menu->id }}" tabindex="-1" aria-labelledby="updateMenuModalLabel-{{ $menu->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="updateMenuModalLabel-{{ $menu->id }}">Update {{ $menu->product_name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <form method="POST" action="{{ route('menus.update', $menu->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT') <!-- Kailangan para sa route update function -->

                                        <label class="fw-bold d-block mb-1 text-start ps-2">Product Name</label>
                                        <input type="text" name="product_name" value="{{ old('product_name', $menu->product_name) }}" class="form-control mb-3" required>
                                        
                                        <label class="fw-bold d-block mb-1 text-start ps-2">Product Image (Leave blank if no change)</label>
                                        <input type="file" name="product_image" class="form-control mb-3" accept="image/*">
                                        
                                        <label class="fw-bold d-block mb-1 text-start ps-2">Quantity</label>
                                        <input type="number" name="quantity" value="{{ old('quantity', $menu->quantity) }}" class="form-control w-100 mb-3 text-center" min="1" required>
                                        
                                        <label class="fw-bold d-block mb-1 text-start ps-2">Price ($)</label>
                                        <input type="number" name="price" value="{{ old('price', $menu->price) }}" class="form-control mb-4 text-center" min="0" step="0.01" required>
                                        
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-warning text-white w-100" type="submit">Update Menu Item</button>
                                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE MENU MODAL -->
                    <div class="modal fade" id="deleteMenuModal-{{ $menu->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content text-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold text-danger">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    Sigurado ka ba na gusto mong burahin ang item na <strong>{{ $menu->product_name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('menus.destroy', $menu->id) }}" class="w-100 d-flex gap-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-secondary flex-grow-1" data-bs-dismiss="modal">Hindi</button>
                                        <button type="submit" class="btn btn-danger flex-grow-1">Oo, Burahin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endauth

            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">No menu items available. Click "Add New Menu" to upload one.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>