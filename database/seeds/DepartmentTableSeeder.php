<?php

use Illuminate\Database\Seeder;

class DepartmentTaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Department::class, 28)->create();
    }
}
