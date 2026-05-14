@extends('layouts.app')

@section('title', $item['name'] . ' - POS Grocery Store')

@section('content')
    <div class="product-detail">
        <div class="detail-hero">
            <i class="fas fa-{{ $item['id'] == 1 ? 'apple-alt' : ($item['id'] == 2 ? 'tint' : 'bread-slice') }}"
               style="font-size: 4rem; color: #48bb78; margin-bottom: 1rem;"></i>
            <h1 class="product-name">{{ $item['name'] }}</h1>
            <div class="product-price">₱{{ number_format($item['price'],2,',','.') }}</div>
        </div>

        <div class="detail-grid">
            <div class="detail-section">
                <h3 style="font-size: 1.5rem; font-weight: 600; color: #2d3748; margin-bottom: 1.5rem;">
                    <i class="fas fa-info-circle"></i> Product Information
                </h3>
                <div style="margin-bottom: 1.5rem;">
                    <span class="detail-label">SKU</span>
                    <div class="detail-value">{{ $item['sku'] }}</div>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <span class="detail-label">Category</span>
                    <div class="detail-value">{{ $item['category'] }}</div>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <span class="detail-label">Stock Status</span>
                    <div class="detail-value">
                        <span class="stock-badge {{ $item['stock'] < 25 ? 'stock-low' : 'stock-high' }}">
                            {{ $item['stock'] }} units available
                        </span>
                    </div>
                </div>
            </div>

            <div class="detail-section" style="text-align: center;">
                <h3 style="font-size: 1.5rem; font-weight: 600; color: #2d3748; margin-bottom: 2rem;">
                    <i class="fas fa-cash-register"></i> POS Actions
                </h3>
                <a href="/items" class="btn-secondary" style="margin-bottom: 1rem; display: block;">
                    <i class="fas fa-arrow-left"></i> Back to Catalog
                </a>
                <div style="background: #f7fafc; padding: 1.5rem; border-radius: 12px; border-left: 4px solid #48bb78;">
                    <p style="margin: 0; color: #4a5568; font-weight: 500;">
                        Ready for POS checkout at ₱{{ number_format($item['price'],2,',','.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection