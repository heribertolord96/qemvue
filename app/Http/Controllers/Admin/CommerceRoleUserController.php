<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\CommerceRoleUser;
use Illuminate\Http\Request;

class CommerceRoleUserController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommerceRoleUser  $commerceRoleUser
     * @return \Illuminate\Http\Response
     */
    public function show(CommerceRoleUser $commerceRoleUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommerceRoleUser  $commerceRoleUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CommerceRoleUser $commerceRoleUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommerceRoleUser  $commerceRoleUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommerceRoleUser $commerceRoleUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommerceRoleUser  $commerceRoleUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommerceRoleUser $commerceRoleUser)
    {
        //
    }
}
