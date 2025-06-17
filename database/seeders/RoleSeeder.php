<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        $roles = [
            ['libelle' => 'admin', 'description' => 'Administrateur du système'],
            ['libelle' => 'user', 'description' => 'Utilisateur standard'],


        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
