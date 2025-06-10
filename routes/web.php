<?php

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// index
Route::get('/jobs', function () {
    // $jobs = Job::with('employer')->paginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    // $jobs = Job::with('employer')->cursorPaginate(3);
    // $jobs = Job::all();
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// create
Route::get('/jobs/create', function () {
    $employers = Employer::with('jobs')->get();
    return view('jobs.create', [
        'employers' => $employers
    ]);
});

// show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', [
        'job' => $job
    ]);
});

// post job
Route::post('/jobs', function () {
    $data = request()->validate([
        'title' => 'required',
        'salary' => 'required',
        'employer_id' => 'required|exists:employers,id'
    ]);

     Job::create($data);

    return redirect('/jobs');
});

// edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', [
        'job' => $job
    ]);
});

// update
Route::patch('/jobs/{id}', function ($id) {
    //validate the data
    $data = request()->validate([
        'title' => 'required',
        'salary' => 'required'
    ]);
    //find the job
    $job = Job::findOrFail($id);
    $job->update($data);
    //redirect to the jobs index
    return redirect('/jobs/' . $job->id);

});

// destroy
Route::delete('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    $job->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
        return view('contact');
});
