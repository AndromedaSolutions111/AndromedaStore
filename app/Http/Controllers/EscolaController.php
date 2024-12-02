<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Http\Request;

class EscolaController extends Controller
{
    /**
     * Exibir uma lista de escolas.
     */
    public function index()
    {
        $escolas = Escola::all(); // Recuperar todas as escolas
        return view ('escolas.index', compact('escolas'));
    }

    /**
     * Mostrar o formulário para criar uma nova escola.
     */
    public function create()
    {
        return view('escolas.create');
    }

    /**
     * Armazenar uma nova escola no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10|unique:escolas,sigla',
            'email' => 'nullable|email|unique:escolas,email',
            'telefone' => 'nullable|string|max:15',
            'endereco' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validação de imagem
        ]);

        $dados = $request->all();

        // Verificar se a foto é um arquivo de imagem ou URL
        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('escolas', 'public');
        } elseif (filter_var($request->foto, FILTER_VALIDATE_URL)) {
            // Se for uma URL válida, salvar a URL
            $dados['foto'] = $request->foto;
        }

        Escola::create($dados);

        return redirect()->route('escolas.index')->with('success', 'Escola criada com sucesso!');
    }

    /**
     * Exibir detalhes de uma escola específica.
     */
    public function show(Escola $escola)
    {
        return view('escolas.show', compact('escola'));
    }

    /**
     * Mostrar o formulário para editar uma escola existente.
     */
    public function edit(Escola $escola)
    {
        return view('escolas.edit', compact('escola'));
    }

    /**
     * Atualizar uma escola existente no banco de dados.
     */
    public function update(Request $request, Escola $escola)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => "required|string|max:10|unique:escolas,sigla,{$escola->id}",
            'email' => "nullable|email|unique:escolas,email,{$escola->id}",
            'telefone' => 'nullable|string|max:15',
            'endereco' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $dados = $request->all();

        // Verificar se a foto é um arquivo de imagem ou URL
        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('escolas', 'public');
        } elseif (filter_var($request->foto, FILTER_VALIDATE_URL)) {
            // Se for uma URL válida, salvar a URL
            $dados['foto'] = $request->foto;
        }

        $escola->update($dados);

        return redirect()->route('escolas.index')->with('success', 'Escola atualizada com sucesso!');
    }


    /**
     * Remover uma escola do banco de dados.
     */
    public function destroy(Escola $escola)
    {
        if ($escola->foto) {
            \Storage::delete("public/{$escola->foto}");
        }

        $escola->delete();

        return redirect()->route('escolas.index')->with('success', 'Escola removida com sucesso!');
    }
}
