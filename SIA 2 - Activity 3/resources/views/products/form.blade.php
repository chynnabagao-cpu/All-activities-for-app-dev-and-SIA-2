<div class="card p-4 shadow-sm rounded fade-in">

    <!-- Name -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $product->name ?? '') }}" required>
    </div>

    <!-- Category -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Category</label>
        <input type="text" name="category" class="form-control"
               value="{{ old('category', $product->category ?? '') }}" required>
    </div>

    <!-- Quantity -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Quantity</label>
        <input type="number" name="quantity" class="form-control" min="0"
               value="{{ old('quantity', $product->quantity ?? '') }}" required>
    </div>

    <!-- Price -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Price</label>
        <input type="text" name="price" class="form-control"
               value="{{ old('price', $product->price ?? '') }}" required>
    </div>

    <!-- Supplier -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Supplier</label>
        <input type="text" name="supplier" class="form-control"
               value="{{ old('supplier', $product->supplier ?? '') }}">
    </div>

    <!-- Image -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Product Image</label>
        <input type="file" name="image" class="form-control">
        @if(isset($product) && $product->image)
            <img src="{{ asset('storage/'.$product->image) }}"
                 alt="Product Image" class="mt-2 rounded" width="100">
        @endif
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary w-100">
            {{ isset($product) ? 'Update Product' : 'Add Product' }}
        </button>
    </div>

</div>
