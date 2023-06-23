<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\Product;
use Svg\Tag\Rect;

class AdminController extends Controller
{
    
    public function index()
    {
        $order_pending = Order::where('status','Pending')->get();
        $order_completed = Order::where('status','Completed')->get();
        $product = Product::all();
        
        $data = array(
            'order_pending' => count($order_pending),
            'order_completed' => count($order_completed),
            'product' => count($product)
        );
        // echo '<pre>';
        // print_r($data);
        // exit();
        return view('admin/dashboard',$data);
    }

    public function login()
    {
        if (session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        }else{
            return view('admin/login');
        }
    }

    
    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('admin/login')->withInput()->withErrors($validator);
        }
        $email = $request->post('email');
        $password = $request->post('password');
        $check = Admin::where('email',$email)->count();
        if ($check > 0) {
            $admin = Admin::where('email',$email)->get();
            if (Hash::check($request->post('password'),$admin[0]['password'])) {
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$admin[0]['id']);
                $request->session()->put('ADMIN_NAME',$admin[0]['name']);
                $request->session()->put('ADMIN_EMAIL',$admin[0]['email']);
                $request->session()->flash('icon','success');
                $request->session()->flash('msg','Login Successfully');
                return redirect('admin/dashboard');
            }else{
                //password
                $request->session()->flash('icon','error');
                $request->session()->flash('msg','Invalid Credential');
                return redirect('admin/login');
            }
           
        }else{
            //email
            $request->session()->flash('icon','error');
            $request->session()->flash('msg','Invalid Credential');
            return redirect('admin/login');
        }

        
    }

    public function register(){
       return view('admin.register');
    }

    public function add_registter(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        // exit();
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return redirect('admin/register')->withInput()->withErrors($validator);
        }

        $count = Admin::where('email',$request->email)->count();
        // echo '<pre>';
        // print_r($admin);
        // exit();
        if($count > 0){
            $request->session()->flash('icon','error');
            $request->session()->flash('msg','This email is already exist');
            return redirect('admin/register');

        }else{
            $admin = new Admin;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->save();
            $request->session()->flash('icon','success');
            $request->session()->flash('msg','Register Successfully');
            return redirect('admin/login');
        }
    }

    
    public function store()
    {
      
    }

   
    public function show(Admin $admin)
    {
        
    }

    
    public function edit(Admin $admin)
    {
        
    }

    
    public function update(Request $request, Admin $admin)
    {
        
    }

    
    public function destroy(Admin $admin)
    {
        
    }
}
