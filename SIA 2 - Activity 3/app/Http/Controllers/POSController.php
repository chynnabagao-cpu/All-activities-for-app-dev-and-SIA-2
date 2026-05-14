<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class POSController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('pos.index', compact('products'));
    }

    public function checkout(Request $request){
        $total = 0;

        foreach($request->cart as $item){
            $total += $item['price'] * $item['qty'];
        }

        // Create the order
        $order = Order::create([
            'total' => $total,
            'cash' => $request->cash,
            'change' => $request->cash - $total
        ]);

        // Loop through cart items
        foreach($request->cart as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'quantity' => $item['qty'],
                'price' => $item['price']
            ]);

            // Deduct stock from product
            $product = Product::find($item['id']);
            if($product){
                $product->quantity -= $item['qty'];

                // Ensure quantity doesn't go negative
                if($product->quantity < 0){
                    $product->quantity = 0;
                }

                $product->save();
            }
        }

        return response()->json([
            'success'=>true,
            'id'=>$order->id
        ]);
    }


    public function receipt($id){
        $order = Order::with('items')->findOrFail($id);
        return view('pos.receipt', compact('order'));
    }


    public function history()
    {
        $orders = Order::with('items')->latest()->get();
        return view('pos.history', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Delete related items first (optional but safe)
        $order->items()->delete();

        // Delete order
        $order->delete();

        return redirect('/history')->with('success', 'Order deleted successfully!');
    }


}
