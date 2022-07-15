@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-client"><a href="{{ route('home') }}">
                <-- Voltar </a>
                    <h1>Cadastrar novo Cliente</h1>
                    <form action="{{ route('createInsert') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <label class="col-md-2" for="inputNome">Nome</label>
                            <div class="col-md-10 form-group">
                                <input align="center" type="text" class="form-control" name="nome" id="inputNome"
                                    required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-2" for="inputSexo">Sexo</label>
                            <div class="col-md-10 form-group">
                                <select name="sexo" id="inputSexo">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputEmail">Email</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="email" id="inputEmail" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputCpf">Telefone</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="telefone" id="inputTelefone" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputDate">Data Nascimento</label>
                            <div class="col-md-10 form-group">
                                <input type="date" class="form-control" name="data_nascimento" id="inputData_nascimento"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputDate">Local Nascimento</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="local_nascimento"
                                    id="inputLocal_nascimento" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputEndereco">Endereço</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="endereco" id="inputEndereco" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputEndereco">Empresa</label>
                            <div class="col-md-10 form-group">
                                <input type="text" class="form-control" name="empresa" id="inputEmpresa" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" for="inputPlano">Plano</label>
                            <div class="col-md-10 form-group">
                                <select class="form-control" name="plano" required>
                                    @foreach ($planos as $plano)
                                        <option value="{{ $plano['id'] }}">
                                            {{ $plano['id'] . ' - ' . $plano['tipo_plano'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <button class="btn btn-info" type="submit">Cadastrar Cliente</button>

                    </form>

        </div>

    </div>
@endsection
