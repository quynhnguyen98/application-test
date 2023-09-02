<?php
namespace App\Repositories;

interface ProductInterface
{
    public function getDetail($input);
    public function create($input);
    public function update($input);
    public function delete($input);
}