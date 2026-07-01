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
        <div class="flex items-center justify-between w-full">
            <div class="d-flex align-items-center justify-content-between w-100 p-3">
                <div class="h4 mb-0 fw-bold">FOODIES</div>
                <div class="d-flex gap-4">
                    <a href="/menu" class="text-decoration-none text-dark fw-bold hover:text-blue-500">Menu</a>
                    <a href="/about" class="text-decoration-none text-dark fw-bold hover:text-blue-500">About</a>
                    <a href="/contact" class="text-decoration-none text-dark fw-bold hover:text-blue-500">Contact</a>
                    <a href="/services" class="text-decoration-none text-dark fw-bold hover:text-blue-500">Services</a>
                </div>
            </div>
        </div>
    </x-slot>
 
    <!-- Main Content Container -->
    <div class="container my-5">
        
        <!-- Success Alert -->
        
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
             
             
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
            
            </div>
        @endif
     
        <!-- Dashboard Stats Cards -->
        <div class="row g-4 mb-5"> 
            <div class="col-12">
                <div class="p-3 rounded shadow text-black text-center" style="background-color: white;">
                    <h2 class="h5 font-weight-bold m-0">Foodies Dashboard Overview</h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 rounded shadow bg-primary text-white h-100 text-center">
                    <h5 class="text-uppercase tracking-wide">Total Sales</h5>
                    <h2 class="fw-bold mb-0">${{ number_format($totalSales, 2) }}</h2>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="p-4 rounded shadow bg-success text-white h-100 text-center">
                    <h5 class="text-uppercase tracking-wide">Total Orders</h5>
                    <h2 class="fw-bold mb-0">{{ $totalOrders }}</h2>
                </div>
            </div>
        </div>
        
        <!-- Orders Table Section -->
        <div class="card shadow border-0">
            <div class="card-header bg-light text-black p-3">
                <h5 class="mb-0 fw-bold text-center">Recent Orders List</h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Order Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td class="fw-bold text-secondary">{{ $product->Product_name }}</td>
                                    <td>${{ number_format($product->Price, 2) }}</td>
                                    <td>{{ $product->Quantity }} pcs</td>
                                    
                                    <td class="text-success fw-bold">${{ number_format($product->Total, 2) }}</td>
                                   <td>{{ $product->created_at->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
   
   
                                    <td class="text-center">
                                        <!-- Delete Button Form -->
                                        <form action="{{ url('/products/'.$product->id) }}" method="POST" onsubmit="return confirm('Are you sure to DELETE?');" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                         <button type="submit" class="btn btn-danger btn-sm px-3 shadow-sm">
                                                 x
                                         </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2"></i><br>
                                        No orders found. Try ordering from the menu!
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