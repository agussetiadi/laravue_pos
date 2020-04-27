<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class OrderController extends Controller
{
    
    public function addOrder()
    {
    	$products = Product::orderBy('created_at', 'DESC');
    	return view('orders.add', compact('products'));
    }

    public function getProduct()
    {
    	$products = Product::findOrFail($id);
    	return response($products);
    }
}
