<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = [
            ['id'=>1,'name'=>'Organic Fuji Apples','sku'=>'APPL-001','price'=>89.75,'stock'=>45,'category'=>'Fresh Produce'],
            ['id'=>2,'name'=>'Whole Milk Gallon','sku'=>'MILK-101','price'=>179.50,'stock'=>28,'category'=>'Dairy'],
            ['id'=>3,'name'=>'Premium White Bread','sku'=>'BRD-005','price'=>95.25,'stock'=>62,'category'=>'Bakery'],
            ['id'=>4,'name'=>'Coca-Cola 12oz (6-pack)','sku'=>'COLA-202','price'=>149.00,'stock'=>19,'category'=>'Beverages'],
            ['id'=>5,'name'=>'Free Range Eggs (Dozen)','sku'=>'EGGS-303','price'=>165.75,'stock'=>34,'category'=>'Dairy'],
            ['id'=>6,'name'=>'Ground Beef 80/20 (1lb)','sku'=>'BEEF-404','price'=>299.00,'stock'=>23,'category'=>'Meat'],
        ];

        return view('items.index', compact('items'));
    }

    public function show($id)
    {
        $items = [
            ['id'=>1,'name'=>'Organic Fuji Apples','sku'=>'APPL-001','price'=>89.75,'stock'=>45,'category'=>'Fresh Produce'],
            ['id'=>2,'name'=>'Whole Milk Gallon','sku'=>'MILK-101','price'=>179.50,'stock'=>28,'category'=>'Dairy'],
            ['id'=>3,'name'=>'Premium White Bread','sku'=>'BRD-005','price'=>95.25,'stock'=>62,'category'=>'Bakery'],
            ['id'=>4,'name'=>'Coca-Cola 12oz (6-pack)','sku'=>'COLA-202','price'=>149.00,'stock'=>19,'category'=>'Beverages'],
            ['id'=>5,'name'=>'Free Range Eggs (Dozen)','sku'=>'EGGS-303','price'=>165.75,'stock'=>34,'category'=>'Dairy'],
            ['id'=>6,'name'=>'Ground Beef 80/20 (1lb)','sku'=>'BEEF-404','price'=>299.00,'stock'=>23,'category'=>'Meat'],
        ];

        $item = collect($items)->firstWhere('id', $id);
        if (!$item) abort(404, 'Item not found');

        return view('items.show', compact('item'));
    }
}