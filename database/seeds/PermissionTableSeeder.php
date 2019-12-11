<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Users
                Permission::create([
                    //1
                    'name'          => 'Navegar usuarios',
                    'slug'          => 'users.index',
                    'description'   => 'Lista y navega todos los usuarios',
                ]);

                Permission::create([
                    'name'          => 'Ver detalle de usuario',
                    'slug'          => 'users.show',
                    'description'   => 'Ve en detalle cada usuario',            
                ]);
                
                Permission::create([
                    //3
                    'name'          => 'Edición de usuarios',
                    'slug'          => 'users.edit',
                    'description'   => 'Podría editar cualquier dato de un usuario',
                ]);
                
                Permission::create([
                    'name'          => 'Eliminar usuario',
                    'slug'          => 'users.destroy',
                    'description'   => 'Podría eliminar cualquier usuario',      
                ]);
        //Users

        //Roles
            //5
            Permission::create([ 
                'name'          => 'Navegar roles',
                'slug'          => 'roles.index',
                'description'   => 'Lista y navega todos los roles',
            ]);

            Permission::create([
                'name'          => 'Ver detalle de un rol',
                'slug'          => 'roles.show',
                'description'   => 'Ve en detalle cada rol',            
            ]);
            
            Permission::create([
                //7
                'name'          => 'Creación de roles',
                'slug'          => 'roles.create',
                'description'   => 'Podría crear nuevos roles en el sistema',
            ]);
            
            Permission::create([
                'name'          => 'Edición de roles',
                'slug'          => 'roles.edit',
                'description'   => 'Podría editar cualquier dato de un rol',
            ]);
            
            Permission::create([
                //9
                'name'          => 'Eliminar roles',
                'slug'          => 'roles.destroy',
                'description'   => 'Podría eliminar cualquier rol',      
            ]);
        //Roles

        //Products
                Permission::create([
                    //10
                    'name'          => 'Navegar productos',
                    'slug'          => 'products.index',
                    'description'   => 'Lista y navega todos los productos',
                ]);

                Permission::create([
                    'name'          => 'Ver detalle de un producto',
                    'slug'          => 'products.show',
                    'description'   => 'Ve en detalle cada producto',            
                ]);
                
                Permission::create([
                    //12
                    'name'          => 'Creación de productos',
                    'slug'          => 'products.create',
                    'description'   => 'Podría crear nuevos productos en el sistema',
                ]);
                
                Permission::create([
                    'name'          => 'Edición de productos',
                    'slug'          => 'products.edit',
                    'description'   => 'Podría editar cualquier dato de un producto',
                ]);
                
                Permission::create([
                    //14
                    'name'          => 'Eliminar productos',
                    'slug'          => 'products.destroy',
                    'description'   => 'Podría eliminar cualquier producto',      
                ]);
        //Products

        //Commerces
            Permission::create([
                //1
                'name'          => 'Navegar commercios',
                'slug'          => 'commerces.index',
                'description'   => 'Lista y navega todos los commercios',
            ]);

            Permission::create([
                'name'          => 'Ver detalle de usuario',
                'slug'          => 'commerces.show',
                'description'   => 'Ve en detalle cada usuario',            
            ]);
            
            Permission::create([
                //3
                'name'          => 'Edición de commercios',
                'slug'          => 'commerces.edit',
                'description'   => 'Podría editar cualquier dato de un commercio',
            ]);
            
            Permission::create([
                'name'          => 'Eliminar commercio',
                'slug'          => 'commerces.destroy',
                'description'   => 'Podrá eliminar cualquier commercio',      
            ]);
        //Commerces

        //Category
            Permission::create([
                //1
                'name'          => 'Navegar categorias',
                'slug'          => 'category.index',
                'description'   => 'Lista y navega todos los categorias',
            ]);

            Permission::create([
                'name'          => 'Ver detalle de categoria',
                'slug'          => 'category.show',
                'description'   => 'Ve en detalle cada categoria',            
            ]);
            
            Permission::create([
                //3
                'name'          => 'Edición de categorias',
                'slug'          => 'category.edit',
                'description'   => 'Podría editar cualquier dato de un categoria',
            ]);
            
            Permission::create([
                'name'          => 'Eliminar categoria',
                'slug'          => 'category.destroy',
                'description'   => 'Podría eliminar cualquier categoria',      
            ]);
        //Category

        //Department
            Permission::create([
                //1
                'name'          => 'Navegar departamentos',
                'slug'          => 'departments.index',
                'description'   => 'Lista y navega todos los departamentos',
            ]);

            Permission::create([
                'name'          => 'Ver detalle de departamento',
                'slug'          => 'departments.show',
                'description'   => 'Ve en detalle cada departamento',            
            ]);
            
            Permission::create([
                //3
                'name'          => 'Edición de departamentos',
                'slug'          => 'departments.edit',
                'description'   => 'Podría editar cualquier dato de un departamento',
            ]);
            
            Permission::create([
                'name'          => 'Eliminar departamento',
                'slug'          => 'departments.destroy',
                'description'   => 'Podría eliminar cualquier departamento',      
            ]);
        //Department

        //Event
            Permission::create([
                //1
                'name'          => 'Navegar eventos',
                'slug'          => 'events.index',
                'description'   => 'Lista y navega todos los eventos',
            ]);

            Permission::create([
                'name'          => 'Ver detalle de evento',
                'slug'          => 'events.show',
                'description'   => 'Ve en detalle cada evento',            
            ]);
            
            Permission::create([
                //3
                'name'          => 'Edición de eventos',
                'slug'          => 'events.edit',
                'description'   => 'Podría editar cualquier dato de un evento',
            ]);
            
            Permission::create([
                'name'          => 'Eliminar evento',
                'slug'          => 'events.destroy',
                'description'   => 'Podría eliminar cualquier evento',      
           ]);
        //Event

        //Promotion
            Permission::create([
                //1
                'name'          => 'Navegar promocions',
                'slug'          => 'promotion.index',
                'description'   => 'Lista y navega todos los promocions',
            ]);

            Permission::create([
                'name'          => 'Ver detalle de promocion',
                'slug'          => 'promotion.show',
                'description'   => 'Ve en detalle cada promocion',            
            ]);
            
            Permission::create([
                //3
                'name'          => 'Edición de promocions',
                'slug'          => 'promotion.edit',
                'description'   => 'Podría editar cualquier dato de un promocion',
            ]);
            
            Permission::create([
                'name'          => 'Eliminar promocion',
                'slug'          => 'promotion.destroy',
                'description'   => 'Podría eliminar cualquier promocion',      
            ]);
        //Promotion

        //Ad
            Permission::create([
                //1
                'name'          => 'Navegar anuncios',
                'slug'          => 'ads.index',
                'description'   => 'Lista y navega todos los anuncios',
            ]);

            Permission::create([
                'name'          => 'Ver detalle de anuncio',
                'slug'          => 'ads.show',
                'description'   => 'Ve en detalle cada anuncio',            
            ]);
            
            Permission::create([
                //3
                'name'          => 'Edición de anuncios',
                'slug'          => 'ads.edit',
                'description'   => 'Podría editar cualquier dato de un anuncio',
            ]);
            
            Permission::create([
                'name'          => 'Eliminar anuncio',
                'slug'          => 'ads.destroy',
                'description'   => 'Podría eliminar cualquier anuncio',      
            ]);
        //Ad

        //sales
            Permission::create([
                //1
                'name'          => 'Navegar ventas',
                'slug'          => 'sales.index',
                'description'   => 'Lista y navega todos los ventas',
            ]);

            Permission::create([
                'name'          => 'Ver detalle de venta',
                'slug'          => 'sales.show',
                'description'   => 'Ve en detalle cada venta',            
            ]);
            
            Permission::create([
                //3
                'name'          => 'Edición de ventas',
                'slug'          => 'sales.edit',
                'description'   => 'Podría editar cualquier dato de un venta',
            ]);
            
            Permission::create([
                'name'          => 'Eliminar venta',
                'slug'          => 'sales.destroy',
                'description'   => 'Podría eliminar cualquier venta',      
            ]);
        //sales

        //Tags
            Permission::create([
                //1
                'name'          => 'Navegar etiquetas',
                'slug'          => 'tags.index',
                'description'   => 'Lista y navega todos los etiquetas ',
            ]);

            Permission::create([
                'name'          => 'Ver detalle de etiqueta',
                'slug'          => 'tags.show',
                'description'   => 'Ve en detalle cada etiqueta ',            
            ]);
            
            Permission::create([
                //3
                'name'          => 'Edición de etiquetas',
                'slug'          => 'tags.edit',
                'description'   => 'Podría editar cualquier dato de un etiqueta ',
            ]);
            
            Permission::create([
                'name'          => 'Eliminar etiqueta',
                'slug'          => 'tags.destroy',
                'description'   => 'Podría eliminar cualquier etiqueta ',      
            ]);
        //Tags
        
    }
}

