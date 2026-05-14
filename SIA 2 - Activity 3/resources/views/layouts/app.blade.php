<!DOCTYPE html>
<html>
<head>
<title>POS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* GLOBAL */
body{
    background:#f4f6f9;
    color:#1e293b;
    font-family: 'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar{
    background:#ffffff !important;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

/* BRAND */
.navbar-brand{
    font-weight:600;
    color:#0f172a !important;
}

/* CARDS */
.card{
    border:none;
    border-radius:12px;
    background:#ffffff;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-3px);
}

/* PRODUCT IMAGE */
.product-img{
    height:140px;
    object-fit:cover;
    border-radius:8px;
}

/* CART */
.cart{
    background:#ffffff;
    padding:15px;
    border-radius:10px;
}

/* BUTTONS */
.btn{
    border-radius:8px;
    transition:0.2s;
}

.btn:hover{
    transform:scale(1.05);
}

/* TABLE */
.table{
    background:#ffffff;
}

.table th{
    background:#f1f5f9;
}

/* FADE ANIMATION */
.fade-in{
    animation:fadeIn 0.4s ease-in-out;
}

@keyframes fadeIn{
    from{opacity:0;transform:translateY(10px);}
    to{opacity:1;transform:translateY(0);}
}

</style>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar mb-3">
    <div class="container d-flex justify-content-between align-items-center">

        <a href="{{ route('pos.index') }}" class="navbar-brand">
            🛒 POS System
        </a>

        <div class="d-flex gap-2">

            <a href="{{ route('pos.index') }}" class="btn btn-outline-primary btn-sm">POS</a>
            <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm">Manage Products</a>
            <a href="/history" class="btn btn-dark btn-sm">History</a>

        </div>

    </div>
</nav>

<!-- CONTENT -->
<div class="container fade-in">
    @yield('content')
</div>

@yield('scripts')

</body>
</html>
