<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tombon;
use Illuminate\Http\Request;

class TombonController extends Controller
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

    public function get(District $district) {
        $data = Tombon::where('district_id', $district->id)->where('is_active', true)->orderBy('zip_code')->get();
        return response()->json($data);
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
     * @param  \App\Models\Tombon  $tombon
     * @return \Illuminate\Http\Response
     */
    public function show(Tombon $tombon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tombon  $tombon
     * @return \Illuminate\Http\Response
     */
    public function edit(Tombon $tombon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tombon  $tombon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tombon $tombon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tombon  $tombon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tombon $tombon)
    {
        //
    }
}
