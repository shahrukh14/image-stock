<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use GlobalStatus,Searchable;
    protected $table = 'blog_category';
}