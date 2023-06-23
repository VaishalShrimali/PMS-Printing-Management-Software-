<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    //
    public function index()
    {
        $result['product'] = Product::all();
        return view('admin/product/list', $result);
    }

    public function create()
    {
        $data['categorys'] = Category::all();
        $data['subcategorys'] = Subcategory::all();
        return view('admin/product/create', $data);
    }

    public function insert(Request $request)
    {
        // echo '<pre>';
        // print_r($request->product_status);
        // exit();

        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'size' => 'required',
            'height' => 'required',
            'width' => 'required',
            'area' => 'required',
            'rate' => 'required',
            'gst' => 'required',
            'total' => 'required',
            'min_amount' => 'required',
            'max_amount' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/product/create')->withErrors($validator)->withInput();
        }

        $file = $request->file('img');
        $filename = time() . '-' . $file->getClientOriginalName();
        $destination = public_path() . '/uploads/product';
        $file->move($destination, $filename);


        $product = new Product;
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->sub_category = $request->sub_category;
        $product->size = $request->size;
        $product->height = $request->height;
        $product->width = $request->width;
        $product->area = $request->area;
        $product->gst = $request->gst;
        $product->rate = $request->rate;
        $product->total = $request->total;
        $product->min_amount = $request->min_amount;
        $product->max_amount = $request->max_amount;
        $product->product_status = $request->product_status;
        $product->image = $filename;
        $product->remark = $request->remark;
        $product->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Product created successfully');
        return redirect('admin/product');
    }

    public function edit($id)
    {
        $result['product'] = Product::where('product_id', $id)->get();
        $result['categorys'] = Category::all();
        //  echo '<pre>';
        // print_r($result['product']);
        // exit();
        return view('admin/product/edit', $result);
    }

    public function update(Request $request)
    {
        //  echo '<pre>';
        // print_r($request->all());
        // exit();
        $product = Product::where('product_id', $request->update_id)->get();

        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'size' => 'required',
            'height' => 'required',
            'width' => 'required',
            'area' => 'required',
            'rate' => 'required',
            'gst' => 'required',
            'total' => 'required',
            'min_amount' => 'required',
            'max_amount' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect('admin/product/edit/' . $request->update_id)->withErrors($validator)->withInput();
        }

        if ($request->file('img') != '') {
            $destination = public_path() . '/uploads/product';

            //code for remove old file
            if ($product[0]->image != '' && $product[0]->image != null) {
                $file_old = $destination . $product[0]->image;
                unlink($file_old);
            }

            //upload new file
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destination = public_path() . '/uploads/product';
            $file->move($destination, $filename);

            $product->image = $filename;
            echo $filename;
            exit();
            //for update in table

        }


        // $file = $request->file('image');
        // $filename = time() . '-' . $file->getClientOriginalName();
        // $destination = public_path() . '/uploads/product';
        // $file->move($destination, $filename);

        $product = Product::find($request->update_id);
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->sub_category = $request->sub_category;
        $product->size = $request->size;
        $product->height = $request->height;
        $product->width = $request->width;
        $product->area = $request->area;
        $product->gst = $request->gst;
        $product->rate = $request->rate;
        $product->total = $request->total;
        $product->min_amount = $request->min_amount;
        $product->max_amount = $request->max_amount;
        // $product->image = $filename;
        $product->remark = $request->remark;
        $product->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Product updated successfully');
        return redirect('admin/product');
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('icon', 'success');
        session()->flash('msg', 'Product deleted successfully');
        return redirect('admin/product');
    }

    public function fetchSubcat($id)
    {
        $subcategorys = Subcategory::where('f_catid', $id)->get();
        $output = '<option selected disabled>Select Sub-category</option>';
        if (count($subcategorys) > 0) {
            foreach ($subcategorys as $subcategory) {
                $output .= '<option value="' . $subcategory['id'] . '">' . $subcategory['sname'] . '</option>';
            }
        }
        return response()->json([
            'subcategory' => $output
        ]);
    }
    public function fetchSubcate(Request $request,$id)
    {
        $subcat = $request->subcat;
        $subcategorys = Subcategory::where('f_catid', $id)->get();
        $output = '<option selected disabled>Select Sub-category</option>';
        if (count($subcategorys) > 0) {
            foreach ($subcategorys as $subcategory) {
                if($subcategory['id'] != $subcat){
                    $output .= '<option value="' . $subcategory['id'] . '">' . $subcategory['sname'] . '</option>';
                }else{
                    $output .= '<option value="' . $subcategory['id'] . '" selected>' . $subcategory['sname'] . '</option>';
                }
            }
        }
        return response()->json([
            'subcategory' => $output
        ]);
    }
}