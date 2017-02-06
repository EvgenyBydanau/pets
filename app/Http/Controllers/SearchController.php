<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Pet;

class SearchController extends Controller
{
    public function index()
    {
        return view('pages.searchform');
    }



    
}
