<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{

  protected $fillable = [
      'titulo', 'descricao', 'ano', 'valor'
  ];

  public function marca(){
      return $this->belongsTo('App\Marca');//retorna marco associado ao carro.
  }

  public function categorias(){
      return $this->belongsToMany('App\Categoria');//retorna categorias associado ao carro.
  }

  public function usuarios(){
      return $this->belongsToMany('App\User');//retorna usuários associado ao carro.
  }

  public function imagens(){
      return $this->hasMany('App\Galeria');//retorna usuários associado ao carro.
  }


}
