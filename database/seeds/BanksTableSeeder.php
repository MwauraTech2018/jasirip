<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\Models\Bank::create([

            'name'=>'Baclays',
            'branch'=>'Nanyuki',
            'account_number'=>'7788833'
        ]);
    }
}
