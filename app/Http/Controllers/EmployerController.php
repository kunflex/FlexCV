<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobDisplay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EmployerController extends Controller
{
    //
    public function ControlPanel()
    {
        return view('employer.dashboard');
    }

    public function JobPostings(Request $request)
    {
        try{
        $request->validate([
            'posted_by' => 'nullable',
            'job_title' => 'required',
            'job_type' => 'required',
            'company' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'location' => 'required',
            'salary_range' => 'required',
            'category' => 'required',
            'application_instructions' => 'required',
            'job_description' => 'required',
            'deadline' => 'required',
        ]);
            $result_data = new JobDisplay();
            $result_data->posted_by = auth()->id();
            $result_data->job_title = $request->input('job_title');
            $result_data->job_type = $request->input('job_type');
            $result_data->company = $request->input('company');
            $result_data->contact = $request->input('contact');
            $result_data->email = $request->input('email');
            $result_data->location = $request->input('location');
            $result_data->salary_range = $request->input('salary_range');
            $result_data->category = $request->input('category');
            $result_data->application_instructions = $request->input('application_instructions');
            $result_data->job_description = $request->input('job_description');
            $result_data->deadline = $request->input('deadline');
            $saveSuccess = $result_data->save();

            if ($saveSuccess) {
                Log::info('Job display posted successfully.');
                return redirect()->back()->withErrors(['error' => 'Failed to save job application.']);
            } else {
                Log::error('Failed to save job display to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save job application.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during Job display: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }


    public function JobApplication(Request $request,$id)
    {
        $request->validate([
            'job_display_id' => 'nullable',
            'letter' => 'required|file|mimes:pdf',
            'cv' => 'required|file|mimes:pdf',
        ]);
    
        // Storing the cover letter
        $letterFile = $request->file('letter');
        $letterName = 'letter_' . time() . '.' . $letterFile->getClientOriginalExtension();
        $letterPath = $letterFile->storeAs('public/applicants/letter', $letterName);
    
        // Storing the CV
        $cvFile = $request->file('cv');
        $cvName = 'cv_' . time() . '.' . $cvFile->getClientOriginalExtension();
        $cvPath = $cvFile->storeAs('public/applicants/cv', $cvName);
    
    
        // Saving the application details
        $result_data = new JobApplication();
        $result_data->applicant_letter = $letterName;  // store filename only
        $result_data->applicant_cv = $cvName;          // store filename only
        $result_data->job_display_id = $id;
        
        $saveSuccess = $result_data->save();
    
        if ($saveSuccess) {
            Log::info('Job application posted successfully.');
            return redirect()->back()->with('success', 'Application submitted successfully.');
        } else {
            Log::error('Failed to save job application to the database.');
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save job application.']);
        }
    }
    
}
