<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    public function News(){
        return $this->belongsTo(News::class,);

    }
    public function SupCategory(){
        return $this->hasMany(SupCategory::class,'categoryID');
    }
}
