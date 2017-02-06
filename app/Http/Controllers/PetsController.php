<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pet;
use App\User;
use Session;
use Input;
use Carbon\Carbon ;
use Auth;

class PetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show','dogs','cats']]);
    }


    public function index()
    {
        /**
     в обратном порядке, начиная с последней добавленной записи
         */

        $pets = Pet::orderBy('created_at', 'desc')->paginate(8);
        $pets->setPath('pets');

        return view('pets.index')->withPets($pets);
    }


    public function dogs()
    {
       // $dogs = Pet::orderBy('created_at', 'desc')->where('pet_type','dog')->get();
        $dogs = Pet::orderBy('created_at', 'desc')->where('pet_type','dog')->paginate(8);
        $dogs->setPath('dogs');


        return view('pets.dogs')->withDogs($dogs);

    }


    public function cats()
    {

        $cats = Pet::orderBy('created_at', 'desc')->where('pet_type','cat')->paginate(8);
        $cats->setPath('cats');


        return view('pets.cats')->withCats($cats);

    }



    public function create()
    {
        return view('pets.create');
    }


    public function store(Request $request)
    {

        $image = new Pet();

        $this->validate($request, [
            'title' => 'required',
            'pet_type' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'contact' => 'required',
            'image' => 'required'
            ]);


        $image->title = $request->title;
        $image->pet_type = $request->pet_type;
        $image->price = $request->price;
        $image->contact = $request->contact;
        $image->description = $request->description;


        /**
          email того кто создал pet
         */

          $user =  Auth::user();
          $userEmail = $user->email;
          $image->user =$userEmail;


        //	$input = $request->all();


        if($request->hasFile('image')) {

            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();

        Session::flash('flash_message', 'Pet successfully added!');

        return redirect()->back();

    }



    public function show($id)
    {
        $pet = Pet::findOrFail($id);


        return view('pets.show')->withPet($pet);
    }



    public function edit($id)
    {

        $pet = Pet::findOrFail($id);

        return view('pets.edit')->withPet($pet);


    }



    public function update($id, Request $request)
    {

        $pet = Pet::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'contact' => 'required'
        ]);




        $input = $request->all();



        if($request->hasFile('image')) {

            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $pet->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }



        $pet->fill($input)->save();

        Session::flash('flash_message', 'The pet successfully updated!');

        return redirect()->back();



    }


    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);

        $pet->delete();

        Session::flash('flash_message', 'Pet successfully deleted!');

        return redirect()->route('pets.index');
    }

}



