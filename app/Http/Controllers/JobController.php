<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = \App\Models\Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', compact('jobs'));
    }
    public function create()
    {
        $employers = \App\Models\Employer::with('jobs')->get();
        return view('jobs.create', compact('employers'));
    }
    public function show(\App\Models\Job $job)
    {
        return view('jobs.show', compact('job'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'employer_id' => 'required|exists:employers,id'
        ]);

        \App\Models\Job::create($data);

        return redirect('/jobs');
    }
    public function edit(\App\Models\Job $job)
    {           
        return view('jobs.edit', compact('job'));
    }
    public function update(Request $request, \App\Models\Job $job)
    {
        // Validate the data
        $data = $request->validate([
            'title' => 'required',
            'salary' => 'required'
        ]);

        // Update the job
        $job->update($data);

        return redirect('/jobs/' . $job->id);
    }
    public function destroy(\App\Models\Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
