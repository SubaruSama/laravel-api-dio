<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\BandController;

// Pior jeito
// URI: <host:port>/api/hello/{name}
Route::get('/hello/{name}', function(Request $request, string $name) {
    return "hello $name";
});

// Não executando mais uma função e sim chamando o controller
/**
 * No curso ensina a criar da forma antiga:
 *      Old: Route::post('hello-post', 'HelloWorldController@hello'); -> não funciona mais desta forma
 * 
 * Necessário utilizar conforme abaixo.
 * src: https://laravel.com/docs/11.x/controllers#basic-controllers
 */
Route::post('hello-post/{name}', [HelloWorldController::class, 'hello']);

// BandController
Route::get('bands/', [BandController::class, 'getBands']);
Route::get('bands/{id}', [BandController::class, 'getBandById']);
Route::get('bands/gender/{gender_name}', [BandController::class, 'getBandByGender']);
// TODO: adicionar subgenêro
// TODO: rota que retorna genêros que deram match parcial. exemplo: bands/gender/metal -> heavy-metal, death-metal, etc

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
