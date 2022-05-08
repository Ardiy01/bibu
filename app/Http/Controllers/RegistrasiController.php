<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('registrasi', [
            'kecamatan' => Kecamatan::all()->sortBy('nama_kecamatan'),
            'kabupaten' => Kabupaten::all()->sortBy('nama_kabupaten')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'nama' => 'required',
            'nomer_telepon' => 'required|max:12',
            'jalan' => 'required',
            'nomor' => 'required',
            'jenis_kelamin' => 'required',
            'id_kecamatan' => 'required',
            'id_kabupaten' => 'required',
            'password' => 'required|min:6',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'username' => 'required|unique:users,username'
        ];


        $validateData = $request->validate($data);

        $validateData['password'] = Hash::make($request->password);

        User::create($validateData);

        alert()->success('Registrasi Berhasil')->showConfirmButton('Ok')->showCloseButton('true');
        return redirect('/');
    }
}
