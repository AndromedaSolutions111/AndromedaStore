<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario; 
use App\Models\Escola;
use Illuminate\Support\Facades\Hash;

class AdministradorSistemaSeeder extends Seeder
{
    public function run()
    {
        // Verifica se o primeiro administrador já existe, para evitar duplicação
        if (Usuario::where('email', 'andromeda@gmail.com')->doesntExist()) {
            // Criação do administrador geral
            Usuario::create([
                'nome' => 'Andromeda',
                'email' => 'andromeda@gmail.com',
                'senha' => Hash::make('1234'),  // Senha criptografada
                'telefone' => '111111111',
                'tipo' => 'administradorSistema',  // Tipo de usuário
                'escola_id' => 1,  //vinculado a  escola Andromeda
            ]);

            $this->command->info('Administrador Geral (Andromeda) criado com sucesso!');
        } else {
            $this->command->info('Administrador Geral (Andromeda) já existe.');
        }
    }
}
