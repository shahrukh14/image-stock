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

class ManageVideoController extends Controller
{
    public function all(){
        $pageTitle = 'All Videos';
        $videos   = $this->videoData();
        return view('admin.videos.list', compact('pageTitle', 'videos'));
    }

    public function pending(){
        $pageTitle = 'Pending Videos';
        $videos   = $this->videoData('pending');
        return view('admin.videos.list', compact('pageTitle', 'videos'));
    }

    public function rejected(){
        $pageTitle = 'Rejected Videos';
        $videos    = $this->videoData('rejected');
        return view('admin.videos.list', compact('pageTitle', 'videos'));
    }

    public function approved(){
        $pageTitle = 'Approved Videos';
        $videos    = $this->videoData('approved');
        return view('admin.videos.list', compact('pageTitle', 'videos'));
    }

    public function details($id){
        $video      = Image::with('user', 'files')->withSum('files as totalDownloads', 'total_downloads')->findOrFail($id);
        $pageTitle  = 'Video Details - ' . $video->title;
        $categories = Category::active()->orderBy('name', 'asc')->get();
        $colors     = Color::orderBy('name', 'desc')->get();
        $extensions = getFileExt('video_extensions');
        $reasons    = Reason::all();

        $url = $video->video_url;
        $firstParam = '';
        if (strpos($url, 'youtu.be') !== false) {
            // For 'youtu.be' URLs
            $parts = explode('/', $url);
            $firstParam = end($parts);
        } else if (strpos($url, 'youtube.com') !== false) {
            // For 'youtube.com' URLs
            $query = parse_url($url, PHP_URL_QUERY);
            parse_str($query, $queryParams);
            $firstParam = isset($queryParams['v']) ? $queryParams['v'] : '';
        }
        $video_url = "https://www.youtube.com/embed/".$firstParam;

        return view('admin.videos.detail', compact('pageTitle', 'video', 'categories', 'colors', 'extensions', 'reasons','video_url'));
    }

    public function update(Request $request, $id){
        $extensions = getFileExt('video_extensions');
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

        $notify[] = ['success', 'Video updated successfully'];
        return back()->withNotify($notify);
    }

    protected function videoData($scope = null){
        $videos = Image::query();
        if ($scope) {
            $videos = Image::$scope();
        }
        return  $videos->where('file_type', 'video')->searchAble(['title', 'category:name', 'user:username,firstname,lastname', 'collections:title', 'admin:username,name', 'reviewer:username,name'])->withSum('files as total_downloads', 'total_downloads')->orderBy('id', 'desc')->with('user')->paginate(getPaginate());
    }
}
