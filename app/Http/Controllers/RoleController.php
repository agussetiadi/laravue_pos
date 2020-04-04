<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{

    public function index()
    {
    	$role  = Role::orderBy('created_at', 'DESC')->paginate(10);
    	return view('role.index', compact('role'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|string|max:50'
    	]);

    	$role = Role::firstOrCreate([
    		'name' => $request->name
    	]);

    	return redirect()->back()->with(['success' => 'Role : <strong> ' . $role->name . ' </strong>']);
    }

    public function destroy()
    {
    	$role = Role::findOrFail($id);
    	$role->delete();

    	return redirect()->back()->with(['success' => 'Role: <strong></strong>' . $role->name . '</strong> dihapus']);
    }

    public function rolePermission()
    {
    	$role = $request->get('role');

    	$permissions = null;
    	$hasPermissions = null;

    	//Mengambil data Role
    	$roles = Role::all()->pluck('name');

    	//apabila parameter role terpenuhi
    	if (!empty($roles)) {
    		//select role berdasarkan namenya, ini sejenis dengan method find()
    		$getRole = Role::findByName($role);

    		//Query untuk mengambil permission yang telah dimiliki oleh role terkait
    		$hasPermissions = DB::table('role_has_permissions')
    			->select('permissions.name')
    			->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
    			->where('role_id', $getRole->id)->get()->pluck('name')->all();


    		//Mengambil data permission
    		$permissions = Permission::all()->pluck('name');

    		return view('users.role_permssion', compact('roles', 'permissions', 'hasPermissions'));
    	}
    }
}
