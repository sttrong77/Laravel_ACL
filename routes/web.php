<?php



Route::get('/addgalerias', function () {

  for($i=1; $i<4;$i++){
    App\Galeria::create([
      'titulo'=> '',
      'carro_id'=> 1,
      'descricao'=> '',
      'url'=> 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'ordem'=> $i
    ]);
    App\Galeria::create([
      'titulo'=> '',
      'carro_id'=> 2,
      'descricao'=> '',
      'url'=> 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'ordem'=> $i
    ]);
  }

  return "Registros criados";


});

Route::get('/addregistros', function(){
  $zero = App\Categoria::create(['titulo'=>'Zero KM']);
  $semi = App\Categoria::create(['titulo'=>'Seminovos']);
  $usado = App\Categoria::create(['titulo'=>'Usados']);

  $Honda = App\Marca::create(['titulo'=>'Honda','descricao'=>'Carros Honda']);
  $Chevrolet = App\Marca::create(['titulo'=>'Chevrolet','descricao'=>'Carros Chevrolet']);

  $Camaro = $Chevrolet->carros()->create(['titulo'=>'Camaro','descricao'=>'Automático e completo', 'ano'=>2017, 'valor'=>150000.50]);

  $Camaro->categorias()->attach($usado);
  $Camaro->categorias()->attach($semi);

  return "Registros criados";

});

Route::get('/testesregistros', function(){
  $carro = App\Carro::find(1);
//  $categoria = App\Categoria::find(1);
  dd($carro->imagens);

});


Route::get('/', function () {
  $slides = [
    (object)[
      'titulo'=>'Título Imagem',
      'descricao'=>'Descrição Imagem',
      'url'=>'#link',
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'

    ]
  ];

  $carros = [
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ]
  ];
    return view('site.home',compact('slides','carros'));
});

Auth::routes();

Route::get('/contato', function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
    return view('site.contato', compact('galeria'));
});

Route::get('/detalhe', function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
    return view('site.detalhe', compact('galeria'));
});


Route::get('/empresa', function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
    return view('site.empresa',compact('galeria'));
});


Route::group(['middleware'=>'auth', 'prefix'=>'admin'], function(){

  Route::get('/', 'Admin\AdminController@index');

  Route::resource('usuarios', 'Admin\UsuarioController');

  Route::get('usuarios/papel/{id}', ['as'=>'usuarios.papel','uses'=>'Admin\UsuarioController@papel']);
  Route::post('usuarios/papel/{papel}', ['as'=>'usuarios.papel.store','uses'=>'Admin\UsuarioController@papelStore']);
  Route::delete('usuarios/papel/{usuario}/{papel}', ['as'=>'usuarios.papel.destroy','uses'=>'Admin\UsuarioController@papelDestroy']);

   Route::resource('papeis', 'Admin\PapelController');

   Route::get('papeis/permissao/{id}', ['as'=>'papeis.permissao','uses'=>'Admin\PapelController@permissao']);
   Route::post('papeis/permissao/{permissao}', ['as'=>'papeis.permissao.store','uses'=>'Admin\PapelController@permissaoStore']);
   Route::delete('papeis/permissao/{papel}/{permissao}', ['as'=>'papeis.permissao.destroy','uses'=>'Admin\PapelController@permissaoDestroy']);

});
