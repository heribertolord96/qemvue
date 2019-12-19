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
        DB::table('users')->insert(
            [
                'id' => '1', //id_persona
                'name' => 'admin',
                'email' => 'admin@mypc.mx',        
            'password' => bcrypt('1234')
            ]);

            DB::table('users')->insert(
                ['id' => '2', //id_persona
                'name' => 'master', 
                'email' => 'master@mypc.mx',    
            'password' => bcrypt('1234')
                ]);
                //seed on roles table
                /*
            DB::table('roles')->insert(
                ['id'=>3,
                'name'=>'Master',
                'slug'=>'master',
                ]);*/
                    }
}
