@extends('layouts.app')

@section('content')

<style>

/* CARD */
.product-card{
    background:#ffffff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

/* TABLE */
.table{
    background:#ffffff;
    border-radius:10px;
    overflow:hidden;
}

.table th{
    background:#0f172a;
    color:#fff;
}

.table td{
    vertical-align:middle;
}

/* IMAGE */
.product-img{
    width:60px;
    height:60px;
    object-fit:cover;
    border-radius:8px;
}

/* BUTTONS */
.btn{
    border-radius:8px;
    transition:0.2s;
}

.btn:hover{
    transform:scale(1.05);
}

/* HEADER */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
}

/* ANIMATION */
.fade-in{
    animation:fadeIn 0.4s ease-in-out;
}

@keyframes fadeIn{
    from{opacity:0;transform:translateY(10px);}
    to{opacity:1;transform:translateY(0);}
}

</style>

<div class="container fade-in">

    <!-- HEADER -->
    <div class="page-header">
        <h3 class="fw-bold">📦 Product Management</h3>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Add Product
        </a>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
    <div class="alert alert-success shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="product-card">

        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $p)
                <tr class="fade-in">
                    <td>{{ $p->id }}</td>

                    <td>
                        @if($p->image)
                        <img src="{{ asset('storage/'.$p->image) }}" class="product-img">
                        @else
                        <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td class="fw-semibold">{{ $p->name }}</td>

                    <td>
                        <span class="badge bg-secondary">
                            {{ $p->category }}
                        </span>
                    </td>

                    <td>
                        @if($p->quantity <= 5)
                            <span class="badge bg-danger">Low ({{ $p->quantity }})</span>
                        @else
                            <span class="badge bg-success">{{ $p->quantity }}</span>
                        @endif
                    </td>

                    <td class="fw-bold text-primary">
                        ₱{{ number_format($p->price,2) }}
                    </td>

                    <td>
                        <a href="{{ route('products.show',$p->id) }}" class="btn btn-info btn-sm mb-1">
                            View
                        </a>

                        <a href="{{ route('products.edit',$p->id) }}" class="btn btn-warning btn-sm mb-1">
                            Edit
                        </a>

                        <form action="{{ route('products.destroy',$p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this product?')">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        No products available 📦
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

        <!-- PAGINATION -->
        <div class="mt-3">
            {{ $products->links() }}
        </div>

    </div>

</div>

@endsection
