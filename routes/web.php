<?php

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // $jobs = Job::with('employer')->paginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    // $jobs = Job::with('employer')->cursorPaginate(3);
    // $jobs = Job::all();
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    $employers = Employer::with('jobs')->get();
    return view('jobs.create', [
        'employers' => $employers
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', [
        'job' => $job
    ]);
});

Route::post('/jobs', function () {
    $data = request()->validate([
        'title' => 'required',
        'salary' => 'required',
        'employer_id' => 'required|exists:employers,id'
    ]);

     Job::create($data);

    return redirect('/jobs');
});

Route::get('/contact', function () {
        return view('contact');
});
