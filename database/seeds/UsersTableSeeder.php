<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

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

      $faker = Factory::create();

      // generate 3 users/author
      DB::table('users')->insert([
          [
              'name' => "Makara Chhin",
              'slug' => "makara-chhin",
              'email' => "makarachhin@test.com",
              'password' => bcrypt('secret'),
              'bio' => $faker->text(rand(250,300))
          ],
          [
              'name' => "Rotha Chhin",
              'slug' => "rotha-chhin",
              'email' => "rothachhin@test.com",
              'password' => bcrypt('secret'),
              'bio' => $faker->text(rand(250,300))
          ],
          [
              'name' => "Va dara",
              'slug' => "va-dara",
              'email' => "dara@test.com",
              'password' => bcrypt('secret'),
              'bio' => $faker->text(rand(250,300))
          ],
      ]);
    }
}
