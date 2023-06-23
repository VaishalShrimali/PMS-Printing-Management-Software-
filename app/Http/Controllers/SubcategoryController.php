<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    public function index()
    {
        $data['subcategorys'] = Subcategory::join('category', 'subcategories.f_catid', '=', 'category.id')
            ->orderBy('id', 'ASC')
            ->get(['subcategories.*', 'category.category_name']);
        return view('admin.subcategory.index', $data);
    }
    public function create()
    {
        $data['categorys'] = Category::all();
        return view('admin.subcategory.create', $data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'subcategory_name' => 'required',
            'f_category' => 'required',
            'dispatch_time' => 'required',
            'subcategory_img' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/subcategory/create')->withErrors($validator)->withInput();
        }

        $file = $request->file('subcategory_img');
        $filename = time() . '-' . $file->getClientOriginalName();
        $destination = public_path('/uploads/subcategory');
        $file->move($destination, $filename);


        $subcategory = new Subcategory;
        $subcategory->sname = $request->subcategory_name;
        $subcategory->dispatch_time = $request->dispatch_time;
        $subcategory->f_catid = $request->f_category;
        $subcategory->scat_img = $filename;
        $subcategory->date_at = date('d-m-Y H:i:s');
        $subcategory->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Subcategory created successfully');
        return redirect('admin/subcategory');
    }

    public function view($id)
    {
        $subcategory = DB::table('subcategories')
            ->where('subcategories.id', $id)
            ->select('subcategories.*', 'category_name')
            ->leftJoin('category', 'subcategories.f_catid', '=', 'category.id')
            ->get();
            //dd($subcategory);
        if ($subcategory != null) {
            return response()->json([
                'subcategory_name' => $subcategory[0]->sname,
                'category_name' => $subcategory[0]->category_name,
                'dispatch_time' => $subcategory[0]->dispatch_time,
                'subcategory_img' => $subcategory[0]->scat_img,
                'date_at' => date('d-m-Y', strtotime($subcategory[0]->date_at))
            ]);
        }

    }

    public function edit($id)
    {
        $data['categorys'] = Category::all();
        $data['subcategory'] = DB::table('subcategories')
            ->where('subcategories.id', $id)
            ->select('subcategories.*', 'category_name')
            ->leftJoin('category', 'subcategories.f_catid', '=', 'category.id')
            ->get();
        if (count($data['subcategory']) > 0) {
            return view('admin.subcategory.edit', $data);
        } else {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('admin/subcategory');
        }
    }
    public function update(Request $request)
    {
        $subcategory = Subcategory::find($request->updateId)->count();
        if ($subcategory > 0) {
            $validator = Validator::make($request->all(), [
                'subcategory_name' => 'required',
                'dispatch_time' => 'required',
                'f_category' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('admin/subcategory/edit/' . $request->updateId)->withErrors($validator);
            }
            if ($request->hasFile('subcategory_img')) {
                $file = $request->file('subcategory_img');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destination = public_path('/uploads/subcategory');
                $file->move($destination, $filename);

                $check = Subcategory::find($request->updateId);
                $image_path = public_path("/uploads/subcategory/" . $check->scat_img); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $check->sname = $request->subcategory_name;
                $check->f_catid = $request->f_category;
                $check->dispatch_time = $request->dispatch_time;
                $check->scat_img = $filename;
                $check->save();
            } else {
                $check = Subcategory::find($request->updateId);
                $check->sname = $request->subcategory_name;
                $check->f_catid = $request->f_category;
                $check->dispatch_time = $request->dispatch_time;
                $check->save();
            }
            $request->session()->flash('icon', 'success');
            $request->session()->flash('msg', 'Subategory updated successfully');
            return redirect('admin/subcategory');
        } else {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('admin/subcategory');
        }
    }

    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        if ($subcategory != null) {
            $image_path = public_path("/uploads/subcategory/" . $subcategory->scat_img); // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $subcategory->delete();
            session()->flash('icon', 'success');
            session()->flash('msg', 'Subcategory deleted successfully');
            return redirect('admin/subcategory');
        } else {
            session()->flash('icon', 'error');
            session()->flash('msg', 'Something went wrong');
            return redirect('admin/subcategory');
        }
    }
}