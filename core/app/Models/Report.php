<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function scopePending($query)
    {
        $query->where('status', Status::DISABLE);
    }
}
