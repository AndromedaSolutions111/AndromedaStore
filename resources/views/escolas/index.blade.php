@extends('layouts.app')
@section('title', 'Listar Escolas')
@section('content')
<div class="container">
    <h1>Lista de Escolas</h1>
    <a href="{{ route('escolas.create') }}" class="btn btn-primary mb-3">Adicionar Escola</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($escolas as $escola)
                <tr>
                    <td>{{ $escola->nome }}</td>
                    <td>{{ $escola->sigla }}</td>
                    <td>{{ $escola->endereco }}</td>
                    <td>{{ $escola->telefone }}</td>
                    <td>{{ $escola->email }}</td>
                    <td>
                        @if($escola->foto)
                        @if (filter_var($escola->foto, FILTER_VALIDATE_URL))
                            <!-- Exibe a foto se for uma URL -->
                            <img src="{{ $escola->foto }}" alt="Foto da Escola" style="max-height: 50px;">
                        @else
                            <!-- Exibe a foto do armazenamento -->
                            <img src="{{ asset('storage/' . str_replace('public/', '', $escola->foto)) }}" alt="Foto da Escola" style="max-height: 50px;">
                        @endif
                        @else
                            <span>Sem Foto</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('escolas.show', $escola) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('escolas.edit', $escola) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('escolas.destroy', $escola) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
