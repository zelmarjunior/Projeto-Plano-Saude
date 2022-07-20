@extends('layouts.app')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <h2 class="title-home">Nossos Clientes</h2>

        <div class="col-8 m-auto">
            <a class="button-new-client" href="{{ route('createNew') }}">
                <button type="button" class="btn btn-outline-success">
                    <i class="bi bi-clipboard2-plus-fill"></i> Novo Cliente
                </button>
            </a>
            <br>
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Plano</th>
                        <th scope="col">Dependentes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->tipo_plano }} - {{ $planos[$cliente->tipo_plano - 1]->tipo_plano }} </td>
                            <td>
                                @foreach ($cliente->dependentes as $dependente)
                                    <span>| {{ $dependente->nome }} |</span>
                                @endforeach
                            </td>
                            <td>

                                <a class="action-icon" href="{{ route('read', ['id' => $cliente->id]) }}">
                                    <button class="btn btn-info btn-sm home-actions">Detalhes</button>
                                </a>
                                <a href="{{ route('deleteClient', $cliente->id) }}">
                                    <button class="btn btn-danger btn-sm home-actions">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
            {{ $clients->links() }}
        </div>
    </div>
@endsection
