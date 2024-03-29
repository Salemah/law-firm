<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function User() {
        return $this->belongsTo(User::class, 'created_by');
    }
}
