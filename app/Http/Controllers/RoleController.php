<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $result['role'] = Role::all();

        return view('admin/role/list', $result);
    }

    public function create()
    {
        $result['role'] = Role::select('*')
                        ->pluck('role');
        // echo '<pre>';
        // print_r($result['role']);
        // exit();
        return view('admin/role/create',$result);
    }

    public function insert(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // exit();
        $validator = Validator::make($request->all(), [
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/role/create')->withErrors($validator)->withInput();
        }

        $role = new Role;
        $role->role = $request->role;
        $role->save();

        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Role created successfully');
        return redirect('admin/role');
    }

    public function edit($id)
    {
        $result['role'] = Role::where('role_id', $id)->get();
        $result['only_role'] = Role::select('*')
                        ->pluck('role');
        // echo '<pre>';
        // print_r($result['role']);
        // exit();
        return view('admin/role/edit', $result);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/role/edit/' . $request->update_id)->withErrors($validator)->withInput();
        }

        $role = Role::find($request->update_id);
        $role->role = $request->role;
        $role->save();

        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Role updated successfully');
        return redirect('admin/role');
    }


    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('icon', 'success');
        session()->flash('msg', 'Role deleted successfully');
        return redirect('admin/role');
    }
}
