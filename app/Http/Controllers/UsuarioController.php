<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Escola;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Exibe uma lista de usuários.
     */
    public function index()
    {
        $usuarios = Usuario::with('escola')->get(); // Carrega os usuários com as escolas
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Exibe o formulário para criar um novo usuário.
     */
    public function create()
    {
        $escolas = Escola::all(); // Lista todas as escolas disponíveis
        return view('usuarios.create', compact('escolas'));
    }

    /**
     * Armazena um novo usuário no banco de dados.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6',
            'telefone' => 'required|unique:usuarios,telefone',
            'tipo' => 'required|in:estudante,administradorInterno',
            'classe' => 'nullable|in:1,2,3,4,5',
            'turma' => 'nullable|string|max:255',
            'sala' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validação de imagem
            'periodo' => 'nullable|in:manhã,tarde,noite',
            'escola_id' => 'required|exists:escolas,id',
        ]);

        // Verifica se já existe um administrador interno na escola
        if ($validated['tipo'] === 'administradorInterno') {
            $adminCount = Usuario::where('escola_id', $validated['escola_id'])
                ->where('tipo', 'administradorInterno')
                ->count();

            if ($adminCount >= 1) {
                return back()->withErrors('Já existe um administrador interno nesta escola.');
            }
        }

        // Define automaticamente o primeiro usuário como administrador interno
        if (Usuario::where('escola_id', $validated['escola_id'])->count() === 0) {
            $validated['tipo'] = 'administradorInterno';
        }

        $validated['senha'] = bcrypt($validated['senha']);

        // Salvar foto se existir
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('usuarios', 'public');
        }

        Usuario::create($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um usuário.
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Exibe o formulário para editar um usuário.
     */
    public function edit(Usuario $usuario)
    {
        $escolas = Escola::all(); // Lista todas as escolas disponíveis
        return view('usuarios.edit', compact('usuario', 'escolas'));
    }

    /**
     * Atualiza as informações de um usuário no banco de dados.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'telefone' => 'required|unique:usuarios,telefone,' . $usuario->id,
            'tipo' => 'required|in:estudante,administradorInterno',
            'classe' => 'nullable|in:1,2,3,4,5',
            'turma' => 'nullable|string|max:255',
            'sala' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validação de imagem
            'periodo' => 'nullable|in:manhã,tarde,noite',
            'escola_id' => 'required|exists:escolas,id',
        ]);

        // Verifica se estamos promovendo um usuário a administrador interno
        if ($validated['tipo'] === 'administradorInterno' && $usuario->tipo !== 'administradorInterno') {
            $adminCount = Usuario::where('escola_id', $validated['escola_id'])
                ->where('tipo', 'administradorInterno')
                ->count();

            if ($adminCount >= 1) {
                return back()->withErrors('Já existe um administrador interno nesta escola.');
            }
        }

        // Salvar foto se existir
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('usuarios', 'public');
        }

        $usuario->update($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove um usuário do banco de dados.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
