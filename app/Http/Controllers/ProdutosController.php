<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function store(Request $request){
        $form = $request->validate([
            'photo' => 'image|required|mimes:jpg,png,jpeg',
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);
        
        $produto = (new Produto)->fill($form);
        $imagemCaminho = $form['photo']->store('', 'imagens');
        $produto->photo = $imagemCaminho;
        $produto->save();

        return redirect()->route("home");
    }
    public function show($id){
        return view('produtos-show')->with(['produto' => Produto::findOrFail($id)]);
    }

    public function index(){
        return view('home')->with(['produtos' => Produto::orderBy('name')->get()]);
    }
    public function admin(){
        return view('administrar')->with(['produtos' => Produto::orderBy('name')->get()]);
    }
    public function destroy($id){
        $produto = Produto::findOrFail($id)->delete();
        return redirect()->back();
    }
}
