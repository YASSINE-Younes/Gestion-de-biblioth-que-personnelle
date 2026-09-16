<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    // Function One Book BelongsTo One Category
    public function category()
    {
       return  $this->belongsTo(Category::class);
    }

    // Function One Book Belongs To One User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
