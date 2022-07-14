<?php

namespace App\Http\Controllers;

use App\Models\ClientsModel;
use App\Models\DependentesModel;
use App\Models\PlanosModel;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Route;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $this->data['clients'] = ClientsModel::orderBy('id')->with('dependentes')->get();
    $this->data['planos'] = PlanosModel::get();

    return view('home', $this->data);
  }

  public function read($id)
  {
    if ($id) {
      $this->data['client'] = ClientsModel::where('id', $id)->with('dependentes')->first()->toArray();
    }

    $this->data['parentescos'] = ParentModel::get()->toArray();
    $this->data['planos'] = PlanosModel::get()->toArray();
    /* dd($this->data); */
    return view('details', $this->data);
  }

  public function createNew()
  {
    $this->data['planos'] = PlanosModel::get()->toArray();

    return view('create', $this->data);
  }
  public function createInsert(Request $request)
  {
    /* dd($request->all()); */
    ClientsModel::create(
      [
        'nome' => $request->nome,
        'sexo' => $request->sexo,
        'email' => $request->email,
        'telefone' => $request->telefone,
        'data_nascimento' => $request->data_nascimento,
        'local_nascimento' => $request->local_nascimento,
        'endereco' => $request->endereco,
        'empresa' => $request->empresa,
        'tipo_plano' => $request->plano,
      ]
    );
    return redirect('home');
  }
  public function edit($id)
  {
    $client = ClientsModel::where('id', $id)->with('dependentes')->first()->toArray();
    $this->data['planos'] = PlanosModel::get()->toArray();
    return view('edit', $client, $this->data);
  }

  public function createNewDependent($id) /* Recebendo o ID da tela EDIT */
  {
    $this->data['id'] = $id;
    $this->data['parentescos'] = ParentModel::get()->toArray();
    /* dd($this->data); */
    return view('createDependent', $this->data); /* Passando id pra view de Criar o dependente, para poder usar no createInsertDependent */
  }

  public function createInsertDependent(Request $request)
  {
    /* dd($request->id); */
    DependentesModel::create([
      'nome' => $request->nomeDependente,
      'titular' => $request->id,
      'parentesco' => $request->parentesco + 1,
    ]);

    return redirect()->route('read', [$request->id]);
  }

  public function deleteClient($id)
  {
    ClientsModel::findOrFail($id)->delete();
    return redirect('home');
  }
  public function deleteDependent($id )
  {

    dd($id);
    DependentesModel::findOrFail($id)->delete();
    /* return redirect('details'); */
  }

  public function update(Request $request)
  {
    $id = $request->segment(2);
    $request->request->remove('_token');
    $request->request->remove('_method');
    ClientsModel::where("id", $id)->update($request->all());


    return redirect('home');
  }
}


/*

*/