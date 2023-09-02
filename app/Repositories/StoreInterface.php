<?php
namespace App\Repositories;

interface StoreInterface
{
    public function getList($input);
    public function getDetail($input);
    public function create($input);
    public function update($input);
    public function delete($input);
}
