@extends('layouts.app')
@section('title', 'Detalhes do Usuário')

@section('content')
<div class="container">
    <h1>Detalhes do Usuário</h1>
    <div class="card">
        <div class="card-header">
            <h4>{{ $usuario->nome }}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nome:</strong> {{ $usuario->nome }}</p>
                    <p><strong>Email:</strong> {{ $usuario->email }}</p>
                    <p><strong>Telefone:</strong> {{ $usuario->telefone }}</p>
                    <p><strong>Tipo:</strong> {{ ucfirst($usuario->tipo) }}</p>
                    <p><strong>Classe:</strong> {{ $usuario->classe }}</p>
                    <p><strong>Turma:</strong> {{ $usuario->turma }}</p>
                    <p><strong>Sala:</strong> {{ $usuario->sala }}</p>
                    <p><strong>Período:</strong> {{ ucfirst($usuario->periodo) }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Foto:</strong></p>
                    @if ($usuario->foto)
                        <img src="{{ asset('storage/' . str_replace('public/', '', $usuario->foto)) }}" alt="Foto do Usuário" style="max-width: 200px;">
                    @else
                        <span>Sem Foto</span>
                    @endif
                    <p><strong>Escola:</strong> {{ $usuario->escola->nome }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
                @if ($usuario->tipo != 'administradorSistema')
                    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning">Editar</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
