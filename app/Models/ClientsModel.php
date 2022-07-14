<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ClientsModel extends Model
{


  protected $table = 'clientes';

  protected $fillable = [
    'nome', 'sexo', 'email', 'telefone', 'data_nascimento', 'local_nascimento', 'endereco', 'empresa', 'tipo_plano',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  function dependentes()
  {
    return $this->hasMany(DependentesModel::class, 'titular', 'id');
  }
}
