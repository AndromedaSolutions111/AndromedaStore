@extends('layouts.app')
@section('title', 'Atualizar Escola')
@section('content')
<div class="container">
    <h1>Editar Escola</h1>

    {{-- Exibe mensagens de erro --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário para editar escola --}}
    <form action="{{ route('escolas.update', $escola) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Escola</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $escola->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla</label>
            <input type="text" name="sigla" id="sigla" class="form-control" value="{{ old('sigla', $escola->sigla) }}" required>
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="{{ old('endereco', $escola->endereco) }}">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $escola->telefone) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $escola->email) }}">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            @if ($escola->foto)
                <div class="mb-2">
                    @if (filter_var($escola->foto, FILTER_VALIDATE_URL))
                        <img src="{{ $escola->foto }}" alt="Foto da Escola" class="img-thumbnail" style="max-height: 150px;">
                    @else
                        <img src="{{ asset('storage/' . str_replace('public/', '', $escola->foto)) }}" alt="Foto da Escola" class="img-thumbnail" style="max-height: 150px;">
                    @endif
                </div>
            @endif
            <input type="file" name="foto" id="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('escolas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
