<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function category ()
    {
        return $this->belongsTo(Category::class,'category_id');
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    //get route key name
    public function getRouteKeyName()
    {
        return 'slug';
    }



}
