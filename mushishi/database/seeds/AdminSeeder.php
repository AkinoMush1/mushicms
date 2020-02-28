<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\Admin::class, 10)->create();
        $user = $users->first();
        $user->name = 'mushi';
        $user->nickname = '虫子';
        $user->save();
//        $otaku = $users->find(2);
//        $otaku->name = 'otaku';
//        $otaku->nickname = '阿宅';
//        $otaku->save();
        \Spatie\Permission\Models\Role::create([
            'title' => '站长',
            'name' => 'webmaster',
            'guard_name' => 'admin'
        ]);
        $user->assignRole('webmaster');
    }
}
