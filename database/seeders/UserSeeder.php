<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // 1. D'abord créer l'utilisateur admin manuellement
         DB::table('users')->insert([
             'nom' => 'Diallo',
             'prenom' => 'Mamadou',
             'username' => 'dmamadou',
             'telephone' => '773417360',
             'adresse' => '123 Rue Admin',
             'ville' => 'Dakar',
             'code_postal' => '00000',
             'pays' => 'France',
             'email' => 'dmamadou.tech@gmail.com',
             'email_verified_at' => now(),
             'password' => Hash::make('Di@lloODC5'),
            // 'remember_token' => Str::random(10),
             'created_at' => now(),
             'updated_at' => now()
         ]);

        // 2. Ensuite générer les faux utilisateurs avec la Factory
        User::factory(10)->create(); // <-- Ajoutez cette ligne ici
    }
}
