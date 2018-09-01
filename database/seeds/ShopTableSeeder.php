<?php

use Illuminate\Database\Seeder;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new \App\Table([
            'name' => 'Table 1',
            'people' => '4',
            'status' =>'1'
        ]);
        $table->save();

        $table = new \App\Table([
            'name' => 'Table 2',
            'people' => '4',
            'status' =>'0'
        ]);
        $table->save();

        $table = new \App\Table([
            'name' => 'Table 3',
            'people' => '6',
            'status' =>'1'
        ]);
        $table->save();

        $table = new \App\Table([
            'name' => 'Table 4',
            'people' => '4',
            'status' =>'1'
        ]);
        $table->save();

        $table = new \App\Table([
            'name' => 'Table 5',
            'people' => '8',
            'status' =>'0'
        ]);
        $table->save();
    }
}
