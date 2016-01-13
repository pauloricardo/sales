<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CodeDelivery\Models\User::class)->create([
            'name' => 'Paulo Ricardo',
            'email' => 'paulorangel16@gmail.com',
            'password' => bcrypt('paul1508'),
            'remember_token' => str_random(10),
            'role' => 'admin'
        ]);

        factory(\CodeDelivery\Models\User::class, 10)->create()->each(function($c){
            $c->client()->save(factory(\CodeDelivery\Models\Client::class)->make());
        });
    }
}
