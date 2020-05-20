<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['title','description','image', 'writer','created_at','updated_at'];







}
