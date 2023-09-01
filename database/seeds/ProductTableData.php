<?php

use App\Models\ProductTable;
use Illuminate\Database\Seeder;

class ProductTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductTable::class, 20)->create();
    }
}
