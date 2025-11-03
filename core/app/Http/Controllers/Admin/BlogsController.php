<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    //Blog Category Section
    public function blogCategory()
    {
        $pageTitle  = 'All Blog Category';
        $categories = BlogCategory::searchable(['blog_category'])->orderBy('blog_category')->paginate(getPaginate());
        return view('admin.blog_category.index', compact('pageTitle', 'categories'));
    }
    public function blogCategoryAdd(Request $request)
    {
        $blogCategory = new BlogCategory();
        $blogCategory->blog_category = $request->name;
        // formatting slug data
        if($request->name){
            $sl = rand();
            $formatData = explode(" ", Str::lower($request->name));
            array_push($formatData, $sl);
            $join = Arr::join($formatData,'-');
            $blogCategory->slug = $join;
        }
        $blogCategory->save();
        $notify[] = ['success', 'Category Added successfully'];
        return back()->withNotify($notify);
    }
    public function blogCategoryUpdate(Request $request, $id)
    {
        $blogCategory = BlogCategory::find($id);
        $blogCategory->blog_category = $request->name;
        if($request->name){
            $sl = rand();
            $formatData = explode(" ", Str::lower($request->name));
            array_push($formatData, $sl);
            $join = Arr::join($formatData,'-');
            $blogCategory->slug = $join;
        }
        $notify[] = ['success', 'Category Updated successfully'];
        $blogCategory->save();
        return back()->withNotify($notify);
    }
    public function blogCategoryDelete($id)
    {
        BlogCategory::find($id)->delete();
        $notify[] = ['success', 'Category Deleted successfully'];
        return back()->withNotify($notify);
    }
    //Blog Section
    public function allBlog()
    {
        $pageTitle  = 'All Blog';
        $blogs = Blog::searchable(['title'])->with('Category')->orderBy('title')->paginate(getPaginate());
        return view('admin.blog_category.blog_list', compact('pageTitle', 'blogs'));
    }
    public function blogAdd()
    {
        $pageTitle  = 'Add Blog';
        $categories = BlogCategory::all();
        return view('admin.blog_category.blog_add', compact('pageTitle', 'categories'));
    }
    public function blogInsert(Request $request)
    {
        $blog = new Blog();

        $folder_path = public_path('assets/image/blog_image');
        if (!File::exists($folder_path)) {
            File::makeDirectory($folder_path, 0777, true, true);
        }

        if (isset($request->file)){
            $sl = rand();
            $photo = $request->file('file');
            $image = date('Ymd').'_'.$sl.'_'.'.'.$photo->getClientOriginalExtension();
            $request->file->move($folder_path, $image);
        }else{
            $image = null;
        }

        $blog->title = $request->title;
        // formatting the data
        if($request->title){
            $sl = rand();
            $formatData = explode(" ", Str::lower($request->title));
            array_push($formatData, $sl);
            $join = Arr::join($formatData,'-');
            $blog->slug = $join;
        }
        // formatting end the data
        $blog->author = $request->author;
        $blog->category = $request->category;
        $blog->date = $request->date;
        $blog->feature_image = $image;
        $blog->blog_body = $request->blog_body;
        $blog->save();
        $notify[] = ['success', 'Blog Added successfully'];
        return redirect()->route('admin.blog.all.blog')->withNotify($notify);
    }
    public function blogUpdate(Request $request, $id)
    {
        $pageTitle  = 'Update Blog';
        $blog = Blog::find($id) ;
        $categories = BlogCategory::all();
        return view('admin.blog_category.blog_update',compact('blog','pageTitle','categories'));
    }
    public function blogEditData(Request $request, $id)
    {
        $blog = Blog::find($id) ;
        $folder_path = public_path('assets/image/blog_image');
        if (!File::exists($folder_path)) {
            File::makeDirectory($folder_path, 0777, true, true);
        }

        if ($request->file){
            $sl = rand();
            $photo = $request->file('file');
            $image = date('Ymd').'_'.$sl.'_'.'.'.$photo->getClientOriginalExtension();
            $request->file->move($folder_path, $image);
            $blog->feature_image = $image;
        }else{
            $blog->feature_image = $blog->feature_image;
        }

        if($request->title){
            $sl = rand();
            $formatData = explode(" ", Str::lower($request->title));
            array_push($formatData, $sl);
            $join = Arr::join($formatData,'-');
            $blog->slug = $join;
        }

        $blog->title = $request->title;
        
        $blog->author = $request->author;
        $blog->category = $request->category;
        $blog->date = $request->date;
        $blog->blog_body = $request->blog_body;
        $blog->save();
        $notify[] = ['success', 'Blog Updated successfully'];
        return redirect()->route('admin.blog.all.blog')->withNotify($notify);
    }
    public function blogDelete($id){
        $blog = Blog::find($id) ;
        $blog->delete();
        $notify[] = ['success', 'Blog Deleted successfully'];
        return redirect()->back()->withNotify($notify);
    }
}
