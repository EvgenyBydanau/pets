<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use skip;

class PagesController extends Controller
{

 /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/

    public function home()
    {

        /**
       Выводим в обратном порядке, начиная с последней добавленной записи
         */

        $pets = Pet::orderBy('created_at', 'desc')->take(8)->get();


        return view('pages.home')->withPets($pets);
    }



}
