<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;

class CategoryController extends Controller
{
    public function all()
    {
        $pageTitle  = 'All Category';
        $categories = Category::searchable(['name'])->orderBy('name')->paginate(getPaginate());
        return view('admin.category.index', compact('pageTitle', 'categories'));
    }

    public function store(Request $request, $id = 0)
    {
        $this->validation($request, $id);

        if (!$id) {
            $notification = 'Category added successfully';
            $category     = new Category();
        } else {
            $notification     = 'Category updated successfully';
            $category         = Category::findOrFail($id);
        }

        if ($request->hasFile('image')) {
            try {
                $path  = getFilePath('category');
                // $size  = getFileSize('category');
                $size  = null;
                $image = fileUploader($request->image, $path, $size, $category->image);
                $category->image = $image;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload the image'];
                return back()->withNotify($notify);
            }
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function status($id)
    {
        return Category::changeStatus($id);
    }

    public function homepage($id){
        $category = Category::find($id);
        if($category->show_on_homepage == 'yes'){
            $category->show_on_homepage = 'no';
            $category->save();
            $notify[] = ['success', 'category removed from homepage'];
            return back()->withNotify($notify);
        }else{
            $category->show_on_homepage = 'yes';
            $category->save();
            $notify[] = ['success', 'Category added to homepage'];
            return back()->withNotify($notify);
        }
        
    }

    private function validation($request, $id)
    {
        $imageValidation = $id ? 'nullable'  : 'required';
        $request->validate([
            'name'   => 'required|unique:categories,name,' . $id,
            'image'  => [$imageValidation, new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'slug'   => 'required|string|max:40|unique:categories,slug,' . $id
        ]);
    }
}
