<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class StaffController extends Controller
{
    public function login()
    {
        if (session::get('STAFF_LOGIN')) {
            return redirect('staff/dashboard');
        } else {
            return view('staff/login');
        }
    }

    public function auth(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/staff/login')->withInput()->withErrors($validator);
        }

        $email = $request->post('email');
        $password = $request->post('password');
        $check = Staff::where('email', $email)->count();

        if ($check > 0) {
            $staff = Staff::where('email', $email)->get();
            // echo '<pre>';
            // print_r($staff[0]['status']);
            // exit();
            if ($staff[0]['status'] == 'Block') {
                $request->session()->flash('icon', 'error');
                $request->session()->flash('msg', 'Your are Blocked');
                return redirect('/staff/login');
            } else {
                if (Hash::check($password, $staff[0]['password'])) {
                    $request->session()->put('STAFF_LOGIN', true);
                    $request->session()->put('STAFF_ID', $staff[0]['id']);
                    $request->session()->put('STAFF_USERNAME', $staff[0]['name']);
                    $request->session()->put('STAFF_ROLE', $staff[0]['f_roleid']);
                    $request->session()->flash('icon', 'success');
                    $request->session()->flash('msg', 'Login Successfully');

                    return redirect('/staff/dashboard');
                } else {
                    $request->session()->flash('icon', 'error');
                    $request->session()->flash('msg', 'Invalid Credential');
                    return redirect('/staff/login');
                }
            }
        } else {
            $request->session()->flash('icon', 'error');
            $request->session()->flash('msg', 'Invalid Credential');
            return redirect('/staff/login');
        }
    }

    public function dashboard()
    {

        $order_pending = Order::where('status', 'Pending')->get();
        $order_completed = Order::where('status', 'Completed')->get();
        $product = Product::all();


        $array = array(
            'role_id' => session::get('STAFF_ID'),
            'name' => session::get('STAFF_USERNAME'),
            'role' => session::get('STAFF_ROLE'),
            'email' => session::get('STAFF_EMAIL'),
            'order_pending' => count($order_pending),
            'order_completed' => count($order_completed),
            'product' => count($product)
        );
        return view('staff/dashboard', $array)->with('array', $array);
    }



    //ADMIN SIDE ROUTES 

    public function index()
    {
        $data['staffs'] = Staff::join('role', 'staffs.f_roleid', '=', 'role.role_id')
            ->orderBy('id', 'ASC')
            ->get(['staffs.name', 'staffs.email', 'staffs.id', 'role.role', 'staffs.status']);

        return view('admin.staff.index', $data);
    }

    public function create()
    {
        $data['roles'] = Role::all();
        return view('admin/staff/create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/staff/create')->withErrors($validator)->withInput();
        }

        $check = Staff::where('email', $request->email)->count();
        if ($check == 0) {
            $staff = new Staff;
            $staff->name = $request->name;
            $staff->email = $request->email;
            $staff->f_roleid = $request->role;
            $staff->password = Hash::make($request->password);
            $staff->date_at = date('d-m-Y H:i:s');
            $staff->save();
            $request->session()->flash('icon', 'success');
            $request->session()->flash('msg', 'Staff created successfully!');
            return redirect('admin/staff/');
        } else {
            $request->session()->flash('icon', 'error');
            $request->session()->flash('msg', 'This email is already exist');
            return redirect('admin/staff/create')->withInput();
        }
    }

    public function edit($id)
    {
        $editUser['users'] = Staff::where('id', $id)->get();
        return view('admin/staff/edit', $editUser);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect('admin/staff/edit/' . $request->upd_id)->withErrors($validator)->withInput();
        }

        $count = Staff::where('email', $request->email)->count();
        $checka = Staff::where('email', $request->email)->get();

        if ($count > 0) {
            if ($request->upd_id == $checka[0]['id']) {
                $check = Staff::find($request->upd_id);
                $check->name = $request->name;
                $check->email = $request->email;
                $check->save();
                $request->session()->flash('icon', 'success');
                $request->session()->flash('msg', 'Staff updated successfully!');
                return redirect('admin/staff/');
            } else {
                $request->session()->flash('icon', 'error');
                $request->session()->flash('msg', 'This email is already exist');
                return redirect('admin/staff/edit/' . $request->upd_id);
            }
        } else {
            $check = Staff::find($request->upd_id);
            $check->name = $request->name;
            $check->email = $request->email;
            $check->save();
            $request->session()->flash('icon', 'success');
            $request->session()->flash('msg', 'Staff updated successfully!');
            return redirect('admin/staff/');
        }
    }


    public function change_status(Request $request, $id)
    {
        // $user = Staff::find($id)->delete();
        // session()->flash('icon', 'success');
        // session()->flash('msg', 'Staff Deleted successfully!');
        // return redirect('admin/staff/');
        echo $id;
        $count = Staff::find($id)->count();
        if ($count < 1) {
            $request->session()->flash('icon', 'error');
            $request->session()->flash('msg', 'Staff not exits!');
            return redirect('admin/staff/');
        } else {
            $staff = Staff::find($id);
            if ($staff['status'] == 'Active') {
                $staff->status = 'Block';
                $staff->save();
                $request->session()->flash('icon', 'success');
                $request->session()->flash('msg', 'Staff status change successfully!');
                return redirect('admin/staff/');
            } else {
                $staff->status = 'Active';
                $staff->save();
                $request->session()->flash('icon', 'success');
                $request->session()->flash('msg', 'Staff status change successfully!');
                return redirect('admin/staff/');
            }
        }
    }
}
