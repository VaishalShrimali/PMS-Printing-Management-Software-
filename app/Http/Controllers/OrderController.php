<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Models\OrderManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Order;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use \PDF;

class OrderController extends Controller
{
    public function index()
    {
        if (session::get('STAFF_ROLE') == 1) {
            $result['order'] = DB::table('orders')
                ->select('orders.*', 'product_name')
                ->leftJoin('product', 'orders.product', '=', 'product.product_id')
                ->get();
            return view('staff/order/list', $result);
        } elseif (session::get('STAFF_ROLE') == 3) {
            $result['order'] = DB::table('order_manage')
                ->select('order_manage.*', 'orders.order_id', 'orders.dealer_name', 'product_name', 'role')
                ->where(['order_manage.frole_id' => 3, 'order_manage.fstaff_id' => session::get('STAFF_ID')])
                ->leftJoin('orders', 'order_manage.forder_id', '=', 'orders.order_id')
                ->leftJoin('product', 'orders.product', '=', 'product.product_id')
                ->leftJoin('role', 'order_manage.frole_id', '=', 'role.role_id')
                ->get();
            return view('staff/designer/list', $result);
        } elseif (session::get('STAFF_ROLE') == 4) {
            $result['order'] = DB::table('order_manage')
                ->select('order_manage.*', 'orders.order_id', 'orders.dealer_name', 'product_name', 'role')
                ->where(['order_manage.frole_id' => 4, 'order_manage.fstaff_id' => session::get('STAFF_ID')])
                ->leftJoin('orders', 'order_manage.forder_id', '=', 'orders.order_id')
                ->leftJoin('product', 'orders.product', '=', 'product.product_id')
                ->leftJoin('role', 'order_manage.frole_id', '=', 'role.role_id')
                ->get();
            return view('staff/designer/list', $result);
        } elseif (session::get('STAFF_ROLE') == 5) {
            $result['order'] = DB::table('order_manage')
                ->select('order_manage.*', 'orders.order_id', 'orders.dealer_name', 'product_name', 'role')
                ->where(['order_manage.frole_id' => 5, 'order_manage.fstaff_id' => session::get('STAFF_ID')])
                ->leftJoin('orders', 'order_manage.forder_id', '=', 'orders.order_id')
                ->leftJoin('product', 'orders.product', '=', 'product.product_id')
                ->leftJoin('role', 'order_manage.frole_id', '=', 'role.role_id')
                ->get();
            return view('staff/designer/list', $result);
        } elseif (session::get('STAFF_ROLE') == 6) {
            $result['order'] = DB::table('order_manage')
                ->select('order_manage.*', 'orders.order_id', 'orders.dealer_name', 'product_name', 'role')
                ->where(['order_manage.frole_id' => 6, 'order_manage.fstaff_id' => session::get('STAFF_ID')])
                ->leftJoin('orders', 'order_manage.forder_id', '=', 'orders.order_id')
                ->leftJoin('product', 'orders.product', '=', 'product.product_id')
                ->leftJoin('role', 'order_manage.frole_id', '=', 'role.role_id')
                ->get();
            return view('staff/designer/list', $result);
        } elseif (session::get('STAFF_ROLE') == 7) {
            $result['order'] = DB::table('order_manage')
                ->select('order_manage.*', 'orders.order_id', 'orders.dealer_name', 'product_name', 'role')
                ->where(['order_manage.frole_id' => 7, 'order_manage.fstaff_id' => session::get('STAFF_ID')])
                ->leftJoin('orders', 'order_manage.forder_id', '=', 'orders.order_id')
                ->leftJoin('product', 'orders.product', '=', 'product.product_id')
                ->leftJoin('role', 'order_manage.frole_id', '=', 'role.role_id')
                ->get();
            return view('staff/designer/list', $result);
        } elseif (session::get('STAFF_ROLE') == 8) {
            $result['order'] = DB::table('order_manage')
                ->select('order_manage.*', 'orders.order_id', 'orders.dealer_name', 'product_name', 'role')
                ->where(['order_manage.frole_id' => 8, 'order_manage.fstaff_id' => session::get('STAFF_ID')])
                ->leftJoin('orders', 'order_manage.forder_id', '=', 'orders.order_id')
                ->leftJoin('product', 'orders.product', '=', 'product.product_id')
                ->leftJoin('role', 'order_manage.frole_id', '=', 'role.role_id')
                ->get();
            return view('staff/designer/list', $result);
        } elseif (session::get('STAFF_ROLE') == 9) {
            $result['order'] = DB::table('order_manage')
                ->select('order_manage.*', 'orders.order_id', 'orders.dealer_name', 'product_name', 'role')
                ->where(['order_manage.frole_id' => 9, 'order_manage.fstaff_id' => session::get('STAFF_ID')])
                ->leftJoin('orders', 'order_manage.forder_id', '=', 'orders.order_id')
                ->leftJoin('product', 'orders.product', '=', 'product.product_id')
                ->leftJoin('role', 'order_manage.frole_id', '=', 'role.role_id')
                ->get();
            return view('staff/designer/list', $result);
        } else {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('staff/dashboard');
        }
    }

    public function create()
    {
        if (session::get('STAFF_ROLE') != 1) {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('staff/dashboard');
        }
        $result['product'] = Product::all();
        session()->forget('icon');
        session()->forget('msg');
        return view('staff/order/create', $result);
    }

    public function insert(Request $request)
    {
        if (session::get('STAFF_ROLE') != 1) {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('staff/dashboard');
        }
        // echo '<pre>';
        // print_r($request->file('image')[0]);
        // exit();
        $validator = Validator::make($request->all(), [
            'dealer_name' => 'required',
            'address' => 'required',
            'product' => 'required',
            'printing' => 'required',
            'cutting' => 'required',
            'lamination' => 'required',
            'pasting' => 'required',
            'installation' => 'required',
            'delivery' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('staff/order/create')->withInput()->withErrors($validator);
        }
        $image_Array = array();
        for ($i = 0; $i < count($request->file('image')); $i++) {
            $file = $request->file('image')[$i];
            $filename = time() . '-' . $file->getClientOriginalName();
            $destination = public_path() . '/uploads/order';
            $file->move($destination, $filename);
            array_push($image_Array, $filename);
        }


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
        $order->order_rec_by = session::get('STAFF_ID');
        $order->image = implode("|", $image_Array);
        $order->save();

        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Order created succesfully');
        return redirect('staff/order');
    }

    public function edit($id)
    {
        if (session::get('STAFF_ROLE') != 1) {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('staff/dashboard');
        }
        $result['order'] = Order::where('order_id', $id)->get();
        // echo '<pre>';
        // print_r($result['order']);
        // exit();
        session()->forget('icon');
        session()->forget('msg');
        $result['product'] = Product::all();
        return view('staff/order/edit', $result);
    }

    public function update(Request $request)
    {
        if (session::get('STAFF_ROLE') != 1) {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('staff/dashboard');
        }
        $validator = Validator::make($request->all(), [
            'dealer_name' => 'required',
            'address' => 'required',
            'product' => 'required',
            'printing' => 'required',
            'cutting' => 'required',
            'lamination' => 'required',
            'pasting' => 'required',
            'installation' => 'required',
            'delivery' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('/staff/order/edit/' . $request->update_id)->withInput()->withErrors($validator);
        }

        if (count($request->file('image')) > 0) {
            $image_Array = array();
            for ($i = 0; $i < count($request->file('image')); $i++) {
                $file = $request->file('image')[$i];
                $filename = time() . '-' . $file->getClientOriginalName();
                $destination = public_path() . '/uploads/order';
                $file->move($destination, $filename);
                array_push($image_Array, $filename);
            }
           

            $order = Order::find($request->update_id);
            $order->dealer_name = $request->dealer_name;
            $order->shop_name = $request->shop_name;
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
            $order->image = implode("|", $image_Array);
            $order->save();
        } else {
            $order = Order::find($request->update_id);
            $order->dealer_name = $request->dealer_name;
            $order->shop_name = $request->shop_name;
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
            $order->save();
        }

        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Order updated succesfully');
        return redirect('staff/order');
    }

    public function view($id)
    {

        $result['order'] = Order::where('order_id', $id)->get();
        $result['product'] = Product::all();
        return view('staff/order/view', $result);
    }
    public function requests($id)
    {
        $check = OrderManage::where(['forder_id' => $id, 'status' => 'Pending', 'frole_id' => session::get('STAFF_ROLE')])->get();
        if (count($check) > 0) {
            $ordermng = OrderManage::find($check[0]['id']);
            $ordermng->status = 'Requested';
            $ordermng->save();
            session()->flash('icon', 'success');
            session()->flash('msg', 'Sent request succesfully');
            return redirect('staff/order');
        } else {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('staff/dashboard');
        }
    }
    public function pdf($id)
    {

        $order = Order::join('product', 'product.product_id', '=', 'orders.product')
            ->where('order_id', $id)
            ->get(['orders.*', 'product.product_name']);
        $image_array = explode("|",$order[0]['image']);
        $images = array();
        foreach($image_array as $img){

            $docs = public_path('uploads/order/' . $img);
            $type = pathinfo($docs, PATHINFO_EXTENSION);
            $data = file_get_contents($docs);
            $img = 'data:image/' . $type . ';base64,' . base64_encode($data);
            array_push($images,$img);
        }
        $customPaper = array(0, 0, 567.00, 567.80);
        $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('staff/order/pdf', compact('order', 'images'))->setPaper([0, 0, 685.98, 396.85], 'potrait');
        return $pdf->download($order[0]['dealer_name'] . '.pdf');
    }
    public function delete($id)
    {
        echo $id . 'k' . session::get('STAFF_ROLE');
    }

    // Admin Side
    public function admin_order_list()
    {

        $result['orders'] = DB::table('orders')
            ->select('orders.*', 'product_name', 'role.role')
            ->leftJoin('product', 'orders.product', '=', 'product.product_id')
            ->leftJoin('role', 'orders.assined', '=', 'role.role_id')
            ->get();

        return view('admin/order/list', $result);
    }

    public function admin_order_view($id)
    {
        $result['order'] = Order::where('order_id', $id)->get();
        $result['product'] = Product::all();
        return view('admin/order/view', $result);
    }

    public function admin_order_delete($id)
    {
        Order::find($id)->delete();
        session()->flash('icon', 'success');
        session()->flash('msg', 'Order deleted successfully');
        return redirect('admin/order_list');
    }
    public function admin_request_list()
    {
        $result['orders'] = DB::table('order_manage')
            ->select('order_manage.*', 'orders.*', 'product_name', 'role')
            ->where('order_manage.status', 'Requested')
            ->leftJoin('orders', 'order_manage.forder_id', '=', 'orders.order_id')
            ->leftJoin('product', 'orders.product', '=', 'product.product_id')
            ->leftJoin('role', 'order_manage.frole_id', '=', 'role.role_id')
            ->get();

        return view('admin/req/list', $result);
    }
    public function admin_request_approve($id)
    {
        $ordermng = OrderManage::find($id);
        if ($ordermng->frole_id == 9) {
            $ordermng->status = 'Completed';
            $ordermng->save();

            $order = Order::find($ordermng->forder_id);
            $order->status = 'Completed';
            $order->save();
        } else {
            $ordermng->status = 'Approved';
            $ordermng->save();
        }
        session()->flash('icon', 'success');
        session()->flash('msg', 'Request approved succesfully');
        return redirect('admin/request');
    }

    public function admin_order_assign($id)
    {
        $output = '';
        if ($id == 1) {
            $output .= '<option selected disabled>Select Designer</option>';
            $staffs = Staff::where('f_roleid', 3)->get();
            foreach ($staffs as $staff) {
                $output .= '<option value="' . $staff['id'] . '" >' . $staff['name'] . '</option>';
            }
        } elseif ($id == 3) {
            $output .= '<option selected disabled>Select Printer</option>';
            $staffs = Staff::where('f_roleid', 4)->get();
            foreach ($staffs as $staff) {
                $output .= '<option value="' . $staff['id'] . '" >' . $staff['name'] . '</option>';
            }
        } elseif ($id == 4) {
            $output .= '<option selected disabled>Select Cutter</option>';
            $staffs = Staff::where('f_roleid', 5)->get();
            foreach ($staffs as $staff) {
                $output .= '<option value="' . $staff['id'] . '" >' . $staff['name'] . '</option>';
            }
        } elseif ($id == 5) {
            $output .= '<option selected disabled>Select Laminator</option>';
            $staffs = Staff::where('f_roleid', 6)->get();
            foreach ($staffs as $staff) {
                $output .= '<option value="' . $staff['id'] . '" >' . $staff['name'] . '</option>';
            }
        } elseif ($id == 6) {
            $output .= '<option selected disabled>Select Paster</option>';
            $staffs = Staff::where('f_roleid', 7)->get();
            foreach ($staffs as $staff) {
                $output .= '<option value="' . $staff['id'] . '" >' . $staff['name'] . '</option>';
            }
        } elseif ($id == 7) {
            $output .= '<option selected disabled>Select Installer</option>';
            $staffs = Staff::where('f_roleid', 8)->get();
            foreach ($staffs as $staff) {
                $output .= '<option value="' . $staff['id'] . '" >' . $staff['name'] . '</option>';
            }
        } elseif ($id == 8) {
            $output .= '<option selected disabled>Select Deliver</option>';
            $staffs = Staff::where('f_roleid', 9)->get();
            foreach ($staffs as $staff) {
                $output .= '<option value="' . $staff['id'] . '" >' . $staff['name'] . '</option>';
            }
        } else {
            $output .= '<option selected disabled>Select</option>';
        }
        return response()->json([
            'output' => $output
        ]);
    }
    public function admin_order_assigns(Request $request)
    {
        if ($request->assignedTo != '') {

            if ($request->oldId > 0 && $request->oldId != '') {
                $ordrmng = OrderManage::find($request->oldId);
                $ordrmng->status = 'Completed';
                $ordrmng->save();
            }

            $staff = Staff::find($request->assignedTo);
            $orderManage = new OrderManage;
            $orderManage->fstaff_id = $request->assignedTo;
            $orderManage->frole_id = $staff->f_roleid;
            $orderManage->forder_id = $request->orderId;
            $orderManage->created_at = date('d-m-Y H:i:s');
            $orderManage->save();

            $order = Order::find($request->orderId);
            $order->assined = $staff->f_roleid;
            $order->save();

            $request->session()->flash('icon', 'success');
            $request->session()->flash('msg', 'Order assigned succesfully');
            return redirect('admin/order_list');
        } else {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('admin/order_list');
        }
    }
}
