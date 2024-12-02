@extends('layouts.app')

@section('title', 'Criar Usuário')

@section('content')
<div class="container">
    <h1>Criar Novo Usuário</h1>
    
    <!-- Exibindo mensagens de erro -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Nome -->
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>
            
            <!-- Email -->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Telefone -->
            <div class="col-md-6 mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" value="{{ old('telefone') }}" required>
            </div>
            
            <!-- Senha -->
            <div class="col-md-6 mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <!-- Tipo -->
            <div class="col-md-6 mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select id="tipo" name="tipo" class="form-select" required>
                    <option value="estudante" {{ old('tipo') == 'estudante' ? 'selected' : '' }}>Estudante</option>
                    <option value="administradorInterno" {{ old('tipo') == 'administradorInterno' ? 'selected' : '' }}>Administrador Interno</option>
                </select>
            </div>

            <!-- Classe -->
            <div class="col-md-6 mb-3">
                <label for="classe" class="form-label">Classe</label>
                <select id="classe" name="classe" class="form-select">
                    <option value="">Selecione</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('classe') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Turma -->
            <div class="col-md-6 mb-3">
                <label for="turma" class="form-label">Turma</label>
                <input type="text" id="turma" name="turma" class="form-control" value="{{ old('turma') }}">
            </div>

            <!-- Sala -->
            <div class="col-md-6 mb-3">
                <label for="sala" class="form-label">Sala</label>
                <input type="text" id="sala" name="sala" class="form-control" value="{{ old('sala') }}">
            </div>
        </div>

        <div class="row">
            <!-- Período -->
            <div class="col-md-6 mb-3">
                <label for="periodo" class="form-label">Período</label>
                <select id="periodo" name="periodo" class="form-select">
                    <option value="">Selecione</option>
                    <option value="manhã" {{ old('periodo') == 'manhã' ? 'selected' : '' }}>Manhã</option>
                    <option value="tarde" {{ old('periodo') == 'tarde' ? 'selected' : '' }}>Tarde</option>
                    <option value="noite" {{ old('periodo') == 'noite' ? 'selected' : '' }}>Noite</option>
                </select>
            </div>

            <!-- Escola -->
            <div class="col-md-6 mb-3">
                <label for="escola_id" class="form-label">Escola</label>
                <select id="escola_id" name="escola_id" class="form-select" required>
                    <option value="">Selecione uma Escola</option>
                    @foreach ($escolas as $escola)
                        <option value="{{ $escola->id }}" {{ old('escola_id') == $escola->id ? 'selected' : '' }}>{{ $escola->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Foto -->
            <div class="col-md-6 mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control">
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
