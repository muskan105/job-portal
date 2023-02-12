<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    public function dashboard()
    {
        $applicant_id = Auth::user()->id;

        $jobs = Job::with(['applications' => function ($query) use ($applicant_id) {

            $query->where('applicant_id', $applicant_id);
        }])->latest()->paginate(5);

        return view('applicant.index', compact('jobs'));
    }

    public function applyJob($job_id)
    {
        $applicant_id = Auth::user()->id;

        $isAlreadyApplied = JobApplication::where([['job_id', '=', $job_id], ['applicant_id', '=', $applicant_id]])->first();

        if ($isAlreadyApplied) {
            return back()->withError('Job Already Applied');
        }

        JobApplication::create(
            [
                'job_id' => $job_id,
                'applicant_id' => $applicant_id
            ]
        );

        return back()->withSuccess('Job Applied successfully.');
    }



    public function addDetails()
    {
        return view('applicant.add_detail');
    }

    public function storeDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'resume' =>  'required',
            'education' => 'required|max:255',
            'experience' => 'required|max:255',
            'skills' => 'required|max:255',
            'certifications' => 'required|max:255',
            'information' => 'required|max:255',
            'location' => 'required',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validatedData = $validator->validated();

        $resumeFile = $request->file('resume');

        if ($resumeFile) {
            $resumeName = $resumeFile->getClientOriginalName();
            $resumeName = preg_replace('#[ -]+#', '-', $resumeName);
            $validatedData['resume'] = $resumeFile->storeAs('',  "$resumeName", 'public');
        }

        $user_id = Auth::user()->id;

        $validatedData['user_id'] = $user_id;

        Applicant::create($validatedData);

        return redirect(route('dashboard'))->withSuccess('Applicant data updated successfully.');
    }
}
