<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ads extends Model
{
    use HasFactory,Searchable;


    public function getTypeTextAttribute()
    {
        $type = 'Image';
        if ($this->type == 1) {
            $type = 'Script';
        }
        return $type;
    }
}
