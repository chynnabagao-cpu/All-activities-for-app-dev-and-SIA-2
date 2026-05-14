@extends('layouts.app')

@section('content')

<style>

/* CARD STYLE */
.history-card{
    background:#ffffff;
    border-radius:12px;
    padding:20px;
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

/* BADGE ITEMS */
.item-badge{
    display:inline-block;
    background:#e2e8f0;
    padding:4px 8px;
    border-radius:6px;
    margin:2px;
    font-size:12px;
}

/* BUTTONS */
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

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
    <div class="alert alert-success shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">📊 Sales History</h3>
    </div>

    <div class="history-card">

        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Cash</th>
                    <th>Change</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($orders as $order)
                <tr class="fade-in">
                    <td>{{ $order->id }}</td>

                    <td>
                        {{ $order->created_at->format('M d, Y') }}<br>
                        <small class="text-muted">
                            {{ $order->created_at->format('h:i A') }}
                        </small>
                    </td>

                    <td>
                        @foreach($order->items as $item)
                            <span class="item-badge">
                                {{ $item->product_name }} (x{{ $item->quantity }})
                            </span>
                        @endforeach
                    </td>

                    <td class="fw-bold text-primary">
                        ₱{{ number_format($order->total,2) }}
                    </td>

                    <td>₱{{ number_format($order->cash,2) }}</td>

                    <td class="text-success fw-semibold">
                        ₱{{ number_format($order->change,2) }}
                    </td>

                    <td>
                        <a href="/receipt/{{ $order->id }}" class="btn btn-primary btn-sm mb-1">
                            View
                        </a>

                        <form action="{{ route('history.delete', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this order?')">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        No sales yet 🧾
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@endsection
