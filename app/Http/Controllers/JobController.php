<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Job::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_fields = $request->validate([
            'title'=>'required|max:255',
            'salary'=>'required|numeric',
            'location'=>'required|max:255',
            'schedule'=>'required|max:255',
            'url'=>'max:255',
        ]);

        $job = Job::create($validated_fields);
        return $job;
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return $job;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validated_fields = $request->validate([
            'title'=>'required|max:255',
            'salary'=>'required|numeric',
            'location'=>'required|max:255',
            'schedule'=>'required|max:255',
            'url'=>'max:255',
        ]);

        $job->update($validated_fields);
        return $job;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return ['message'=>'this job was deleted'];
    }
}
