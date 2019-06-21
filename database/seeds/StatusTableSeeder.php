<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cat = Status::create([ 'name'=>'Request Created']);
        $cat = Status::create([ 'name'=>'Boss Approved']);
        $cat = Status::create([ 'name'=>'Supt MIS Approved']);
        $cat = Status::create([ 'name'=>'Manager MIS Approved']);
        $cat = Status::create([ 'name'=>'Boss Rejected']);
        $cat = Status::create([ 'name'=>'Supt MIS Rejected']);
        $cat = Status::create([ 'name'=>'Manager MIS Rejected']);
        $cat = Status::create([ 'name'=>'Not Yet']);
        $cat = Status::create([ 'name'=>'In Progress']);
        $cat = Status::create([ 'name'=>'Finish']);
    }
}
