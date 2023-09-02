<?php
namespace App\Repositories;

use App\Models\ProductTable;

class ProductRepo implements ProductInterface
{
    protected $productTable;
    protected $storeInterface;
    public function __construct(ProductTable $productTable, StoreInterface $storeInterface){

        $this->productTable = $productTable;
        $this->storeInterface = $storeInterface;
    }
    
    public function getDetail($input)
    {
        $input["user_id"] = auth()->user()->id;
        $result = $this->productTable->detail($input);
        if (!isset($result)) {
            throw new \Exception("Không tìm thấy sản phẩm !");
        }
        return $result;
    }

    public function create($input)
    {
        $input["user_id"] = auth()->user()->id;
        $detailStore = $this->storeInterface->getDetail($input);
        return $this->productTable->create($input);
    }
    public function update($input)
    {
        $input["user_id"] = auth()->user()->id;
        $detailproduct = $this->getDetail($input);
        return $this->productTable->updateProduct($input);
    }
    public function delete($input)
    {
        $input["user_id"] = auth()->user()->id;
        $detailproduct = $this->getDetail($input);
        return $this->productTable->deleteProduct($input);
    }

}
