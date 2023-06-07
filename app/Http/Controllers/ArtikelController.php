<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(){
        return view('artikel.index', [
            'artikels' => Artikel::get()
        ]);
    }

    public function create(){
        return view('artikel.form');
    }

    public function store(Request $request){
        $input = $request->only(['title', 'desc']);
        $create = Artikel::create($input);

        if($create){
            return redirect()->route('artikel.index');
        }

        return abort(500);
    }

    public function edit($id){
        // $artikel = Artikel::find($id);
        return view('artikel.form', [
            'artikel' => Artikel::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $inputs = $request->only(['title', 'desc']);
        $update = $artikel->update($inputs);

        if ($update) {
            return redirect()->route('artikel.index');
        }

        return abort(500);
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $delete = $artikel->delete();

        if ($delete) {
            return redirect()->route('artikel.index');
        }

        return abort(500);
    }
}
