<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.profil.index', [
            'user' => User::where('id', 2)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $usr, Request $request)
    {
        //
        return view('dashboard.profil.update',[
            'user' => User::where('id', $usr)->get(),
            'kecamatan' => Kecamatan::all()->sortBy('nama_kecamatan'),
            'kabupaten' => Kabupaten::all()->sortBy('nama_kabupaten')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usr)
    {
        //
        $user = User::where('id', $usr)->get();
        foreach($user as $usr){
            $email = $usr->email;
            $username = $usr->username;
            $profil = $usr->profil;
            $id = $usr->id;
            $pass = $usr->password;
        }

        $data = [
            'nama' => 'required',
            'nomer_telepon' => 'required|max:12',
            'profil' => 'image|mimes:jpeg,png,jpg|file|max:2048',
            'jalan' => 'required',
            'nomor' => 'required',
            'id_kecamatan' => 'required',
            'id_kabupaten' => 'required',
            'password' => 'nullable|min:6'
        ];

        if($request->email != $email){
            $data['email'] = 'required|email:rfc,dns|unique:users,email';
        }

        if($request->username != $username){
            $data['username'] = 'required|unique:users,username';
        }

        $validateData = $request->validate($data);

        if ($request->file('profil')) {
            $profils =  $request->file('profil')->store('profil-images');
            $validateData['profil'] = $profils;
        } else {
            $profils = $profil;
            $validateData['profil'] = $profils;
        }

        if($request->password == null){
            $validateData['password'] = $pass;
        } else{
            $passwordBaru = Hash::make($request->password);
            $validateData['password'] = $passwordBaru;
        }

        User::where('id', $id)
                ->update($validateData);
        
        alert()->success('Update Profil', 'Data Berhasil Disimpan')->showConfirmButton('Ok')->showCloseButton('true');            
        return redirect('/dashboard/profil');
    }
}
