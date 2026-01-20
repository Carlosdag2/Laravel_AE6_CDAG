<?php

namespace Database\Seeders;

use App\Models\UserCDAG;
use App\Models\PostCDAG;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 5 usuarios con 3 publicaciones cada uno
        UserCDAG::factory(5)
            ->has(PostCDAG::factory()->count(3), 'posts')
            ->create();

        // Usuario admin de prueba
        UserCDAG::factory()
            ->admin()
            ->active()
            ->has(PostCDAG::factory()->published()->count(5), 'posts')
            ->create([
                'name' => 'Admin CDAG',
                'username' => 'admin_cdag',
                'email' => 'admin@cdag.com',
            ]);

        // Usuario regular de prueba
        UserCDAG::factory()
            ->active()
            ->has(PostCDAG::factory()->count(2), 'posts')
            ->create([
                'name' => 'Test User CDAG',
                'username' => 'testuser_cdag',
                'email' => 'test@cdag.com',
                'role' => 'user',
            ]);
    }
}