<?php

namespace Database\Seeders;

use App\Models\Escola;
use Illuminate\Database\Seeder;

class EscolaSeeder extends Seeder
{
    public function run()
    {
        // Verifica se a escola 'Andromeda' já existe
        if (!Escola::where('sigla', 'ADMD')->exists()) {
            // Criação da escola Andromeda
            $escola = Escola::create([
                'nome' => 'Andromeda',
                'sigla' => 'ADMD',
            ]);
        }
    }
}
