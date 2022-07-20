<?php

namespace App\Http\Controllers;

use App\Models\ClientsModel;
use App\Models\DependentesModel;
use App\Models\PlanosModel;
use App\Models\ParentModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  var $totalPerPage = 6;

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
    $this->data['clients'] = ClientsModel::orderBy('nome')->with('dependentes')->paginate($this->totalPerPage);
    $this->data['planos'] = PlanosModel::get();
    return view('home', $this->data);
  }

  public function readAllDataClients($id)
  {
    $this->data['client'] = ClientsModel::where('id', $id)->with('dependentes')->first()->toArray();
    $this->data['parentescos'] = ParentModel::get()->toArray();
    $this->data['planos'] = PlanosModel::get()->toArray();
    return view('clientDetails', $this->data);
  }

  public function createNewClientLoadData()
  {
    $this->data['planos'] = PlanosModel::get()->toArray();
    return view('createClient', $this->data);
  }

  public function createNewClientInsertData(Request $request)
  {
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

  public function editClient($id)
  {
    $client = ClientsModel::where('id', $id)->with('dependentes')->first()->toArray();
    $this->data['planos'] = PlanosModel::get()->toArray();

    return view('editClient', $client, $this->data);
  }

  public function createNewClientLoadDataDependent($id)
  {
    $this->data['id'] = $id;
    $this->data['parentescos'] = ParentModel::get()->toArray();

    return view('createDependent', $this->data);
  }

  public function createNewClientInsertDataDependent(Request $request)
  {
    DependentesModel::create([
      'nome' => $request->nomeDependente,
      'titular' => $request->id,
      'parentesco' => $request->parentesco + 1,
    ]);

    return redirect()->route('readAllDataClients', [$request->id]);
  }

  public function deleteClient($id)
  {
    ClientsModel::findOrFail($id)->delete();
    return redirect('home');
  }

  public function deleteDependent($id)
  {
    DependentesModel::findOrFail($id)->delete();
    return back();
  }

  public function updateClient(Request $request)
  {
    $id = $request->segment(2);
    $request->request->remove('_token');
    $request->request->remove('_method');
    ClientsModel::where("id", $id)->update($request->all());

    return redirect('home');
  }
}
