<?php

namespace App\Http\Controllers;

use App\Repositories\StoreInterface;
use Exception;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $storeInterface;

    public function __construct(StoreInterface $storeInterface){

        $this->storeInterface = $storeInterface;
    }
    public function listAction(Request $request)
    {
        try {
            $input = $request->all();
            $result = $this->storeInterface->getList($input);
            return $this->responseJson(0,"Lấy danh sách thành công", $result );
        }catch (Exception $e){
            return $this->responseJson(1, $e->getMessage());
        }
    }

    public function detailAction(Request $request)
    {
        try {
            $input = $request->all();
            $result = $this->storeInterface->getDetail($input);
            return $this->responseJson(0,"Lấy chi tiết thành công", $result );
        }catch (Exception $e){
            return $this->responseJson(1, $e->getMessage());
        }
    }

    public function createAction(Request $request)
    {
        try {
            $input = $request->all();
            $result = $this->storeInterface->create($input);
            return $this->responseJson(0,"Thêm cửa hàng mới thành công", $result );
        }catch (Exception $e){
            return $this->responseJson(1, $e->getMessage());
        }
    }

    public function updateAction(Request $request)
    {
        try {
            $input = $request->all();
            $result = $this->storeInterface->update($input);
            return $this->responseJson(0,"Cập nhật cửa hàng mới thành công", $result );
        }catch (Exception $e){
            return $this->responseJson(1, $e->getMessage());
        }
    }
    public function deleteAction(Request $request)
    {
        try {
            $input = $request->all();
            $result = $this->storeInterface->delete($input);
            return $this->responseJson(0,"Xoá cửa hàng mới thành công", $result );
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
