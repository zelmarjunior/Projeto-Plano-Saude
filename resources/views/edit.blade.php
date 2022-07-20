@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('home') }}">
            <button class="btn btn-info btn-sm">Voltar</button>
        </a>
        <div class="form-client">

            <h1>Editar Cliente</h1>
            <hr>
            <br>

            <form action="{{ route('update', $id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm">
                        <label class="" for="inputNome">Nome</label>
                        <div class="form-group">
                            <input align="center" type="text" class="form-control" name="nome" id="inputNome"
                                value="{{ $nome }}" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="" for="inputEmail">Email</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="inputEmail"
                                value="{{ $email }}" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="" for="inputCpf">Telefone</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="telefone" id="inputTelefone"
                                value="{{ $telefone }} " required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label class="" for="inputEndereco">Empresa</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="empresa" id="inputEmpresa"
                                value="{{ $empresa }}" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="" for="inputEndereco">Endereço</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="endereco" id="inputEndereco"
                                value="{{ $endereco }}" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="" for="inputDate">Local Nascimento</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="local_nascimento" id="inputLocal_nascimento"
                                value="{{ $local_nascimento }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label class="" for="inputDate">Data Nascimento</label>
                        <div class="form-group">
                            <input type="date" class="form-control" name="data_nascimento" id="inputData_nascimento"
                                value="{{ $data_nascimento }}" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="" for="inputSexo">Sexo</label>
                        <div class="form-group">
                            <select class="form-group form-control" name="sexo" id="inputSexo" required>
                                @if ($sexo === 'Masculino')
                                    <option value="Masculino" selected>Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                @elseif ($sexo === 'Feminino')
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino" selected>Feminino</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="" for="inputPlano">Plano</label>
                        <div class="form-group">
                            <select class="form-control" name="tipo_plano" required>
                                @foreach ($planos as $plano)
                                    @if ($plano['id'] === $tipo_plano)
                                        <option value="{{ $plano['id'] }}" selected>
                                            {{ $plano['id'] . ' - ' . $plano['tipo_plano'] }}
                                        </option>
                                    @elseif($plano['id'] !== $tipo_plano)
                                        <option value="{{ $plano['id'] }}">
                                            {{ $plano['id'] . ' - ' . $plano['tipo_plano'] }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-info" type="submit">Salvar</button>
            </form>
        </div>
    </div>
@endsection
