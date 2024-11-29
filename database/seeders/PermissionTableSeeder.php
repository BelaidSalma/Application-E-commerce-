<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'gerer tout',
        
         ];
         
         foreach ($permissions as $perm) {
            Permission::create(['name' => $perm,
        'guard_name' => 'web']);
         }
    }
}
