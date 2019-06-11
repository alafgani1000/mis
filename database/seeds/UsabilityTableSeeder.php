<?php

use Illuminate\Database\Seeder;
use App\Usability;

class UsabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usa = Usability::create([ 'name'=>'Analisa']);
        $usa = Usability::create([ 'name'=>'Evaluasi']);
        $usa = Usability::create([ 'name'=>'Non Teknis']);
            
    }
}
