<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = Product::create([ 'name'=>'HR']);
        $cat = Product::create([ 'name'=>'CR']);
        $cat = Product::create([ 'name'=>'PO']);
        $cat = Product::create([ 'name'=>'WR']);
        $cat = Product::create([ 'name'=>'BY PROD']);    
    }
}
