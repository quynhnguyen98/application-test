<?php

use App\Models\StoreTable;
use Illuminate\Database\Seeder;

class StoreTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StoreTable::class, 10)->create();
    }
}
