<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin =Role::updateOrCreate(
            ['name' => 'admin'],
            ['name' => 'admin']
        );
        $role_siswa = Role::updateOrCreate(
            ['name' => 'siswa'],
            ['name' => 'siswa']
        );
        $role_guest = Role::updateOrCreate(
            ['name' => 'guest'],
            ['name' => 'guest']
        );
        
        $permissions = Permission::updateOrCreate(
            ['name' => 'view_data_siswa'],
            ['name' => 'view_data_siswa']
        );
        
        $permissions2 = Permission::updateOrCreate(
            ['name' => 'view_calon_siswa'],
            ['name' => 'view_calon_siswa']         
        );
        
        $permissions3 = Permission::updateOrCreate(
            ['name' => 'view_tambah_siswa'],
            ['name' => 'view_tambah_siswa']         
        );
        
        $permissions4 = Permission::updateOrCreate(
            ['name' => 'view_bukti_pembayaran'],
            ['name' => 'view_bukti_pembayaran']
                   
        );

        $permissions5 = Permission::updateOrCreate(
            ['name' => 'manage_pengumuman'],
            ['name' => 'manage_pengumuman']
                   
        );
        $permissions6 = Permission::updateOrCreate(
            ['name' => 'manage_materi'],
            ['name' => 'manage_materi']
            
                   
        );
        
       
        $role_admin->givePermissionTo($permissions);
        $role_admin->givePermissionTo($permissions2);
        $role_admin->givePermissionTo($permissions3);
        $role_admin->givePermissionTo($permissions4);
        $role_admin->givePermissionTo($permissions5);
        $role_admin->givePermissionTo($permissions6);
        
        $user = User::find(1);
        
        $user->assignRole('admin');

        $user2 = User::find(2);
        
        $user2->assignRole('siswa');



    }
}
