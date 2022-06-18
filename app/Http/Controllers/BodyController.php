<?php

namespace App\Http\Controllers;

use App\Models\Body;
use App\Http\Requests\StoreBodyRequest;
use App\Http\Requests\UpdateBodyRequest;

class BodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Http\Requests\StoreBodyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBodyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Body  $body
     * @return \Illuminate\Http\Response
     */
    public function show(Body $body)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Body  $body
     * @return \Illuminate\Http\Response
     */
    public function edit(Body $body)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBodyRequest  $request
     * @param  \App\Models\Body  $body
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBodyRequest $request, Body $body)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Body  $body
     * @return \Illuminate\Http\Response
     */
    public function destroy(Body $body)
    {
        //
    }
}
