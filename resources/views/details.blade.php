@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('home') }}">
            <- Voltar </a>
                <div class="form-client">
                    <h1>Cliente</h1>
                    <hr>
                    <form action="" method="post">
                        <div class="row">
                            <label class="col-md-2" for="inputNome">Nome</label>
                            <div class="col-md-10 form-group">
                                <input align="center" type="text" class="form-control" name="nome" id="inputNome"
                                    value="{{ $client['nome'] }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-2" for="inputSexo">Sexo</label>
                            <div class="col-md-10 form-group">
                                {{-- <input type="text" value="{{ $sexo }}"> --}}
                                <select name="sexo" id="inputSexo" disabled>
                                    @if ($client['sexo'] === 'Masculino')
                                        <option value="Masculino" selected>Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                    @elseif ($client['sexo'] === 'Feminino')
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino" selected>Feminino</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputEmail">Email</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="email" id="inputEmail"
                                    value="{{ $client['email'] }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputCpf">Telefone</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="telefone" id="inputTelefone"
                                    value="{{ $client['telefone'] }} " disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputDate">Data Nascimento</label>
                            <div class="col-md-10 form-group">
                                <input type="date" class="form-control" name="data_nascimento" id="inputData_nascimento"
                                    value="{{ $client['data_nascimento'] }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputDate">Local Nascimento</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="local_nascimento"
                                    id="inputLocal_nascimento" value="{{ $client['local_nascimento'] }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputEndereco">Endereço</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="endereco" id="inputEndereco"
                                    value="{{ $client['endereco'] }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputEndereco">Empresa</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="empresa" id="inputEmpresa"
                                    value="{{ $client['empresa'] }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputPlano">Plano</label>
                            <div class="col-md-10 form-group">
                                <select class="form-control" name="plano" disabled>
                                    @foreach ($planos as $plano)
                                        @if ($plano['id'] === $client['tipo_plano'])
                                            <option value="{{ $plano['id'] }}" selected>
                                                {{ $plano['id'] . ' - ' . $plano['tipo_plano'] }}
                                            </option>
                                        @endif
                                        <option value="{{ $plano['id'] }}">
                                            {{ $plano['id'] . ' - ' . $plano['tipo_plano'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('edit', $client['id']) }}">
                        <button>Editar Cliente</button>
                    </a>
                </div>
                <br><br>
                <div class="form-dependent">
                    <h1>Dependentes</h1>
                    <table class="table">
                        <th>Nome</th>
                        <th>Parentesco</th>
                        <th>Action</th>

                        <tbody>
                            @foreach ($client['dependentes'] as $dependente)
                                <tr>
                                    <td>{{ $dependente['nome'] }}</td>
                                    <td>{{ $parentescos[$dependente['parentesco']]['descricao'] }}</td>
                                    <td><a href="{{ route('deleteDependent') }}"><i
                                                class="bi bi-trash3-fill"></i></a>{{$client['id']}}</td>
                                </tr>{{-- /* $dependente['id']  */ --}}
                            @endforeach
                        </tbody>
                    </table>
                    <input type="text" name="" id="" value="{{$client['id']}}">
                    <a href="{{ route('createNewDependent', $client['id']) }}">
                        <button>Novo Dependente</button>
                    </a>

                </div>

    </div>
@endsection
