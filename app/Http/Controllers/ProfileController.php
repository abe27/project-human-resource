<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Position;
use App\Models\PrefixName;
use App\Models\Profile;
use App\Models\Section;
use App\Models\Shift;
use App\Models\Traveling;
use App\Models\Whs;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postion = Position::where('is_active', true)->get();
        $section = Section::where('is_active', true)->get();
        $department = Department::where('is_active', true)->get();
        $whs = Whs::where('is_active', true)->get();
        $shift = Shift::where('is_active', true)->get();
        $company = Company::where('is_active', true)->get();
        $travel = Traveling::where('is_active', true)->get();
        $prefix = PrefixName::where('is_active', true)->get();
        $military = [
            ["name" => "-",],
            ["name" => "No",],
            ["name" => "Yes"],
        ];
        $married_status = [
            ["name" => "-",],
            ["name" => 'Single',],
            ["name" => 'Married'],
        ];
        $gender = [
            ["name" => "-",],
            ["name" => 'Female',],
            ["name" => 'Male'],
        ];

        $employee_status = [
            ["name" => '-',],
            ["name" => 'Part_Time',],
            ["name" => 'Outsource',],
            ["name" => 'Daily',],
            ["name" => 'Employee'],
        ];

        $data = [
            'position' => $postion,
            'section' => $section,
            'department' => $department,
            'whs' => $whs,
            'shift' => $shift,
            'company' => $company,
            'travel' => $travel,
            'prefix' => $prefix,
            'military' => $military,
            'married_status' => $married_status,
            'gender' => $gender,
            'employee_status' => $employee_status,
        ];
        return Inertia::render('Profile', $data);
    }

    public function get(Request $request)
    {
        $data = Profile::with([
            'user',
            'company',
            'whs',
            'position',
            'section',
            'department',
            'travel',
            'shift',
            'level',
            'prefix',
            'address',
            'empcode'
        ])->where('user_id', $request->user()->id)->first();
        // return response()->json($request->user()->load('profile'));
        return response()->json($data);
    }

    public function image_upload(Profile $profile, Request $request)
    {
        // if ($request->hasFile('avatar')) {
        //     $file_name = $request->file('avatar')->getClientOriginalName();
        //     return response()->json(['success' => 'You have successfully uploaded "' . $file_name . '"']);
        // }

        // return response()->json([
        //     'message' => 'You must not a file'
        // ]);
        return $request;
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
