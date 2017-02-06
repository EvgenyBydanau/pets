<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Pet;
use Illuminate\Support\Facades\Input;


Auth::routes();

Route::get('/', 'PagesController@home');

Route::resource('pets', 'PetsController');



Route::get('/searchform', 'SearchController@index');

Route::get('/dogs','PetsController@dogs');
Route::get('/cats','PetsController@cats');






Route::any('/searchresult',function(){
    $q = Input::get ('q');
    $pet = Pet::where('title','LIKE','%'.$q.'%')->orWhere('contact','LIKE','%'.$q.'%')->get();
    $message = "По вашему запросу ничего не найдено";

    if(count($pet) > 0)
    {
        return view('pages.searchresult')->withPet($pet)->withQuery($q);
    }
    else
    {

        return view('pages.searchresult')->withPet($pet)->withQuery($q)->withMessage($message);
    }
});

