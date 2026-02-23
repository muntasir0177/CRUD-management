<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin User
        $superAdmin = User::create([
            'name' => 'Muntasir Mahmud', 
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
      
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $superAdminRole->syncPermissions($permissions);
        $superAdmin->assignRole([$superAdminRole->id]);

        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $adminRole = Role::create(['name' => 'Admin']);
        // Assign some permissions to Admin (optional, or same as Super Admin but logic will restrict)
        $adminRole->syncPermissions($permissions); 
        $admin->assignRole([$adminRole->id]);
    }
}