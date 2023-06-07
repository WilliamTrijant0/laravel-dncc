<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::all();
        // dd($profil);
        
        // return view('profil', [
        //     'profil' => $profil
        // ]);

        return view('profil', compact('profil'));
    }
}
