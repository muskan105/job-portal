<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function showLogin()
    {
        return view('admin.login');
    }

    function showAdd()
    {
        return view('admin.job.add');
    }

    function storeJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'company_name' => 'required|max:255',
            'description' => 'required|max:255',
            'requirement' => 'required|max:255',
            'location' => 'required|max:255',
            'experience' => 'required|max:255',
            'note' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validatedData = $validator->validated();

        Job::create($validatedData);

        return back()->withSuccess('Job created successfully.');
    }

    function doLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validatedData = $validator->validated();

        $isAuthinticate = Auth::attempt($validatedData);

        if (!$isAuthinticate) {
            return back()->withErrors(['auth' =>  'Credentials are incorrect']);
        }

        $user = Auth::user();

        if (!$user->is_admin) {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return back()->withErrors(['auth' => 'You are authorized to access this page']);
        }

        return redirect(route('admin.dashboard'));
    }


    function editJob($job_id)
    {
        $job = Job::findOrFail($job_id);
        return view('admin.job.edit', compact('job'));
    }


    function updateJob(Request $request, $job_id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'company_name' => 'required|max:255',
            'description' => 'required|max:255',
            'requirement' => 'required|max:255',
            'location' => 'required|max:255',
            'experience' => 'required|max:255',
            'note' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validatedData = $validator->validated();

        $job = Job::findOrFail($job_id);

        $job->update($validatedData);

        return back()->withSuccess('Job updated successfully.');
    }

    public function showDashboard()
    {
        $jobs = Job::withCount(['applications as applied'])->with('applications.applicant')->latest()->paginate(10);
        return view('admin.index', compact('jobs'));
    }

    public function deleteJob($job_id)
    {
        $job = Job::findOrFail($job_id);

        $job->delete();

        return back()->withSuccess('Job deleted successfully.');
    }
}
