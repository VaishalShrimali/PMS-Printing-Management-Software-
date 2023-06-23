<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categorys'] = Category::all();
        return view('admin.category.index', $data);
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'dispatch_time' => 'required',
            'category_img' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/category/create')->withErrors($validator)->withInput();
        }

        $file = $request->file('category_img');
        $filename = time() . '-' . $file->getClientOriginalName();
        $destination = public_path('/uploads/category');
        $file->move($destination, $filename);


        $category = new Category;
        $category->category_name = $request->category_name;
        $category->dispatch_time = $request->dispatch_time;
        $category->category_img = $filename;
        $category->date_at = date('d-m-Y H:i:s');
        $category->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Category created successfully');
        return redirect('admin/category');
    }

    public function view($id)
    {
        $category = Category::find($id);
        if ($category != null) {
            return response()->json([
                'category_name' => $category->category_name,
                'dispatch_time' => $category->dispatch_time,
                'category_img' => $category->category_img,
                'date_at' => date('d-m-Y', strtotime($category->date_at))
            ]);
        }

    }

    public function edit($id)
    {
        $data['category'] = Category::find($id);
        if ($data['category'] != null) {
            return view('admin.category.edit', $data);
        } else {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('admin/category');
        }
    }
    public function update(Request $request)
    {
        $category = Category::find($request->updateId)->count();
        if ($category > 0) {
            $validator = Validator::make($request->all(), [
                'category_name' => 'required',
                'dispatch_time' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('admin/category/edit/' . $request->updateId)->withErrors($validator);
            }
            if ($request->hasFile('category_img')) {
                $file = $request->file('category_img');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destination = public_path('/uploads/category');
                $file->move($destination, $filename);

                $check = Category::find($request->updateId);
                $image_path = public_path("/uploads/category/" . $check->category_img); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $check->category_name = $request->category_name;
                $check->dispatch_time = $request->dispatch_time;
                $check->category_img = $filename;
                $check->save();
            } else {
                $check = Category::find($request->updateId);
                $check->category_name = $request->category_name;
                $check->dispatch_time = $request->dispatch_time;
                $check->save();
            }
            $request->session()->flash('icon', 'success');
            $request->session()->flash('msg', 'Category updated successfully');
            return redirect('admin/category');
        } else {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('admin/category');
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category != null) {
            $image_path = public_path("/uploads/category/" . $category->category_img); // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $category->delete();
            session()->flash('icon', 'success');
            session()->flash('msg', 'Category deleted successfully');
            return redirect('admin/category');
        } else {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('admin/category');
        }
    }

}