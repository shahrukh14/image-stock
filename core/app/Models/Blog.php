<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use GlobalStatus,Searchable;
    protected $table = 'blogs';

    public function Category()
    {
        return $this->belongsTo(BlogCategory::class,'category','id');
    }
}