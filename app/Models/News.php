<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image_path',
        'keyWords',
        'timeReading',
        'createdBy',
        'categoryID',
        'supCategoryID',
];

    public function User(){
        return $this->belongsTo(User::class,'createdBy');
    }
    public function Category(){
        return $this->belongsTo(Category::class,'categoryID');
    }
    public function SupCategory(){
        return $this->belongsTo(SupCategory::class,'supCategoryID');
    }

    public function getImagepathAttribute($value){
        return 'images/Imag_Nwes/' .$value;
    }
}
