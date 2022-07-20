@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-client">
            <a href="{{ route('readAllDataClients', $id) }}">
                <-- Voltar</a>
                    <br>
                    <h1>Cadastrar Dependente</h1>
                    <form action="{{ route('createNewClientInsertDataDependent') }}" method="post">
                        {{ csrf_field() }}
                        <input type="text" id="id" name="id" value="{{ $id }}" hidden>

                        <div class="row">
                            <label class="col-md-2" for="inputNome">Nome Dependente</label>
                            <div class="col-md-10 form-group">
                                <input align="center" type="text" class="form-control" name="nomeDependente"
                                    id="nomeDependente" required>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-md-2" for="inputEmail">Parentesco</label>
                            <div class="col-md-10 form-group">
                                <select class="form-control" id="parentesco" name="parentesco" required>
                                    @foreach ($parentescos as $parentesco)
                                        <option value="{{ $parentesco['id'] - 1 }}">
                                            {{ $parentesco['id'] . ' - ' . $parentesco['descricao'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-info" type="submit">Cadastrar Dependente</button>
                    </form>
        </div>

    </div>
@endsection
