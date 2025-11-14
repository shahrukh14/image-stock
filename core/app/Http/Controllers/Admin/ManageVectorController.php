<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants\Status;
use App\Models\ImageFile;
use App\Lib\DownloadFile;
use App\Models\Category;
use App\Models\Download;
use App\Models\Reason;
use App\Models\Color;
use App\Models\Image;


class ManageVectorController extends Controller
{

    public function all(){
        $pageTitle = 'All Vectors';
        $vectors   = $this->vectorData();
        return view('admin.vectors.list', compact('pageTitle', 'vectors'));
    }

    public function pending(){
        $pageTitle = 'Pending Vectors';
        $vectors   = $this->vectorData('pending');
        return view('admin.vectors.list', compact('pageTitle', 'vectors'));
    }

    public function rejected(){
        $pageTitle = 'Rejected Vectors';
        $vectors    = $this->vectorData('rejected');
        return view('admin.vectors.list', compact('pageTitle', 'vectors'));
    }

    public function approved(){
        $pageTitle = 'Approved Vectors';
        $vectors    = $this->vectorData('approved');
        return view('admin.vectors.list', compact('pageTitle', 'vectors'));
    }

    public function updateFeature($id){
        $vector = Image::findOrFail($id);

        if ($vector->status != Status::IMAGE_APPROVED) {
            $notify[] = ['error', 'Vector should be approved first'];
            return back()->withNotify($notify);
        }

        $notification = 'Vector un-featured successfully';
        $vector->is_featured = $vector->is_featured ? Status::DISABLE : Status::ENABLE;
        $vector->save();

        if ($vector->is_featured) {
            $notification = 'Vector featured successfully';
        }

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function downloadLog($id)
    {
        $vector     = Image::findOrFail($id);
        $logs      = Download::where('image_file_id', $vector->id)->with('user', 'contributor', 'image')->paginate(getPaginate());
        $pageTitle = 'Download logs - ' . $vector->title;
        return view('admin.vectors.download_log', compact('pageTitle', 'logs'));
    }

    public function details($id){
        $vector     = Image::with('user', 'files')->withSum('files as totalDownloads', 'total_downloads')->findOrFail($id);
        $pageTitle  = 'Vector Details - ' . $vector->title;
        $categories = Category::active()->orderBy('name', 'asc')->get();
        $colors      = Color::orderBy('name', 'desc')->get();
        $extensions = getFileExt('file_extensions');
        $reasons = Reason::all();
        return view('admin.vectors.detail', compact('pageTitle', 'vector', 'categories', 'colors', 'extensions', 'reasons'));
    }

    public function update(Request $request, $id){
        $extensions = getFileExt('file_extensions');
        $colors = Color::select('color_code')->pluck('color_code')->toArray() ?? [];

        $request->validate([
            'category'      => 'required|array',
            'title'         => 'required|string|max:120',
            'resolution'    => 'required|array',
            'resolution.*'    => 'required|string|max:40',
            'tags'          => 'required|array',
            'tags.*'        => 'required|string',
            'extensions'    => 'required|array',
            'extensions.*'  => 'required|in:' . implode(',', $extensions),
            'status'        => 'nullable|in:0,1,3',
            'statusFile'    => 'required|array',
            'statusFile.*'    => 'required|in:0,1',
            'is_free'       => 'required|array',
            'is_free.*'     => 'required|in:0,1', //0 = Premium, 1=Free
            'price'         => 'array',
            'price.*'       => 'nullable|numeric',
            'reason'        => 'required_if:status,3',
            'file_id'         => 'required|array',
            'file_id.*'         => 'required|integer',
        ], [
            'extensions.*.in' => 'Extensions are invalid',
        ]);

        $category = Category::active()->find($request->category);

        if (!$category) {
            $notify[] = ['error', 'Category not found'];
            return back()->withNotify($notify);
        }
        $image = Image::findOrFail($id);
        $image->category_id   = $request->category;
        $image->title         = $request->title;
        $image->tags          = $request->tags;
        $image->extensions    = $request->extensions;
        $image->colors        = $request->colors;
        $image->attribution   = $request->attribution ? Status::ENABLE : Status::DISABLE;
        $image->status        = $request->status;
        $image->description   = $request->description;
        $image->admin_id      = auth('admin')->id();
        $image->reviewer_id = 0;
        if ($image->status == 3) {
            $image->reason = $request->reason;
        }

        $image->save();

        foreach ($request->resolution ?? [] as $key => $value) {
            $imageFile = ImageFile::findOrFail($request->file_id[$key]);
            $imageFile->resolution = $value;
            $imageFile->is_free = $request->is_free[$key];
            $imageFile->status = $request->statusFile[$key];
            $imageFile->price = $request->price[$key];
            $imageFile->ex_price = $request->ex_price[$key];
            $imageFile->exclued_package = $request->exclued_package[$key];
            if ($request->price[$key] == 0) $imageFile->is_free = 1;
            $imageFile->save();
        }


        if ($image->status == 3) {
            notify($image->user, 'IMAGE_REJECT', [
                'title' => $image->title,
                'category' => $image->category->name,
                'reason' =>  $image->reason
            ]);
        } elseif ($image->status == 1) {
            notify($image->user, 'IMAGE_APPROVED', [
                'title' => $image->title,
                'category' => $image->category->name
            ]);
        }

        $notify[] = ['success', 'Vector updated successfully'];
        return back()->withNotify($notify);
    }

    protected function vectorData($scope = null){
        $vectors = Image::query();
        if ($scope) {
            $vectors = Image::$scope();
        }
        return  $vectors->where('file_type', 'vector')->searchAble(['title', 'category:name', 'user:username,firstname,lastname', 'collections:title', 'admin:username,name', 'reviewer:username,name'])->withSum('files as total_downloads', 'total_downloads')->orderBy('id', 'desc')->with('user')->paginate(getPaginate());
    }

    public function downloadFile($id){
        $imageFile = ImageFile::findOrFail($id);
        return DownloadFile::download($imageFile);
    }
}
