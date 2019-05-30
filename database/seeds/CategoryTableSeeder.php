<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = Category::create([ 'name'=>'Inquiry', 'text'=>'Bedasarkan Inq Create Date']);
        $cat = Category::create([ 'name'=>'Sales Order', 'text'=>'Berdasarkan SO Date']);
        $cat = Category::create([ 'name'=>'Order', 'text'=>'Berdasarkan Month Delivery']);
        $cat = Category::create([ 'name'=>'Shipment', 'text'=>'Berdasarkan  PGI Ship']);
        $cat = Category::create([ 'name'=>'Billing', 'text'=>'Berdasarkan Billing Date']);
    }
}
