<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTable extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['store_id', 'product_name', 'created_at', 'update_at'];

    public function detail($input)
    {
        $result = $this->select("users.full_name","products.product_name","stores.store_name")
                    ->join("stores", "stores.id", "=", "products.store_id")
                    ->join("users", "users.id", "=", "stores.user_id")
                    ->where("products.id", $input["product_id"])
                    ->where("stores.user_id", $input["user_id"])
                    ->first();
        return $result;
    }

    public function updateProduct($input)
    {
        return $this->where("id", $input["product_id"])
                    ->update(["product_name" => $input["product_name"]]);
    }
    public function deleteProduct($input)
    {
        return $this->where("id", $input["product_id"])
                    ->delete();
    }
}