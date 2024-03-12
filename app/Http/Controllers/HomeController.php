<?php

namespace App\Http\Controllers;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\CvPersonalDetails;
use App\Models\CvAdditionalDetails;
use App\Models\CvEducation;
use App\Models\CvExperience;
use App\Models\CvReference;

class HomeController extends Controller
{
    //
    public function LandingPage(){
        return view('welcome');
    }
    
    public function Index(){
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has the 'admin' role
            if (Auth::user()->hasRole('admin')) {
                // Admin route logic
                return view('admin.dashboard');
            }

            // Check if the user has the 'user' role
            if (Auth::user()->hasRole('employer')) {
                // User route logic
                return view('employer.dashboard');
            }
            else{
                return view('welcome');
            }

            // Default route for authenticated users without specific roles
            return view('welcome');
        }

        return view('welcome');
    }

    public function About(){
        return view('about');
    }

    public function Contact(){
        return view('contact');
    }

    public function processForm(Request $request)
    {
       // Get the value of the selected radio button
       $newResumeChoice = $request->filled('new-resume');
       $uploadResumeChoice = $request->filled('upload-resume');

       if($newResumeChoice){
            return redirect('new-resume');
       }
       elseif($uploadResumeChoice){
        return redirect('upload-resume');
       }
       else{
        return redirect()->back();
       }
    }
    
    public function showNewResumeForm()
    {
        // Get the stored cv_personal_details_id from the session
        $cv_personal_details_id = session('cv_personal_details_id');
    
        // Find the CvPersonalDetails record based on the ID
        $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
    
        return view('CV.header', compact('cvEducation','cvExperience','cvReference'));
    }
    
    public function showUploadResumeForm()
    {
        return view('CV.upload');
    }

    public function Job_details(){
        return view('job-details');
    }

    public function JobSearch(){
        return view('job-search');
    }

    public function JobSearchNearby(){
        return view('jobs-nearby');
    }

}
