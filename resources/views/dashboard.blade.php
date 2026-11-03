<x-app-layout>
    <x-slot name="head">
        <!-- Datatables -->
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
        
        <!-- jQuery UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/themes/base/jquery-ui.min.css"
            integrity="sha512-TFee0335YRJoyiqz8hA8KV3P0tXa5CpRBSoM0Wnkn7JoJx1kaq1yXL/rb8YFpWXkMOjRcv5txv+C6UluttluCQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </x-slot>

    <!-- Navigation / Header -->
    <x-slot name="header">
        <!-- Inayos ang panloob na container gamit ang purong Tailwind p-3 at w-full -->
        <div class="flex items-center justify-between w-full p-3">
            <div class="text-xl mb-0 font-bold tracking-wider text-gray-900">FOODIES</div>
            <div class="flex gap-6">
                <a href="/menu" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Menu</a>
                <a href="/about" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">About</a>
                <a href="/contact" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Contact</a>
                <a href="/services" class="text-gray-900 font-bold hover:text-blue-600 transition-colors">Services</a>
            </div>
        </div>
    </x-slot>
 
    <!-- Main Content Container (Bootstrap: container my-5) -->
    <div class="max-w-7xl mx-auto px-4 my-12">
        
        <!-- Success Alert -->
        @if(session('success'))
            <!-- Bootstrap: alert alert-success alert-dismissible shadow-sm -->
            <div class="flex items-center justify-between p-4 mb-6 text-emerald-800 bg-emerald-50 border border-emerald-200 rounded-lg shadow-sm" role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove();" class="text-emerald-500 hover:text-emerald-700 font-bold text-lg px-2" aria-label="Close">×</button>
            </div>
        @endif
     
        <!-- Dashboard Stats Cards (Bootstrap: row g-4 mb-5) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8"> 
            <!-- Title Bar (Bootstrap: col-12) -->
            <div class="md:col-span-2">
                <div class="p-4 rounded-lg shadow bg-white border border-gray-100 text-center">
                    <h2 class="text-lg font-bold text-gray-800 m-0">Foodies Dashboard Overview</h2>
                </div>
            </div>

            <!-- Total Sales Card (Bootstrap: bg-primary) -->
            <div class="p-6 rounded-lg shadow-lg bg-blue-600 text-white text-center transition-transform hover:scale-[1.01]">
                <h5 class="text-xs uppercase tracking-wider text-blue-100 font-semibold mb-1">Total Sales</h5>
                <h2 class="text-3xl font-extrabold">${{ number_format($totalSales, 2) }}</h2>
            </div>
            
            <!-- Total Orders Card (Bootstrap: bg-success) -->
            <div class="p-6 rounded-lg shadow-lg bg-emerald-600 text-white text-center transition-transform hover:scale-[1.01]">
                <h5 class="text-xs uppercase tracking-wider text-emerald-100 font-semibold mb-1">Total Orders</h5>
                <h2 class="text-3xl font-extrabold">{{ $totalOrders }}</h2>
            </div>
        </div>
        
        <!-- Orders Table Section (Bootstrap: card shadow border-0) -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-100 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gray-50 border-b border-gray-200 p-4">
                <h5 class="mb-0 font-bold text-gray-800 text-center text-base">Recent Orders List</h5>
            </div>
            <!-- Card Body -->
            <div class="p-0 sm:p-2">
                <div class="overflow-x-auto">
                    <!-- Table Framework (Bootstrap: table table-striped table-hover) -->
                    <table class="w-full text-left border-collapse align-middle text-sm">
                        <thead class="bg-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="p-4 font-semibold text-gray-700 uppercase tracking-wider">Product Name</th>
                                <th class="p-4 font-semibold text-gray-700 uppercase tracking-wider">Price</th>
                                <th class="p-4 font-semibold text-gray-700 uppercase tracking-wider">Quantity</th>
                                <th class="p-4 font-semibold text-gray-700 uppercase tracking-wider">Total Amount</th>
                                <th class="p-4 font-semibold text-gray-700 uppercase tracking-wider">Order Date</th>
                                <th class="p-4 font-semibold text-gray-700 uppercase tracking-wider text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- Ginamit ang 'odd:bg-white even:bg-gray-50' para makuha ang striped table style -->
                        <tbody class="divide-y divide-gray-200">
                            @forelse($products as $product)
                                <tr class="odd:bg-white even:bg-gray-50/50 hover:bg-gray-100/80 transition-colors">
                                    <td class="p-4 font-bold text-gray-900">{{ $product->Product_name }}</td>
                                    <td class="p-4 text-gray-600 whitespace-nowrap">${{ number_format($product->Price, 2) }}</td>
                                    <td class="p-4 text-gray-600 whitespace-nowrap">{{ $product->Quantity }} pcs</td>
                                    <td class="p-4 text-emerald-600 font-bold whitespace-nowrap">${{ number_format($product->Total, 2) }}</td>
                                    <td class="p-4 text-gray-500 whitespace-nowrap">{{ $product->created_at->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
                                    <td class="p-4 text-center whitespace-nowrap">
                                        <!-- Delete Button Form -->
                                        <form action="{{ url('/products/'.$product->id) }}" method="POST" onsubmit="return confirm('Are you sure to DELETE?');" class="inline-block m-0">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Bootstrap: btn btn-danger btn-sm -->
                                            <button type="submit" class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-bold text-xs h-7 w-7 rounded shadow-sm transition duration-150">
                                                 ×
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-gray-400 py-12">
                                        <i class="fas fa-inbox fa-2x mb-2 text-gray-300"></i>
                                        <p class="text-base text-gray-500 mt-1">No orders found. Try ordering from the menu!</p>
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
