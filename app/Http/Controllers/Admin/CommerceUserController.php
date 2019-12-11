<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\CommerceUser;
use Illuminate\Http\Request;

class CommerceUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.commerces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $commerce = CommerceUser::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommerceUser  $commerceUser
     * @return \Illuminate\Http\Response
     */
    public function show(CommerceUser $commerceUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommerceUser  $commerceUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CommerceUser $commerceUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommerceUser  $commerceUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommerceUser $commerceUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommerceUser  $commerceUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommerceUser $commerceUser)
    {
        //
    }
}
