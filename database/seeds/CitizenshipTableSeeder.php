<?php

use Illuminate\Database\Seeder;
use App\Citizenship;
class CitizenshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Citizenship = new Citizenship();
        $Citizenship->citizenship_name = 'Filipino';
        $Citizenship->save();

        $Citizenship = new Citizenship();
        $Citizenship->citizenship_name = 'Japanese';
        $Citizenship->save();
        
        $Citizenship = new Citizenship();
        $Citizenship->citizenship_name = 'Singaporean';
        $Citizenship->save();

        $Citizenship = new Citizenship();
        $Citizenship->citizenship_name = 'American';
        $Citizenship->save();


        $Citizenship = new Citizenship();
        $Citizenship->citizenship_name = 'Others';
        $Citizenship->save();
    }
}
