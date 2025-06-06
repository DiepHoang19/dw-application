<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Furniture extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_code', 'name', 'price', 'avatar'];
}