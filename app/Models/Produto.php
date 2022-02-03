<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Produto extends Model
{
    use HasFactory;


    protected $fillable = [
        'price',
        'name',
        'photo'
    ];
    
    public function getPhotoUrlAttribute(){
        return asset('storage/imagens/' . $this->photo);
    }

}
