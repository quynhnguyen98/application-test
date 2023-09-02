<?php
namespace App\Repositories;

use App\Models\StoreTable;
use Exception;

class StoreRepo implements StoreInterface
{
    protected $storeTable;
    public function __construct(StoreTable $storeTable)
    {
        $this->storeTable = $storeTable;
    }

    public function mergeProductByStore($result)
    {
        $transformedResults = $result->map(function ($items) {
            $productNames = $items->pluck('product_name')->filter()->toArray();
            return [
                "store_name" => $items[0]["store_name"],
                "product_name" => !empty($productNames) ? $productNames : null,
            ];
        })->values();
        
        return $transformedResults;
    }
    public function getList($input)
    {
        $input["user_id"] = auth()->user()->id;
        $result = $this->storeTable->getList($input);

        if (!count($result)) {
            throw new Exception("Không có cửa hàng nào !");
        }

        $transformedResults = $this->mergeProductByStore($result);
        return $transformedResults->paginateCollection(2);
    }

    public function getDetail($input)
    {
        $input["user_id"] = auth()->user()->id;
        $result = $this->storeTable->getDetail($input);
        if (!count($result)) {
            throw new Exception("Không có cửa hàng này");
        }

        $transformedResults = $this->mergeProductByStore($result);
        return $transformedResults;
    }

    public function create($input)
    {
        $input["user_id"] = auth()->user()->id;
        return $this->storeTable->create($input);
    }

    public function update($input)
    {
        $detail = $this->getDetail($input);
        return $this->storeTable->updateStore($input);
    }
    public function delete($input)
    {
        $detail = $this->getDetail($input);
        return $this->storeTable->deleteStore($input);
    }
}
