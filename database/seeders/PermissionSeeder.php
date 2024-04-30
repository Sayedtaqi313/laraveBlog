<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        $routes = Route::getRoutes();
        $permissions_id = [];
        foreach($routes as $route) {
            if(strpos($route->getName(),'admin') !== false){
              $permission = Permission::create([
                    "name" => $route->getName()
                ]);
                $permissions_id[] = $permission->id;
            }
        }
       Role::where('name','=','admin')->first()->permissions()->sync($permissions_id);
    }
}
