@extends('layouts.app')
@section('title', 'Mostrar Escola')
@section('content')
<div class="container">
    <h1>Detalhes da Escola</h1>

    <!-- Informações da Escola -->
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $escola->nome }} ({{ $escola->sigla }})</h5>
            <p><strong>Endereço:</strong> {{ $escola->endereco }}</p>
            <p><strong>Telefone:</strong> {{ $escola->telefone }}</p>
            <p><strong>E-mail:</strong> {{ $escola->email }}</p>
            @if ($escola->foto)
            <p><strong>Foto:</strong></p>
            @if (filter_var($escola->foto, FILTER_VALIDATE_URL))
                <img src="{{ $escola->foto }}" alt="Foto da escola" style="max-width: 150px;">
            @else
                <img src="{{ asset('storage/' . str_replace('public/', '', $escola->foto)) }}" alt="Foto da escola" style="max-width: 150px;">
            @endif
            @else
                <p>Esta escola não possui foto.</p>
            @endif
        </div>
    </div>

    <!-- Informações do Administrador Interno -->
    <h2>Administrador Interno da Escola</h2>
    <div class="card mb-3">
        <div class="card-body">
            @if ($escola->usuarios->where('tipo', 'administradorInterno')->count() > 0)
                @foreach ($escola->usuarios->where('tipo', 'administradorInterno') as $administradorInterno)
                    <p><strong>Nome:</strong> {{ $administradorInterno->nome }}</p>
                    <p><strong>E-mail:</strong> {{ $administradorInterno->email }}</p>
                    <p><strong>Telefone:</strong> {{ $administradorInterno->telefone }}</p>
                @endforeach
            @else
                <p>Esta escola ainda não possui um administrador interno atribuído.</p>
            @endif
        </div>
    </div>    
    

    <!-- Opções de Ação -->
    <a href="{{ route('escolas.edit', $escola) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('escolas.destroy', $escola) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
</div>
@endsection
