<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagepath' => 'http://bk-apac-prd.s3.amazonaws.com/sites/burgerking.co.nz/files/BUR2423D_Kings-Collection_PRODUCT_300x270_02%5B1%5D.png',
            'title' => 'Double chicken and cheese burger',
            'description' =>'good for one person ',    
            'price' => 450
            ]);
        $product->save();

        $product = new \App\Product([
            'imagepath' => 'https://i.amz.mshcdn.com/nnupHaruaD-afk0ICP7t1QTL2v8=/1200x627/2016%2F01%2F29%2Fa4%2F003604PRIma.7cc07.jpg',
            'title' => 'Chicken charger',
            'description' =>'good breakfast',
            'price' => 235
            ]);
        $product->save();

        $product = new \App\Product([
            'imagepath' => 'http://www.bngkolkata.com/web/wp-content/uploads/2015/09/img_55e65939b75ea.png',
            'title' => 'Black Truffle Cheese Burger',
            'description' =>' Beef-burgers topped with black truffle cheese, roasted shallots and truffle-infused sauteed mushrooms. Served on brioche with leaf lettuce and roasted garlic aioli',
            'price' => 350
            ]);
        $product->save();

        $product = new \App\Product([
            'imagepath' => 'http://bk-apac-prd.s3.amazonaws.com/sites/burgerkingindia.in/files/BK-Veggie-Thumb_0.png',
            'title' => 'vegetarian burger',
            'description' =>'loremmmmmmmmmmmmmm',
            'price' => 220
            ]);
        $product->save();

        $product = new \App\Product([
            'imagepath' => 'http://www.oporto.co.nz/wp-content/uploads/2015/09/Bacon_and_Egg_Burger.141595.png',
            'title' => 'just a burger',
            'description' =>'this is just an image',
            'price' => 245
            ]);
        $product->save();

        $product = new \App\Product([
            'imagepath' => 'https://vignette.wikia.nocookie.net/ronaldmcdonald/images/f/fc/Royal_McChicken.png/revision/latest?cb=20160108163801',
            'title' => 'royal burger',
            'description' =>'royal it is..',
            'price' => 470
            ]);
        $product->save();

        $product = new \App\Product([
            'imagepath' => 'https://bk-ca-prd.s3.amazonaws.com/sites/burgerking.ca/files/02750-2%20BK_Web_DblQtrPndKing_500x540px_CR_0.png',
            'title' => 'double quater pound king',
            'description' =>'it is yummy',
            'price' => 23
            ]);
        $product->save();

        $product = new \App\Product([
            'imagepath' => 'https://www.lordofthefries.com.au/wp-content/uploads/2016/03/Chickn.jpg',
            'title' => 'omlette burger',
            'description' =>'loremmmmmmmmmmmmmm',
            'price' => 265
            ]);
        $product->save();
    }
}
