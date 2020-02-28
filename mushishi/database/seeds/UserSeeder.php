<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\User::class, 10)->create();
        $user = $users->first();
        $user->name = 'mushi';
        $user->email = '396870249@qq.com';
        $user->save();
    }
}
