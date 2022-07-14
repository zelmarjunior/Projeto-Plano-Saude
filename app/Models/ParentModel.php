<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ParentModel extends Model
{


  protected $table = 'parentescos';

  protected $fillable = [
    'descricao'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  function dependents()
  {
    return $this->hasOne(DependentesModel::class, 'titular', 'id');
  }

  function clients()
  {
    return $this->hasOne(ClientsModel::class, 'id');
  }
}
