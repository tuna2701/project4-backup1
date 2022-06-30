<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $table = 'book';
    public function category(){
        return $this->belongsTo(category::class,'category_id');
    }
    public function publisher(){
        return $this->belongsTo(publisher::class,'publisher');
    }
}
