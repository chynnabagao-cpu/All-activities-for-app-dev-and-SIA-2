<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POS Grocery Store - Point of Sale')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #2d3748;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

        /* Header */
        .header {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        .header-content { display: flex; justify-content: space-between; align-items: center; }
        .logo h1 { font-size: 1.8rem; font-weight: 700; }
        .logo i { color: #48bb78; margin-right: 0.5rem; }
        .nav-link { color: white; text-decoration: none; font-weight: 500; padding: 0.5rem 1rem; border-radius: 8px; transition: all 0.3s; }
        .nav-link:hover { background: rgba(255,255,255,0.1); }

        /* Main Content */
        main { min-height: 80vh; padding: 3rem 0; }
        .page-header { text-align: center; margin-bottom: 3rem; }
        .page-title { font-size: 2.5rem; font-weight: 700; color: #2d3748; margin-bottom: 0.5rem; }
        .page-subtitle { color: #718096; font-size: 1.1rem; font-weight: 400; }

        /* Product Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        /* Product Card */
        .product-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }
        .product-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #48bb78, #38a169);
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
        }
        .product-image {
            width: 80px; height: 80px;
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1rem; font-size: 2rem;
        }
        .product-name { font-size: 1.25rem; font-weight: 600; color: #2d3748; margin-bottom: 0.5rem; }
        .product-price {
            font-size: 1.75rem; font-weight: 700;
            background: linear-gradient(135deg, #48bb78, #38a169);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.75rem;
        }
        .product-meta {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 1.5rem; font-size: 0.875rem; color: #718096;
        }
        .stock-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .stock-high { background: #c6f6d5; color: #22543d; }
        .stock-low { background: #fed7d7; color: #742a2a; }
        .btn-primary {
            width: 100%; padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white; text-decoration: none;
            border-radius: 12px; font-weight: 600;
            text-align: center; display: block;
            transition: all 0.3s; box-shadow: 0 4px 12px rgba(72,187,120,0.3);
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(72,187,120,0.4); }

        /* Detail Page */
        .product-detail { max-width: 800px; margin: 0 auto; }
        .detail-hero {
            background: white; border-radius: 24px;
            padding: 3rem; text-align: center;
            box-shadow: 0 20px 50px -10px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }
        .detail-hero .product-name { font-size: 2.5rem; font-weight: 700; color: #2d3748; }
        .detail-hero .product-price { font-size: 3rem; font-weight: 800; margin: 1rem 0; }
        .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
        .detail-section { background: white; padding: 2rem; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1); }
        .detail-label { font-weight: 600; color: #4a5568; margin-bottom: 0.5rem; display: block; }
        .detail-value { font-size: 1.125rem; color: #2d3748; }
        .btn-secondary {
            background: #718096; padding: 0.875rem 2rem;
            color: white; text-decoration: none;
            border-radius: 12px; font-weight: 600;
            display: inline-block; transition: all 0.3s;
        }
        .btn-secondary:hover { background: #4a5568; }

        /* Footer */
        footer { background: #1a202c; color: #a0aec0; text-align: center; padding: 2rem 0; margin-top: 4rem; }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content { flex-direction: column; gap: 1rem; }
            .products-grid { grid-template-columns: 1fr; }
            .detail-grid { grid-template-columns: 1fr; }
            .page-title { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-shopping-cart"></i>
                    <h1>POS Grocery Store</h1>
                </div>
                <a href="/items" class="nav-link">
                    <i class="fas fa-list"></i> All Products
                </a>
            </div>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p><i class="fas fa-shield-alt"></i> &copy; 2026 POS Grocery Store. POS mini System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>