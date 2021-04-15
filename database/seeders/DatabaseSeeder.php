<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//use DB
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //關閉外鍵偵測
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            CategorySeeder::class,
            //ProductSeeder::class,
        ]);
        //開啟外鍵偵測
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
