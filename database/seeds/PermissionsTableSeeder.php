<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
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
          'name'          =>'Navegar Usuarios' ,
          'slug'          => 'users.index',
          'description'   => 'Lista y Navega todos los usuarios del sistema',
        ]);

        Permission::create([
          'name'          =>'Ver detalle de Usuario' ,
          'slug'          => 'users.show',
          'description'   => 'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
          'name'          =>'Editar Usuario' ,
          'slug'          => 'users.edit',
          'description'   => 'Editar cualquier usuario del sistema',
        ]);
        Permission::create([
          'name'          =>'Eliminar Usuario' ,
          'slug'          => 'users.destroy',
          'description'   => 'Eliminar cualquier usuario del sistema',
        ]);

        Permission::create([
          'name'          =>'Crear Usuario' ,
          'slug'          => 'users.create',
          'description'   => 'Crear un usuario del sistema',
        ]);

        //Roles
        Permission::create([
          'name'          =>'Navegar Roles' ,
          'slug'          => 'roles.index',
          'description'   => 'Lista y Navega todos los roles del sistema',
        ]);

        Permission::create([
          'name'          =>'Ver detalle de Roles',
          'slug'          => 'roles.show',
          'description'   => 'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
          'name'          =>'Editar Roles',
          'slug'          => 'roles.edit',
          'description'   => 'Editar cualquier rol del sistema',
        ]);
        Permission::create([
          'name'          =>'Eliminar Rol' ,
          'slug'          => 'roles.destroy',
          'description'   => 'Eliminar cualquier rol del sistema',
        ]);

        Permission::create([
          'name'          =>'Crear Rol' ,
          'slug'          => 'roles.create',
          'description'   => 'Crear un rol para sistema',
        ]);
    }
}
