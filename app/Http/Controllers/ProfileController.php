<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index($id)
    {
        $level = auth()->user()->level;
        switch ($level) {
            case 'superadmin':
                $myData = User::where('level', "superadmin")->first();
                break;
            case 'owner':
                $myData = User::with('tokos', 'owner')->where('id', $id)->first();
                break;
            case 'kasir':
                $myData = User::with('tokos', 'kasir')->where('id', $id)->first();
                break;
        }
        return view('pages.profile.index', compact('myData'));
    }

    public function update(Request $request, $id)
    {
        $level = auth()->user()->level;
        switch ($level) {
            case 'superadmin':
                $superadmin = User::with('tokos')->where('id', $id)->first();
                $validated = $request->validate([
                    'email' => 'required|email|unique:users,email,' . $superadmin->id,
                ], [
                    'email.unique' => 'Email sudah digunakan.',
                ]);
                $superadmin->email = $request->email;
                $superadmin->save();

                $superadmin->tokos->nama = $request->input('nama_perusahaan');
                $superadmin->tokos->alamat = $request->input('alamat');
                $superadmin->tokos->save();
                break;
            case 'owner':
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
                break;
        }
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password-sekarang' => 'required',
            'password-baru' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (!Hash::check($request->input('password-sekarang'), Auth::user()->password)) {
            return redirect()->back()->withErrors(['password-sekarang' => 'Password saat ini salah']);
        }

        // Memperbarui password
        $user = User::where('id', Auth::id())->first();
        $user->password = Hash::make($request->input('password-baru'));
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah');
    }
}
