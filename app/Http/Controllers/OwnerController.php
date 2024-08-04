<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function index(){
        $owners = User::with('tokos', 'owner')->where('level',"owner")->get();
        return view('pages.manajemen.owner.index', compact('owners'));
    }

    public function create(){
        return view('pages.manajemen.owner.create');
    }

    public function store(Request $request){
        $toko = Toko::create([
            'nama' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make("owner123"), 
            'level' => "owner",
            'id_toko' => $toko->id,
        ]);

        Owner::create([
            'nama' => $request->nama_owner,
            'no_telp' => $request->no_telp,
            'id_user' => $user->id,
        ]);
        return redirect()->route('manajemen-owner-index');
    }

    public function edit($id){
        $owner = User::with('tokos', 'owner')->where('id', $id)->first();
        return view('pages.manajemen.owner.edit', compact('owner'));
    }

    public function update(Request $request, $id){
        $owner = User::with('tokos', 'owner')->where('id', $id)->first();
        
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $owner->id,
        ], [
            'email.unique' => 'Email sudah digunakan.',
        ]);
    
        $owner->email = $request->email;
        $owner->save();
    
        $owner->tokos->nama = $request->input('nama_perusahaan');
        $owner->tokos->alamat = $request->input('alamat');
        $owner->tokos->save();
    
        $owner->owner->nama = $request->input('nama_owner');
        $owner->owner->no_telp = $request->input('no_telp');
        $owner->owner->save();
    
        if ($request->has('reset_password')) {
            $owner->password = Hash::make('owner123');
            $owner->save();
        }
    
        return redirect()->route('manajemen-owner-index');
    }
 
    public function delete(User $id)
    {
        $toko = Toko::find($id->id_toko);
        $id->delete();
        if ($toko) {
            $toko->delete();
        }
        return redirect()->route('manajemen-owner-index');
    }
    
}
