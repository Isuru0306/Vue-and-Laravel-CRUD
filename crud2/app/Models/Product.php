<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = ['id'];
    protected $fillable=['p_name', 'p_descrption', 'p_price', 'p_stock'];
}
