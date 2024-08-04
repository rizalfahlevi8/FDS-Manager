<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
    public function index(){
        $kasirs = User::with('kasir')->where('level',"kasir")->where('id_toko', auth()->user()->id_toko)->get();
        return view('pages.manajemen.kasir.index', compact('kasirs'));
    }

    public function create(){
        return view('pages.manajemen.kasir.create');
    }

    public function store(Request $request){
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make("kasir123"), 
            'level' => "kasir",
            'id_toko' => auth()->user()->id_toko,
        ]);

        Kasir::create([
            'nama' => $request->nama_kasir,
            'no_telp' => $request->no_telp,
            'id_user' => $user->id,
        ]);
        return redirect()->route('manajemen-kasir-index');
    }

    public function edit($id){
        $kasir = User::with('kasir')->where('id', $id)->first();
        return view('pages.manajemen.kasir.edit', compact('kasir'));
    }

    public function update(Request $request, $id){
        $kasir = User::with('kasir')->where('id', $id)->first();
        
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $kasir->id,
        ], [
            'email.unique' => 'Email sudah digunakan.',
        ]);
    
        $kasir->email = $request->email;
        $kasir->save();
    
        $kasir->kasir->nama = $request->input('nama_kasir');
        $kasir->kasir->no_telp = $request->input('no_telp');
        $kasir->kasir->save();
    
        if ($request->has('reset_password')) {
            $kasir->password = Hash::make('owner123');
            $kasir->save();
        }
    
        return redirect()->route('manajemen-kasir-index');
    }

    public function delete(User $id)
    {
        $id->delete();
        return redirect()->route('manajemen-kasir-index');
    }
 
}
