<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreTable extends Model
{
    protected $table      = 'stores';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'store_name', 'created_at', 'updated_at'];

    public function getList($input)
    {
        $query = $this->select("stores.store_name", "products.product_name")
                      ->leftJoin("products", "stores.id", "=", "products.store_id")
                      ->where("stores.user_id", $input["user_id"]);

        if(!empty($input["search"])){
            $query = $query->where("store_name", "like", "%{$input["search"]}%");
        }
        return $query->get()->groupBy('store_name');
    }

    public function getDetail($input)
    {
        return $this->select("stores.store_name", "products.product_name")
                      ->leftJoin("products", "stores.id", "=", "products.store_id")
                      ->where("stores.id", $input["store_id"])
                      ->where("stores.user_id", $input["user_id"])
                      ->get()->groupBy('store_name');
    }

    public function updateStore($input)
    {
        return $this->where("id", $input["store_id"])
                    ->update(["store_name" => $input["store_name"]]);
    }
    public function deleteStore($input)
    {
        return $this->where("id", $input["store_id"])
                    ->delete();
    }
}