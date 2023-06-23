<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Staff;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function index()
    {
        $data['categorys'] = Category::all();
        return view('front.index', $data);
    }
    public function category($id)
    {
        $data['subcategorys'] = Subcategory::where('f_catid', $id)->get();
        return view('front.category', $data);
    }
    public function details($id)
    {
        $data['prdcts'] = Product::where([['sub_category', '=', $id], ['product_status', '=', 'Published']])->get();

        $data['login'] = session::get('STAFF_LOGIN');
        $data['subcatid'] = $id;
        return view('front.product', $data);
    }
    public function auth(Request $request)
    {
        if (session::get('STAFF_LOGIN')) {
            return response()->json([
                'icon' => 'error',
                'msg' => 'You are already logged in!'
            ]);
        } else {
            $email = $request->post('email');
            $password = $request->post('pass');
            $check = Staff::where(['email' => $email, 'f_roleid' => 1])->count();

            if ($check > 0) {
                $staff = Staff::where('email', $email)->get();
                if (Hash::check($password, $staff[0]['password'])) {
                    $request->session()->put('STAFF_LOGIN', true);
                    $request->session()->put('STAFF_ID', $staff[0]['id']);
                    $request->session()->put('STAFF_USERNAME', $staff[0]['name']);
                    $request->session()->put('STAFF_ROLE', $staff[0]['f_roleid']);
                    $request->session()->flash('icon', 'success');
                    $request->session()->flash('msg', 'Login Successfully');
                    return response()->json([
                        'icon' => 'success',
                        'msg' => 'Login Successfully'
                    ]);
                    //return redirect('/staff/dashboard');
                } else {
                    //$request->session()->flash('icon', 'error');
                    //$request->session()->flash('msg', 'Invalid Credential');
                    //return redirect('/staff/login');
                    return response()->json([
                        'icon' => 'error',
                        'msg' => 'Invalid Credential'
                    ]);
                }
            } else {
                return response()->json([
                    'icon' => 'error',
                    'msg' => 'Invalid Credential'
                ]);
            }
        }
    }

    public function productdetails($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'image' => $product->image
            ]);
        }
    }
    public function insert(Request $request)
    {
        if (session::get('STAFF_ROLE') != 1) {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('/');
        }
        $validator = Validator::make($request->all(), [
            'dealer_name' => 'required',
            'address' => 'required',
            'product' => 'required',
            'height' => 'required',
            'Length' => 'required',
            'width' => 'required',
            'area' => 'required',
            'measurement' => 'required',
            'rate' => 'required',
            'total' => 'required',
            'quantity' => 'required',
            'printing' => 'required',
            'cutting' => 'required',
            'lamination' => 'required',
            'pasting' => 'required',
            'installation' => 'required',
            'delivery' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('subcategory/' . $request->subcatid)->withInput()->withErrors($validator);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destination = public_path() . '/uploads/order';
            $file->move($destination, $filename);


            $order = new Order;
            $order->dealer_name = $request->dealer_name;
            $order->address = $request->address;
            $order->product = $request->product;
            $order->height = $request->height;
            $order->width = $request->width;
            $order->length = $request->Length;
            $order->area = $request->area;
            $order->total_area = $request->total_area;
            $order->measurement_type = $request->measurement;
            $order->rate = $request->rate;
            $order->total = $request->total;
            $order->quantity = $request->quantity;
            $order->printing = $request->printing;
            $order->cutting = $request->cutting;
            $order->lamination = $request->lamination;
            $order->pasting = $request->pasting;
            $order->installation = $request->installation;
            $order->delivery = $request->delivery;
            $order->order_mode = $request->order_mode;
            $order->contact = $request->contact;
            $order->email = $request->email;
            $order->order_rec_by = session::get('STAFF_ID');
            $order->image = $filename;
            $order->save();
        }else{
            $order = new Order;
            $order->dealer_name = $request->dealer_name;
            $order->address = $request->address;
            $order->product = $request->product;
            $order->height = $request->height;
            $order->width = $request->width;
            $order->length = $request->Length;
            $order->area = $request->area;
            $order->measurement_type = $request->measurement;
            $order->rate = $request->rate;
            $order->total = $request->total;
            $order->quantity = $request->quantity;
            $order->printing = $request->printing;
            $order->cutting = $request->cutting;
            $order->lamination = $request->lamination;
            $order->pasting = $request->pasting;
            $order->installation = $request->installation;
            $order->delivery = $request->delivery;
            $order->order_mode = $request->order_mode;
            $order->contact = $request->contact;
            $order->email = $request->email;
            $order->order_rec_by = session::get('STAFF_ID');
            $order->save();
        }


        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Order created succesfully');
        return redirect('/');
    }

    public function about()
    {
        //$data['categorys'] = Category::all();
        return view('front.about');
    }
}
