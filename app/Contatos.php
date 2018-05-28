<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    protected $fillable = ['usuario','image', 'nome', 'email', 'telefone', 'nascimento'];
}
