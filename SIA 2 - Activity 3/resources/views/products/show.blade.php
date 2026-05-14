@extends('layouts.app')

@section('content')

<style>

/* CARD */
.detail-card{
    background:#ffffff;
    border-radius:12px;
    padding:25px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

/* IMAGE */
.product-img{
    width:100%;
    max-width:250px;
    height:250px;
    object-fit:cover;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

/* LABEL */
.label{
    font-weight:600;
    color:#64748b;
}

/* VALUE */
.value{
    font-weight:500;
}

/* ROW */
.detail-row{
    display:flex;
    justify-content:space-between;
    padding:10px 0;
    border-bottom:1px solid #e2e8f0;
}

/* BUTTON */
.btn{
    border-radius:8px;
    transition:0.2s;
}

.btn:hover{
    transform:scale(1.05);
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

    <h3 class="fw-bold mb-4">📦 Product Details</h3>

    <div class="detail-card">

        <div class="row align-items-center">

            <!-- IMAGE -->
            <div class="col-md-4 text-center mb-3">
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" class="product-img">
                @else
                    <div class="text-muted">No Image</div>
                @endif
            </div>

            <!-- DETAILS -->
            <div class="col-md-8">

                <div class="detail-row">
                    <span class="label">Name</span>
                    <span class="value">{{ $product->name }}</span>
                </div>

                <div class="detail-row">
                    <span class="label">Category</span>
                    <span class="value badge bg-secondary">
                        {{ $product->category }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="label">Stock</span>
                    <span class="value">
                        @if($product->quantity <= 5)
                            <span class="badge bg-danger">Low ({{ $product->quantity }})</span>
                        @else
                            <span class="badge bg-success">{{ $product->quantity }}</span>
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="label">Price</span>
                    <span class="value text-primary fw-bold">
                        ₱{{ number_format($product->price,2) }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="label">Supplier</span>
                    <span class="value">{{ $product->supplier ?? 'N/A' }}</span>
                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="mt-4 text-end">
            <a href="{{ route('products.index') }}" class="btn btn-primary">
                ← Back to Products
            </a>
        </div>

    </div>

</div>

@endsection
