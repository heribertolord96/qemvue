<?php

use Illuminate\Database\Seeder;
use App\CommerceRole;
use App\CommerceUser;

class CommerceRoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CommerceUser::class, 8)->create();
        factory(App\CommerceRole::class, 8)->create();
        factory(App\CommerceRoleUser::class, 5)->create();

    }
}
