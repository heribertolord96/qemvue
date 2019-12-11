<?php

use Illuminate\Database\Seeder;

class PromotionTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PromotionTag::class, 8)->create();
    }
}
