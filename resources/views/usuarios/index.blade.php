@extends('layouts.app')

@section('title', 'Listar Usuários')

@section('content')
<div class="container">
    <h1>Lista de Usuários</h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Adicionar Usuário</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Tipo</th>
                <th>Classe</th>
                <th>Turma</th>
                <th>Sala</th>
                <th>Foto</th>
                <th>Período</th>
                <th>Escola</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->telefone }}</td>
                    <td>{{ ucfirst($usuario->tipo) }}</td>
                    <td>{{ $usuario->classe ? $usuario->classe : 'N/A' }}</td>
                    <td>{{ $usuario->turma ? $usuario->turma : 'N/A' }}</td>
                    <td>{{ $usuario->sala ? $usuario->sala : 'N/A' }}</td>
                    <td>
                        @if ($usuario->foto)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $usuario->foto)) }}" alt="Foto de {{ $usuario->nome }}" style="max-height: 50px;">
                        @else
                            <span>Sem Foto</span>
                        @endif
                    </td>
                    <td>{{ $usuario->periodo ? ucfirst($usuario->periodo) : 'N/A' }}</td>
                    <td>{{ $usuario->escola ? $usuario->escola->nome : 'Sem Escola' }}</td>
                    <td>
                        <a href="{{ route('usuarios.show', $usuario) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">Nenhum usuário encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
