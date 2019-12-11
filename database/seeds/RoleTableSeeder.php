<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id'    =>'1',
            'name'      =>'Owner',
            'slug'      =>'Owner',
            'special'   =>'all-access',
            ]);
        Role::create([
            'id'    =>'2',
            'name'      =>'Admin',
            'slug'      =>'admin',
            'special'   =>'all-access',
        ]);
        Role::create([
            'id'    =>'3',
            'name'      =>'Editor de publicidad',
            'slug'      =>'editor-de-publicidad',
            'special'   =>'no-access',
         ]);
        Role::create([
            'id'    =>'4',
            'name'      =>'Vendedor',
            'slug'      =>'dealer',
            'special'   =>'no-access',
        ]);

           
//Hacer que, al marcar un permiso especial, se marquen las casillas de los permisos esos
     
    }
}
