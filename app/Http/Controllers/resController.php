<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class resController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return "Display all users!";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "Created a user!";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return "Stored the created user!";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return "Showing the requested user!";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return "Edited the given user!";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return "Updated the current given user!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return "Deleted the current user!";
    }
}
