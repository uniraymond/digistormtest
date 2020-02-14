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
        factory(\App\User::class, 100)->create()->each(function ($user) {
            $user->profile()->save(factory(\App\Profile::class)->make());
            $user->phone()->save(factory(\App\Phone::class)->make());
            $user->address()->save(factory(\App\Address::class)->make());
        });
    }
}
