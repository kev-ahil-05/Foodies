<x-app-layout>
    <x-slot name="header">
        <!-- Bootstrap: d-flex align-items-center justify-content-between w-100 p-3 -->
        <div class="flex items-center justify-between w-full p-3">
            <!-- Bootstrap: h4 mb-0 fw-bold -->
            <div class="text-xl mb-0 font-bold">FOODIES</div>
            <!-- Bootstrap: d-flex gap-4 -->
            <div class="flex gap-4">
                <a href="/menu" class="text-gray-900 font-bold hover:text-green-600 transition-colors">Menu</a>
                <a href="/about" class="text-gray-900 font-bold hover:text-green-600 transition-colors">About</a>
                <!-- Ginawang Active Color (text-green-600) para tugma sa theme ng Orders page -->
                <a href="/contact" class="text-green-600 font-bold">Contact</a>
                <a href="/services" class="text-gray-900 font-bold hover:text-green-600 transition-colors">Services</a>
            </div>
        </div>
    </x-slot>

    <!-- Bootstrap: container my-5 -->
    <div class="max-w-7xl mx-auto px-4 my-20">
        <!-- Bootstrap: card shadow border-0 -->
        <div class="bg-white rounded-lg shadow-lg border-0 overflow-hidden">
            
            <!-- Bootstrap: card-header bg-success text-white p-3 text-center -->
            <div class="bg-emerald-600 text-white p-4 text-center">
                <!-- Bootstrap: h4 mb-0 fw-bold -->
                <h4 class="text-xl font-bold">Customer Orders & Delivery List</h4>
            </div>
            
            <!-- Bootstrap: card-body -->
            <div class="p-6">
                <!-- Bootstrap: table-responsive -->
                <div class="overflow-x-auto">
                    <!-- Bootstrap: table table-hover align-middle -->
                    <table class="w-full text-left border-collapse align-middle">
                        <!-- Bootstrap: table-light -->
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">User ID</th>
                                <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Customer Name</th>
                                <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Address</th>
                                <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Item Ordered</th>
                                <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Qty</th>
                                <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Phone</th>
                                <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Total Amount</th>
                                <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Order Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($products as $product)
                                <!-- Ang 'hover:bg-gray-50' ang pumalit sa Bootstrap 'table-hover' -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <!-- 1. User ID (Bootstrap: badge bg-secondary) -->
                                    <td class="p-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-500 text-white">
                                            #{{ $product->user_id ?? 'N/A' }}
                                        </span>
                                    </td>
                                    
                                    <!-- 2. Customer Name (Bootstrap: fw-bold text-capitalize) -->
                                    <td class="p-4 font-bold capitalize text-gray-900">
                                        {{ $product->user ? $product->user->name : 'Unknown User' }}
                                    </td>
                                    
                                    <!-- 3. Address -->
                                    <td class="p-4 text-gray-600">
                                        {{ $product->user ? $product->user->address : 'No Address' }}
                                    </td>
                                    
                                    <!-- 4. Item Ordered (Bootstrap: text-capitalize) -->
                                    <td class="p-4 capitalize text-gray-800">
                                        {{ $product->Product_name }}
                                    </td>
                                    
                                    <!-- Qty -->
                                    <td class="p-4 text-gray-600">
                                        {{ $product->Quantity }}
                                    </td>
                                    
                                    <!-- 5. Phone -->
                                    <td class="p-4 text-gray-600 whitespace-nowrap">
                                        {{ $product->user ? $product->user->phone : 'N/A' }}
                                    </td>
                                    
                                    <!-- 6. Total Amount (Bootstrap: fw-semibold text-success) -->
                                    <td class="p-4 font-semibold text-emerald-600 whitespace-nowrap">
                                        ${{ number_format($product->Total, 2) }}
                                    </td>
                                    
                                    <!-- 7. Order Date (Bootstrap: text-muted fs-7) -->
                                    <td class="p-4 text-gray-500 text-xs whitespace-nowrap">
                                        {{ $product->created_at ? $product->created_at->format('M d, Y h:i A') : 'N/A' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <!-- Bootstrap: text-center py-4 text-muted -->
                                    <td colspan="8" class="text-center py-8 text-gray-500 text-base">
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
