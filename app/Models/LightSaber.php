<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightSaber extends Model
{
    use HasFactory;

    /* Todo: check if needed or remove */
    protected $table = "light_sabers";

    protected $fillable = ['name', 'cover_image', 'description', 'price'];

    // danger! disable mass assignmetn completely
    //protected $guarded = [];
}
