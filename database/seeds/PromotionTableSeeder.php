<?php

use Illuminate\Database\Seeder;

class PromotionTaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Promotion::class, 8)->create();
    }
}
