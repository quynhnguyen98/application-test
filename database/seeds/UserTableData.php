<?php

use App\Models\UserTable;
use Illuminate\Database\Seeder;

class UserTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserTable::class, 5)->create();
    }
}
