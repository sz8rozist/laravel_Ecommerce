<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Kategoria;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;
    public function render()
    {
        $categories = Kategoria::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }

    public function deleteCategory($id){
        $this->category_id = $id;
    }

    public function destroyCategory(){
       $category =  Kategoria::find($this->category_id);
       $path = 'uploads/category/'.$category->image;
       if(File::exists($path)){
            File::delete($path);
       }
       $category->delete();
       session()->flash("message",'Kategória törölve');
       $this->dispatchBrowserEvent('close-modal');
    }
}
