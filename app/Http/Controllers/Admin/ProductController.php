<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add(){
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function insert(Request $req){
        $product = new Product();
        if($req->hasFile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }
        $product->name = $req->input('name');
        $product->category_id = $req->input('category_id');
        $product->description = $req->input('description');
        if($req->has('status')){
            $product->status = '1';
        }else{
            $product->status = '0';
        }
        $product->price = $req->input('price');
        $product->quantity = $req->input('quantity');
        $product->meta_title = $req->input('meta_title');
        $product->meta_keywords = $req->input('meta_keywords');
        $product->meta_description = $req->input('meta_description');
        $product->save();
        return redirect('/products')->with('status','Sikeres hozzáadás!');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    public function update(Request $req, $id){
        $product = Product::find($id);

        if($req->hasFile('image')){
            $path = 'assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }
        $product->name = $req->input('name');
        $product->description = $req->input('description');
        if($req->has('status')){
            $product->status = '1';
        }else{
            $product->status = '0';
        }
        $product->price = $req->input('price');
        $product->quantity = $req->input('quantity');
        $product->meta_title = $req->input('meta_title');
        $product->meta_keywords = $req->input('meta_keywords');
        $product->meta_description = $req->input('meta_description');
        $product->update();
        return redirect('/products')->with('status','Sikeres szerkesztés!');
    }

    public function delete($id){
        $product = Product::find($id);
        if($product->image){
            $path = 'assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('/products')->with('status','Sikeres törlés!');
    }
}
