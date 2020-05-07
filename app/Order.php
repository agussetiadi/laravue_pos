<?php

namespace App;

use App\Order_detail;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

	//Model relationships ke Order_detail menggunakan hasMany
	public function order_detail()
	{
	    return $this->hasMany(Order_detail::class);
	}
}
