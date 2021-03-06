<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'HomeController@index');

Route::auth();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');
    Route::get('/areas/{id}', 'AreaController@getAreas');

    //rotas de users
    Route::group(['prefix' => 'users', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'users.index', 'uses' => 'UserController@index', 'middleware' => ['permission:gestao_usuario-list|gestao_usuario-create|gestao_usuario-edit|gestao_usuario-delete']]);
        Route::get('/create', ['as' => 'users.create', 'uses' => 'UserController@create', 'middleware' => ['permission:gestao_usuario-create']]);
        Route::post('/create', ['as' => 'users.store', 'uses' => 'UserController@store', 'middleware' => ['permission:gestao_usuario-create']]);
        Route::get('/{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
        Route::get('/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit', 'middleware' => ['permission:gestao_usuario-edit']]);
        Route::patch('/{id}', ['as' => 'users.update', 'uses' => 'UserController@update', 'middleware' => ['permission:gestao_usuario-edit']]);
        Route::delete('/{id}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy', 'middleware' => ['permission:gestao_usuario-delete']]);
    });

    //rotas de roles
    Route::group(['prefix' => 'roles', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
        Route::get('/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
        Route::post('/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
        Route::get('/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
        Route::get('/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
        Route::patch('/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
        Route::delete('/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);
    });

    //rotas para relatório
    Route::get('/relatorioUsuario', ['as' => 'relatorio.usuario', 'uses' => 'RelatorioController@relatorioUsuario', 'middleware' => ['permission:relatorioUsuario']]);

    //rotas de especialidade
    Route::group(['prefix' => 'especialidade', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'especialidade.index', 'uses' => 'EspecialidadeController@index', 'middleware' => ['permission:especialidade-list|especialidade-create|especialidade-edit|especialidade-delete']]);
        Route::get('/create', ['as' => 'especialidade.create', 'uses' => 'EspecialidadeController@create', 'middleware' => ['permission:especialidade-create']]);
        Route::post('/create', ['as' => 'especialidade.store', 'uses' => 'EspecialidadeController@store', 'middleware' => ['permission:especialidade-create']]);
        Route::get('/{id}', ['as' => 'especialidade.show', 'uses' => 'EspecialidadeController@show']);
        Route::get('/{id}/edit', ['as' => 'especialidade.edit', 'uses' => 'EspecialidadeController@edit', 'middleware' => ['permission:especialidade-edit']]);
        Route::patch('/{id}', ['as' => 'especialidade.update', 'uses' => 'EspecialidadeController@update', 'middleware' => ['permission:especialidade-edit']]);
        Route::delete('/{id}', ['as' => 'especialidade.destroy', 'uses' => 'EspecialidadeController@destroy', 'middleware' => ['permission:especialidade-delete']]);
    });
    
    //rotas de clínica
    Route::group(['prefix' => 'clinica', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'clinica.index', 'uses' => 'ClinicaController@index', 'middleware' => ['permission:clinica-list|clinica-create|clinica-edit|clinica-delete']]);
        Route::get('/create', ['as' => 'clinica.create', 'uses' => 'ClinicaController@create', 'middleware' => ['permission:clinica-create']]);
        Route::post('/create', ['as' => 'clinica.store', 'uses' => 'ClinicaController@store', 'middleware' => ['permission:clinica-create']]);
        Route::get('/{id}', ['as' => 'clinica.show', 'uses' => 'ClinicaController@show']);
        Route::get('/{id}/edit', ['as' => 'clinica.edit', 'uses' => 'ClinicaController@edit', 'middleware' => ['permission:clinica-edit']]);
        Route::patch('/{id}', ['as' => 'clinica.update', 'uses' => 'ClinicaController@update', 'middleware' => ['permission:clinica-edit']]);
        Route::delete('/{id}', ['as' => 'clinica.destroy', 'uses' => 'ClinicaController@destroy', 'middleware' => ['permission:clinica-delete']]);
    });
    
    //rotas de médico
    Route::group(['prefix' => 'medico', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'medico.index', 'uses' => 'MedicoController@index', 'middleware' => ['permission:gestao_medico-list|gestao_medico-create|gestao_medico-edit|gestao_medico-delete']]);
        Route::get('/create', ['as' => 'medico.create', 'uses' => 'MedicoController@create', 'middleware' => ['permission:gestao_medico-create']]);
        Route::post('/create', ['as' => 'medico.store', 'uses' => 'MedicoController@store', 'middleware' => ['permission:gestao_medico-create']]);
        Route::get('/{id}', ['as' => 'medico.show', 'uses' => 'MedicoController@show']);
        Route::get('/{id}/edit', ['as' => 'medico.edit', 'uses' => 'MedicoController@edit', 'middleware' => ['permission:gestao_medico-edit']]);
        Route::patch('/{id}', ['as' => 'medico.update', 'uses' => 'MedicoController@update', 'middleware' => ['permission:gestao_medico-edit']]);
        Route::delete('/{id}', ['as' => 'medico.destroy', 'uses' => 'MedicoController@destroy', 'middleware' => ['permission:gestao_medico-delete']]);
    });
    
    //rotas de leito
    Route::group(['prefix' => 'leito', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'leito.index', 'uses' => 'LeitoController@index', 'middleware' => ['permission:leito-list|leito-create|leito-edit|leito-delete']]);
        Route::get('/create', ['as' => 'leito.create', 'uses' => 'LeitoController@create', 'middleware' => ['permission:leito-create']]);
        Route::post('/create', ['as' => 'leito.store', 'uses' => 'LeitoController@store', 'middleware' => ['permission:leito-create']]);
        Route::get('/{id}', ['as' => 'leito.show', 'uses' => 'LeitoController@show']);
        Route::get('/{id}/edit', ['as' => 'leito.edit', 'uses' => 'LeitoController@edit', 'middleware' => ['permission:leito-edit']]);
        Route::patch('/{id}', ['as' => 'leito.update', 'uses' => 'LeitoController@update', 'middleware' => ['permission:leito-edit']]);
        Route::delete('/{id}', ['as' => 'leito.destroy', 'uses' => 'LeitoController@destroy', 'middleware' => ['permission:leito-delete']]);
    });

    //rotas de dentista
    Route::group(['prefix' => 'dentista', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'dentista.index', 'uses' => 'DentistaController@index', 'middleware' => ['permission:gestao_dentista-list|gestao_dentista-create|gestao_dentista-edit|gestao_dentista-delete']]);
        Route::get('/create', ['as' => 'dentista.create', 'uses' => 'DentistaController@create', 'middleware' => ['permission:gestao_dentista-create']]);
        Route::post('/create', ['as' => 'dentista.store', 'uses' => 'DentistaController@store', 'middleware' => ['permission:gestao_dentista-create']]);
        Route::get('/{id}', ['as' => 'dentista.show', 'uses' => 'DentistaController@show']);
        Route::get('/{id}/edit', ['as' => 'dentista.edit', 'uses' => 'DentistaController@edit', 'middleware' => ['permission:gestao_dentista-edit']]);
        Route::patch('/{id}', ['as' => 'dentista.update', 'uses' => 'DentistaController@update', 'middleware' => ['permission:gestao_dentista-edit']]);
        Route::delete('/{id}', ['as' => 'dentista.destroy', 'uses' => 'DentistaController@destroy', 'middleware' => ['permission:gestao_dentista-delete']]);
    });
    
     //rotas de cid10
    Route::group(['prefix' => 'cid10', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'cid10.index', 'uses' => 'Cid10Controller@index', 'middleware' => ['permission:cid-list|cid-create|cid-edit|cid-delete']]);
        Route::get('/create', ['as' => 'cid10.create', 'uses' => 'Cid10Controller@create', 'middleware' => ['permission:cid-create']]);
        Route::post('/create', ['as' => 'cid10.store', 'uses' => 'Cid10Controller@store', 'middleware' => ['permission:cid-create']]);
        Route::get('/{id}', ['as' => 'cid10.show', 'uses' => 'Cid10Controller@show']);
        Route::get('/{id}/edit', ['as' => 'cid10.edit', 'uses' => 'Cid10Controller@edit', 'middleware' => ['permission:cid-edit']]);
        Route::patch('/{id}', ['as' => 'cid10.update', 'uses' => 'Cid10Controller@update', 'middleware' => ['permission:cid-edit']]);
        Route::delete('/{id}', ['as' => 'cid10.destroy', 'uses' => 'Cid10Controller@destroy', 'middleware' => ['permission:cid-delete']]);
    });
    
    
   

});

