<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $request){
        $category = new Category();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        if($request->has('status')){
            $category->status = '1';
        }else{
            $category->status = '0';
        }
        if($request->has('popular')){
            $category->popular = '1';
        }else{
            $category->popular = '0';
        }
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');

        $category->save();
        return redirect('/categories')->with('status','Sikeres hozzáadás!');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        if($request->has('status')){
            $category->status = '1';
        }else{
            $category->status = '0';
        }
        if($request->has('popular')){
            $category->popular = '1';
        }else{
            $category->popular = '0';
        }
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');

        $category->update();
        return redirect('/categories')->with('status','Sikeres szerkesztés!');
    }

    public function delete($id){
        $category = Category::find($id);
        if($category->image){
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/categories')->with('status','Sikeres törlés!');
    }
}
