<?php

use Illuminate\Database\Seeder;
use App\Country;
class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Country = new Country();
        $Country->country_name = 'Philippines';
        $Country->save();

        $Country = new Country();
        $Country->country_name = 'Japan';
        $Country->save();

        $Country = new Country();
        $Country->country_name = 'Singapore';
        $Country->save();

        $Country = new Country();
        $Country->country_name = 'United States of America';
        $Country->save();

        $Country = new Country();
        $Country->country_name = 'Others';
        $Country->save();
    }
}
