@extends('layouts.app')

@section('title', 'All Products - POS Grocery Store')

@section('content')
    <div class="page-header">
        <h1 class="page-title"><i class="fas fa-boxes"></i> Product Catalog</h1>
        <p class="page-subtitle">Browse our grocery selection ({{ count($items) }} items available)</p>
    </div>

    <div class="products-grid">
        @foreach($items as $item)
        <div class="product-card">
            <div class="product-image">
                <i class="fas fa-{{ $loop->index == 0 ? 'apple-alt' : ($loop->index == 1 ? 'tint' : 'bread-slice') }}"></i>
            </div>
            <h3 class="product-name">{{ $item['name'] }}</h3>
            <div class="product-price">₱{{ number_format($item['price'],2,',','.') }}</div>
            <div class="product-meta">
                <span>SKU: {{ $item['sku'] }}</span>
                <span class="stock-badge {{ $item['stock'] < 25 ? 'stock-low' : 'stock-high' }}">
                    {{ $item['stock'] }} in stock
                </span>
            </div>
            <div style="margin-bottom: 1rem; color: #718096; font-size: 0.9rem;">
                {{ $item['category'] }}
            </div>
            <a href="/items/{{ $item['id'] }}" class="btn-primary">
                <i class="fas fa-eye"></i> View Details
            </a>
        </div>
        @endforeach
    </div>
@endsection