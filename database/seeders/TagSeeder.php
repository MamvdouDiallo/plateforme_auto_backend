<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name' => 'vehicule export Africa',
            ],
            [
                'name' => 'SUV extreme climate',
            ],
            [
                'name' => 'best 4x4 for africa',
            ],
            [
                'name' => 'rugged car Africa',
            ],
            [
                'name' => 'Euro 6 Africa',
            ],
            [
                'name' => 'tropicalized 4x4',
            ]
        ];

        Tag::insert($tags);
    }
}
