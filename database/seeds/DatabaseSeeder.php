<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        $this->call(RoleTableSeeder::class);//This must be excecuted before users cause it will cause an error while trying to configurate the role in the user.
        $this->call(UserTableSeeder::class);


    }
}
