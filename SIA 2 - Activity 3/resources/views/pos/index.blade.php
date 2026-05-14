@extends('layouts.app')

@section('content')

<style>

/* LIGHT MODE ONLY */
body {
    background: #f4f6f9;
    color: #1e293b;
}

/* Card */
.card {
    background: #ffffff;
    color: #1e293b;
    border-radius: 12px;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-3px);
}

/* Table */
.table {
    background: #ffffff;
}

.table th {
    background: #f1f5f9;
}

.table td, .table th {
    vertical-align: middle;
}

/* Inputs */
.form-control {
    background: #ffffff;
    color: #1e293b;
    border-radius: 8px;
}

/* Product Image */
.product-img {
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
}

/* Cart buttons */
.cart-btn {
    border: none;
    background: #e2e8f0;
    padding: 5px 10px;
    border-radius: 6px;
    transition: 0.2s;
}

.cart-btn:hover {
    background: #cbd5f5;
}

/* Fade animation */
.fade-in {
    animation: fadeIn 0.4s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

</style>

<div class="row">

<!-- PRODUCTS -->
<div class="col-md-8">
<div class="row">

@foreach($products as $p)
<div class="col-md-4 mb-4 fade-in">
<div class="card p-3 text-center">

    @if($p->image)
    <img src="{{ asset('storage/'.$p->image) }}" class="product-img w-100 mb-2">
    @endif

    <h5 class="mt-2">{{ $p->name }}</h5>
    <p class="text-primary fw-bold">₱{{ number_format($p->price,2) }}</p>

    <button class="btn btn-primary w-100"
    onclick="addToCart({{ $p->id }},'{{ $p->name }}',{{ $p->price }})">
    Add to Cart
    </button>

</div>
</div>
@endforeach

</div>
</div>

<!-- CART -->
<div class="col-md-4">
<div class="card p-3 fade-in">

<h4 class="mb-3">🛒 Cart</h4>

<table class="table table-bordered text-center">
<thead>
<tr>
<th>Item</th>
<th>Qty</th>
<th>Total</th>
<th></th>
</tr>
</thead>
<tbody id="cart"></tbody>
</table>

<h5>Total: ₱<span id="total">0</span></h5>

<input type="number" id="cash" class="form-control mt-2" placeholder="Enter cash">

<h5 class="mt-2">Change: ₱<span id="change">0</span></h5>

<button class="btn btn-success w-100 mt-3" onclick="checkout()">
Checkout
</button>

</div>
</div>

</div>
@endsection

@section('scripts')
<script>

let cart = {};

function addToCart(id,name,price){
    if(!cart[id]) cart[id]={id,name,price,qty:1};
    else cart[id].qty++;

    animateCart();
    render();
}

function increase(id){ cart[id].qty++; render(); }

function decrease(id){
    if(cart[id].qty>1) cart[id].qty--;
    else delete cart[id];
    render();
}

function removeItem(id){
    delete cart[id];
    render();
}

function render(){
    let html='', total=0;

    Object.values(cart).forEach(i=>{
        let sub=i.qty*i.price;
        total+=sub;

        html+=`
        <tr class="fade-in">
        <td>${i.name}</td>
        <td>
        <button class="cart-btn" onclick="decrease(${i.id})">-</button>
        ${i.qty}
        <button class="cart-btn" onclick="increase(${i.id})">+</button>
        </td>
        <td>₱${sub.toFixed(2)}</td>
        <td><button class="cart-btn" onclick="removeItem(${i.id})">✕</button></td>
        </tr>`;
    });

    document.getElementById('cart').innerHTML=html;
    document.getElementById('total').innerText=total.toFixed(2);

    computeChange();
}

function computeChange(){
    let total=parseFloat(document.getElementById('total').innerText)||0;
    let cash=parseFloat(document.getElementById('cash').value)||0;
    let change=cash-total;
    document.getElementById('change').innerText=change>=0?change.toFixed(2):0;
}

document.getElementById('cash').addEventListener('input', computeChange);

function animateCart(){
    const cartBox = document.querySelector('.col-md-4 .card');
    cartBox.style.transform = "scale(1.05)";
    setTimeout(()=> cartBox.style.transform = "scale(1)", 150);
}

function checkout(){
    let total=parseFloat(document.getElementById('total').innerText)||0;
    let cash=parseFloat(document.getElementById('cash').value)||0;

    if(cash<total){
        alert("Insufficient cash!");
        return;
    }

    fetch('/checkout',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        body:JSON.stringify({
            cart:Object.values(cart),
            cash:cash
        })
    })
    .then(res=>res.json())
    .then(data=>{
        if(data.success){
            window.location='/receipt/'+data.id;
        }
    });
}

</script>
@endsection
