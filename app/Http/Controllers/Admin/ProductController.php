<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Models\Kategoria;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Kategoria::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Kategoria::findOrFail($validatedData["category_id"]);
        $product = $category->products()->create([
            'category_id' => $validatedData["category_id"],
            'name' => $validatedData["name"],
            'slug' => Str::slug($validatedData["slug"]),
            'description' => $validatedData["description"],
            'small_description' => $validatedData["small_description"],
            'original_price' => $validatedData["original_price"],
            'selling_price' => $validatedData["selling_price"],
            'status' => $request->status == true ? '1' : '0',
            'meta_title' => $validatedData["meta_title"],
            'meta_keyword' => $validatedData["meta_keyword"],
            'meta_description' => $validatedData["meta_description"],
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach ($request->file('image') as $image) {
                $ext = $image->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $ext;
                $image->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
                ]);
            }
        }

        return redirect('admin/product')->with('message', 'Sikeres termék hozzáadás');
    }

    public function edit(Product $product)
    {
        $categories = Kategoria::all();
        return view("admin.product.edit", compact('product', 'categories'));
    }

    public function update(ProductFormRequest $request, $product_id)
    {

        $validatedData = $request->validated();

        $product = Kategoria::findOrFail($validatedData['category_id'])->products()->where('id', $product_id);

        if ($product) {
            $product->update([
                'category_id' => $validatedData["category_id"],
                'name' => $validatedData["name"],
                'slug' => Str::slug($validatedData["slug"]),
                'description' => $validatedData["description"],
                'small_description' => $validatedData["small_description"],
                'original_price' => $validatedData["original_price"],
                'selling_price' => $validatedData["selling_price"],
                'status' => $request->status == true ? '1' : '0',
                'meta_title' => $validatedData["meta_title"],
                'meta_keyword' => $validatedData["meta_keyword"],
                'meta_description' => $validatedData["meta_description"],
            ]);

            echo $product_id;


            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach ($request->file('image') as $image) {
                    $ext = $image->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $ext;
                    $image->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;
                    $prod_img = new ProductImage();
                    $prod_img->product_id = $product_id;
                    $prod_img->image = $finalImagePathName;
                    $prod_img->save();
                }
            }

            return redirect('admin/product')->with('message', 'Sikeres termék frissítés');

        } else {
            return redirect('admin/product')->with('message', 'Nem található termék ezzel az azonosítóval');
        }
    }

    public function deleteImage($product_image_id){
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Termék fotó sikeresen törölve');
    }

    public function delete($product_id){
        $product = Product::findOrFail($product_id);
        if($product->productImages){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->productImages()->delete();
        $product->delete();
        return redirect()->back()->with('message','Sikeres törlés');
    }
}
