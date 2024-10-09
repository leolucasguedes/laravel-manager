<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresaAdmin = Company::create([
            'empresa_nome' => 'Admin',
        ]);

        User::create([
            'usuario_nome' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('super123'),
            'empresa_id' => $empresaAdmin->id,
        ]);
    }
}
