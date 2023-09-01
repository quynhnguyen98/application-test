<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTable extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['store_id', 'product_name', 'created_at', 'update_at']; 
}