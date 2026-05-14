@extends('layouts.app')

@section('content')

<style>
.form-card{
    background:#ffffff;
    padding:25px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.fade-in{
    animation:fadeIn 0.4s ease-in-out;
}

@keyframes fadeIn{
    from{opacity:0;transform:translateY(10px);}
    to{opacity:1;transform:translateY(0);}
}
</style>

<div class="container fade-in">

    <!-- TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">➕ Add Product</h3>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            ← Back
        </a>
    </div>

    <!-- ERROR DISPLAY -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM CARD -->
    <div class="form-card">

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('products.form')

            <!-- BUTTONS -->
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-success px-4">
                    💾 Save Product
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
