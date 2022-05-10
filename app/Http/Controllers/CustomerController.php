<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('pemilik');
        return view('dashboard.customer.index', [
            'users' => User::where('rule', '=', 'Customer')->latest()->paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        //
        $this->authorize('pemilik');
        return view('dashboard.customer.detail', [
            'user' => User::where('id', $user)->get(),
        ]);
    }
}
