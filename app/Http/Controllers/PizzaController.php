<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
   public function index(){

    $pizzas = Pizza::all();
    // $pizzas = Pizza::orderBy('name')->get();
    // $pizzas = Pizza::where('type','hawaiian')->get();

    return view('pizzas.index',[
        'pizzas' => $pizzas,
    ]); 
   }

   public function show($id){

    $pizza = Pizza::findOrFail($id);

    return view('pizzas.show',[ 'pizza' => $pizza]);
   }


   public function create(){
       return view('pizzas.create');
   }
   public function store(){

    $pizza = new Pizza();
    // dd(request());
    $pizza->name = request('name');
    $pizza->type = request('type');
    $pizza->base = request('base');
    $pizza->toppings = request('toppings');

    $pizza->save(); 

    return redirect('/')->with('msg','Thanks for your order');
}

    public function destroy($id){
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');

    }
}

