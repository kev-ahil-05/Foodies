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
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white p-3 text-center">
                <h4 class="mb-0 fw-bold">Customer Orders & Delivery List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>User ID</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Item Ordered</th>
                                <th>Qty</th>
                                <th>Phone</th>
                                <th>Total Amount</th>
                                <th>Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <!-- 1. User ID ng nag-order -->
                                    <td><span class="badge bg-secondary">#{{ $product->user_id ?? 'N/A' }}</span></td>
                                    
                                    <!-- 2. Pangalan ng Customer galing sa User Relationship -->
                                    <td class="fw-bold text-capitalize">
                                        {{ $product->user ? $product->user->name : 'Unknown User' }}
                                    </td>
                                    
                                    <!-- 3. Address (Inayos ang syntax error dito gamit ang ?? fallback) -->
                                    <td>{{ $product->user ? $product->user->address : 'No Address' }}</td>
                                    
                                    <!-- 4. Mga Detalye ng Order -->
                                    <td class="text-capitalize">{{ $product->Product_name }}</td>
                                    <td>{{ $product->Quantity }}</td>
                                    
                                    <!-- 5. Phone (May safe check na rin kung walang user) -->
                                    <td>{{ $product->user ? $product->user->phone : 'N/A' }}</td>
                                    
                                    <!-- 6. Total Amount -->
                                    <td class="fw-semibold text-success">${{ number_format($product->Total, 2) }}</td>
                                    
                                    <!-- 7. Petsa ng pag-order -->
                                    <td class="text-muted fs-7">{{ $product->created_at ? $product->created_at->format('M d, Y h:i A') : 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <!-- Naka-8 columns na rin para sakop buong table pag walang laman -->
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        No orders found. Sabihan ang mga customers na mag-order na!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>