<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreTable extends Model
{
    protected $table      = 'stores';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'store_name', 'created_at', 'update_at']; 
}