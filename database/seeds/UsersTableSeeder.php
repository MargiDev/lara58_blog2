<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // reset the users table
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
      DB::table('users')->truncate();

      // generate 3 users/author
      DB::table('users')->insert([
          [
              'name' => "Makara Chhin",
              'slug' => "makara-chhin",
              'email' => "makarachhin@test.com",
              'password' => bcrypt('secret')
          ],
          [
              'name' => "Rotha Chhin",
              'slug' => "rotha-chhin",
              'email' => "rothachhin@test.com",
              'password' => bcrypt('secret')
          ],
          [
              'name' => "Va dara",
              'slug' => "va-dara",
              'email' => "dara@test.com",
              'password' => bcrypt('secret')
          ],
      ]);
    }
}
