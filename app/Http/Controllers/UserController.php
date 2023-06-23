<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use App\Models\Order;
use App\Models\Product;

class UserController extends Controller
{


 

  // User
  public function index()
  {
    $users['users'] = User::all();
    // print_r($users);
    return view('admin/users/list', $users);
  }

  public function create()
  {
    return view('admin/users/create');
  }

  public function store(Request $request)
  {
    //   return $request->all();
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect('admin/users/create')->withErrors($validator)->withInput();
    }

    $check = User::where('email', $request->email)->count();
    if ($check == 0) {
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->save();
      $request->session()->flash('icon', 'success');
      $request->session()->flash('msg', 'User created successfully!');
      return redirect('admin/users/');
    } else {
      $request->session()->flash('icon', 'error');
      $request->session()->flash('msg', 'This email is already exist');
      return redirect('admin/users/create')->withInput();
    }
  }

  public function edit($id)
  {
    $editUser['users'] = User::where('id', $id)->get();
    return view('admin/users/edit', $editUser);
  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email'
    ]);

    if ($validator->fails()) {
      return redirect('admin/users/edit/' . $request->upd_id)->withErrors($validator)->withInput();
    }

    $count = User::where('email', $request->email)->count();
    $checka = User::where('email', $request->email)->get();

    if ($count > 0) {
      if ($request->upd_id == $checka[0]['id']) {
        $check = User::find($request->upd_id);
        $check->name = $request->name;
        $check->email = $request->email;
        $check->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'User updated successfully!');
        return redirect('admin/users/');
      } else {
        $request->session()->flash('icon', 'error');
        $request->session()->flash('msg', 'This email is already exist');
        return redirect('admin/users/edit/' . $request->upd_id);
      }
    } else {
      $check = User::find($request->upd_id);
      $check->name = $request->name;
      $check->email = $request->email;
      $check->save();
      $request->session()->flash('icon', 'success');
      $request->session()->flash('msg', 'User updated successfully!');
      return redirect('admin/users/');
    }
  }


  public function delete($id)
  {
    User::find($id)->delete();
    session()->flash('icon', 'success');
    session()->flash('msg', 'User Deleted successfully!');
    return redirect('admin/users/');
  }
}