@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cadastrar novo Cliente</h2>
        <hr>
        <a href="{{ route('home') }}">
            <-- Voltar </a>
                <br>
                <div class="form-client">
                    <form class="" action="{{ route('createNewClientInsertData') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm">
                                <label class="" for="inputNome">Nome</label>
                                <div class="form-group">
                                    <input align="center" type="text" class="form-control" name="nome" id="inputNome"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm">
                                <label class="" for="inputEmail">Email</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="inputEmail" required>
                                </div>
                            </div>
                            <div class="col-sm">
                                <label class="" for="inputCpf">Telefone</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="telefone" id="inputTelefone"
                                        placeholder="(xx) x xxxx-xxxx" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <label class="" for="inputEndereco">Empresa</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="empresa" id="inputEmpresa" required>
                                </div>
                            </div>

                            <div class="col-sm">
                                <label class="" for="inputEndereco">Endereço</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="endereco" id="inputEndereco" required>
                                </div>
                            </div>
                            <div class="col-sm">
                                <label class="" for="inputDate">Local Nascimento</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="local_nascimento"
                                        id="inputLocal_nascimento" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <label class="" for="inputDate">Data Nascimento</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="data_nascimento"
                                        id="inputData_nascimento" required>
                                </div>
                            </div>
                            <div class="col-sm">
                                <label class="" for="inputSexo">Sexo</label>
                                <div class="">
                                    <select class="form-group form-control" name="sexo" id="inputSexo">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <label class="" for="inputPlano">Plano</label>
                                <div class="form-group">
                                    <select class="form-control" name="plano" required>
                                        @foreach ($planos as $plano)
                                            <option value="{{ $plano['id'] }}">
                                                {{ $plano['id'] . ' - ' . $plano['tipo_plano'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-info" type="submit">Cadastrar Cliente</button>

                    </form>

                </div>

    </div>
@endsection
