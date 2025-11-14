<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use GlobalStatus,Searchable;

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function latestImage($category){
        $image = Image::whereJsonContains('category_id', (string)$category)->latest()->first();
        return $image;
    }
}
