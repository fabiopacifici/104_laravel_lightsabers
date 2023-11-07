<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LightSaber extends Model
{
    use HasFactory;
    use SoftDeletes;
    /* Todo: check if needed or remove */
    //protected $table = "travels";



    protected $fillable = ['name', 'cover_image', 'description', 'price'];

    // danger! disable mass assignmetn completely
    //protected $guarded = [];
}
