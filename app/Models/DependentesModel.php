<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class DependentesModel extends Model
{


    protected $table = 'dependentes';

    protected $fillable = [
        'nome', 'titular', 'parentesco',
    ];





}
