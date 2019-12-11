<?php

use Illuminate\Database\Seeder;

class CommerceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Commerce::class,10)->create();
    }
}
