<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);       
        $this->call(CommerceTableSeeder::class);        
        $this->call(CommerceRoleUserTableSeeder::class);
        $this->call(DepartmentTaleSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        */
        $this->call(ProductTableSeeder::class);
        /*
        $this->call(EventTableSeeder::class);       
        $this->call(AdTableSeeder::class);
        $this->call(PromotionTaleSeeder::class);
        $this->call(PromotionTagTableSeeder::class); 
        $this->call(AdTagTableSeeder::class);
        $this->call(EventTagTableSeeder::class);*/
       
      
    }
}
