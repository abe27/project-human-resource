<?php

namespace App\Http\Controllers;

use App\Models\Geography;
use Illuminate\Http\Request;

class GeographyController extends Controller
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

    public function get()
    {
        $geo = Geography::where('is_active', true)->orderBy('geo_id')->get();
        return response()->json($geo);
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
     * @param  \App\Models\Geography  $geography
     * @return \Illuminate\Http\Response
     */
    public function show(Geography $geography)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Geography  $geography
     * @return \Illuminate\Http\Response
     */
    public function edit(Geography $geography)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Geography  $geography
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Geography $geography)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Geography  $geography
     * @return \Illuminate\Http\Response
     */
    public function destroy(Geography $geography)
    {
        //
    }
}
