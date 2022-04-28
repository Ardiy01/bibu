<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'user' => User::where('id', 3)->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $usr)
    {
        //
        return view('dashboard.profil.update',[
            'user' => User::where('id', $usr)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        dd($request);
        $data = [
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'nomer_telepon' => 'required|max:12',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'profil' => 'image|mimes:jpeg,png,jpg|file|max:2048',
            'jalan' => 'required',
            'no' => 'required',
            'id_kecamatan' => 'required',
            'id_kabupaten' => 'required',
            'password' => 'min:6'
        ];

        $validateData = $request->validate($data);

        if ($request->file('profil')) {
            $profil =  $request->file('profil')->store('profil->images');
            $validateData['profil'] = $profil;
        } else {
            $profil = $user->gambar;
            $validateData['gambar'] = $profil;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
