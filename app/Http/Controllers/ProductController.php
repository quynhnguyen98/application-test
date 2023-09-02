<?php

namespace App\Http\Controllers;

use App\Repositories\ProductInterface;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }
    public function detailAction(Request $request)
    {
        try {
            $input = $request->all();
            $result = $this->productInterface->getDetail($input);
            return $this->responseJson(0,"Lấy chi tiết thành công", $result);
        }catch (Exception $e){
            return $this->responseJson(1, $e->getMessage());
        }
    }
    public function createAction(Request $request)
    {
        try {
            $input = $request->all();
            $result = $this->productInterface->create($input);
            return $this->responseJson(0,"Thêm sản phẩm thành công", $result);
        }catch (Exception $e){
            return $this->responseJson(1, $e->getMessage());
        }
    }

    public function updateAction(Request $request)
    {
        try {
            $input = $request->all();
            $result = $this->productInterface->update($input);
            return $this->responseJson(0,"Cập nhật sản phẩm thành công", $result);
        }catch (Exception $e){
            return $this->responseJson(1, $e->getMessage());
        }
    }
    public function deleteAction(Request $request)
    {
        try {
            $input = $request->all();
            $result = $this->productInterface->delete($input);
            return $this->responseJson(0,"Xoá sản phẩm thành công", $result);
        }catch (Exception $e){
            return $this->responseJson(1, $e->getMessage());
        }
    }

    protected function responseJson($codeStatus, $mess, $data = null)
    {
        return response()->json([
            'error_code' => $codeStatus,
            'message' => $mess,
            'data_error' => null,
            'data' => $data
        ]);
    }
}
