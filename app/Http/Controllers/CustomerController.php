<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    
    public function search(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email'
    	]);

    	$customer = Customer::where('email', $request->email)->first();

    	if ($customer) {
    		return response([
    			'status' => 'success',
    			'data' => $customer
    		]);
    	}

    	return response([
    		'status' => 'failed',
    		'data' => []
    	]);
    }
}
