@extends('layouts.app')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <h1 class="text-center">Planos de Saúde</h1>
        <a href="{{ route('createNew') }}">
            <button type="button" class="btn btn-outline-success"><i class="bi bi-clipboard2-plus-fill"></i> Novo
                Cliente</button>
        </a>
        <div class="col-8 m-auto">

            <br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Plano</th>
                        <th scope="col">Dependentes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $cliente)
                        <tr>
                            <th scope="row">{{ $cliente->id }}</th>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->tipo_plano }} - {{ $planos[$cliente->tipo_plano - 1]->tipo_plano }} </td>
                            <td>
                                @foreach ($cliente->dependentes as $dependente)
                                    <span>| {{ $dependente->nome }} |</span>
                                @endforeach
                            </td>
                            <td>

                                <a class="action-icon" href="{{ route('read', ['id' => $cliente->id]) }}">
                                  <button class="btn btn-info btn-sm">Detalhes</button>
                                </a>
                                <a href="{{ route('deleteClient', $cliente->id) }}">
                                  <i class="bi bi-trash3-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
