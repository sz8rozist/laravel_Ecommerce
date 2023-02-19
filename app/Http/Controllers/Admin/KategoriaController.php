<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Kategoria;
use App\Http\Requests\CategoryFormRequest;

class KategoriaController extends Controller
{
    public function index()
    {
        return view('admin.kategoria.index');
    }

    public function create()
    {
        return view('admin.kategoria.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Kategoria;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData["slug"]);
        $category->description = $validatedData['description'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->move('uploads/category', $filename);
            $category->image = $filename;
        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return redirect('admin/kategoria')->with('message', 'Kategória hozzáadása sikeres');
    }

    public function edit(Kategoria $category)
    {
        return view('admin.kategoria.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $validatedData = $request->validated();
        $category = Kategoria::findOrFail($id);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData["slug"]);
        $category->description = $validatedData['description'];
        if ($request->hasFile('image')) {
            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->move('uploads/category', $filename);
            $category->image = $filename;
        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return redirect('admin/kategoria')->with('message', 'Kategória szerkesztése sikeres');
    }
}
