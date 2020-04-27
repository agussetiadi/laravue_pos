<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Cornerns\FromCollection

class UserExport implements FromCollection
{
	
	public function collection()
	{
		return User::all();
	}
}