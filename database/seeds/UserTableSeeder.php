<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User = new User();
        $User->name = 'John Paul Belga';
        $User->email = 'belgajohnpauldimaano@gmail.com';
        $User->password = bcrypt('123abc');
        $User->age = 26;
        $User->address = 'Pineda Pasig City';
        $User->country_id = 1;
        $User->citizenship_id = 1;
        $User->save();

        $User = new User();
        $User->name = 'David Sanchez';
        $User->email = 'davidsanchez@gmail.com';
        $User->password = bcrypt('123abc');
        $User->age = 23;
        $User->address = 'Tokyo';
        $User->country_id = 2;
        $User->citizenship_id = 2;
        $User->save();

        $User = new User();
        $User->name = 'Peter Parker';
        $User->email = 'peterparker@gmail.com';
        $User->password = bcrypt('123abc');
        $User->age = 29;
        $User->address = 'buangkok crescent';
        $User->country_id = 3;
        $User->citizenship_id = 4;
        $User->save();
    }
}
