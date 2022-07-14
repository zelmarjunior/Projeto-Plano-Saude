@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('home') }}">
            <button>Voltar</button>
        </a>
        <div class="form-client">

            <h1>Edita Cliente</h1>

            <form action="{{ route('update', $id) }}" method="post">
              @csrf
              @method('PUT')
              {{-- <input type="text" id="id" name="id" value="{{$id}}" hidden> --}}
                <div class="row">
                    <label class="col-md-2" for="inputNome">Nome</label>
                    <div class="col-md-10 form-group">
                        <input align="center" type="text" class="form-control" name="nome" id="inputNome"
                            value="{{ $nome }}" required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2" for="inputSexo">Sexo</label>
                    <div class="col-md-10 form-group">
                        <select class="col-md-10 form-group" name="sexo" id="inputSexo" required>
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
                <div class="row">
                    <label class="col-md-2" for="inputEmail">Email</label>
                    <div class="col-md-10 form-group">
                        <input type="text" class="form-control" name="email" id="inputEmail"
                            value="{{ $email }}" required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2" for="inputCpf">Telefone</label>
                    <div class="col-md-10 form-group">
                        <input type="text" class="form-control" name="telefone" id="inputTelefone"
                            value="{{ $telefone }} " required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2" for="inputDate">Data Nascimento</label>
                    <div class="col-md-10 form-group">
                        <input type="date" class="form-control" name="data_nascimento" id="inputData_nascimento"
                            value="{{ $data_nascimento }}" required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2" for="inputDate">Local Nascimento</label>
                    <div class="col-md-10 form-group">
                        <input type="text" class="form-control" name="local_nascimento" id="inputLocal_nascimento"
                            value="{{ $local_nascimento }}" required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2" for="inputEndereco">Endereço</label>
                    <div class="col-md-10 form-group">
                        <input type="text" class="form-control" name="endereco" id="inputEndereco"
                            value="{{ $endereco }}" required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2" for="inputEndereco">Empresa</label>
                    <div class="col-md-10 form-group">
                        <input type="text" class="form-control" name="empresa" id="inputEmpresa"
                            value="{{ $empresa }}" required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2" for="inputPlano">Plano</label>
                    <div class="col-md-10 form-group">
                        <select class="form-control" name="tipo_plano" required>
                            @foreach ($planos as $plano)
                                @if ($plano['id'] === $tipo_plano)
                                    <option value="{{ $plano['id'] }}" selected>
                                        {{ $plano['id'] . ' - ' . $plano['tipo_plano'] }}
                                    </option>
                                @endif
                                <option value="{{ $plano['id'] }}">{{ $plano['id'] . ' - ' . $plano['tipo_plano'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
@endsection
