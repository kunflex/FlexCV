<?php

namespace App\Http\Controllers;

use App\Models\CvPersonalDetails;
use App\Models\CvAdditionalDetails;
use App\Models\CvEducation;
use App\Models\CvExperience;
use App\Models\CvReference;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class TemplatesController extends Controller
{
    public function TemplatePage(){
        return view('template-page');
    }
    public function TemplatePreview(){
        return view('ResumeTemplates.preview-resume');
    }

    public function Template1(){
        try {
             // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');
    
            // Find the CvPersonalDetails record based on the ID
            $cvPersonalDetails = CvPersonalDetails::where('id', $cv_personal_details_id)->get();
            $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
    
            if ($cvEducation) {
                // Log success
                Log::info('Review Education page accessed successfully for cvEducation ID: ' . $cv_personal_details_id);
    
                // Pass the cvReference model to the view
                
                return view('ResumeTemplates.template1', compact('cvEducation','cvExperience','cvReference', 'cvPersonalDetails'));
            } else {
                // Log error
                Log::error('Review Education record not found for ID: ' . $cv_personal_details_id);
    
                // Redirect or handle the case where the record is not found
                return redirect()->back()->withErrors(['error' => 'Review Education record not found.']);
            }
        } catch (\Exception $e) {
            // Log exception
            Log::error('Exception in review education function: ' . $e->getMessage());
    
            // Handle the exception and redirect with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while accessing the review education page.']);
        }
    }


    public function Template2(){
        try {
            // Get the stored cv_personal_details_id from the session
           $cv_personal_details_id = session('cv_personal_details_id');
   
           // Find the CvPersonalDetails record based on the ID
            $cvPersonalDetails = CvPersonalDetails::where('id', $cv_personal_details_id)->get();
           $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
           $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
           $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
           $cvAdditionalDetails = CvAdditionalDetails::where('cv_personal_details_id', $cv_personal_details_id)->get();
           $cvPersonalDetails = CvPersonalDetails::where('cv_personal_details_id', $cv_personal_details_id)->get();
   
           if ($cvPersonalDetails == null) {
               // Log success
               Log::info('Review Education page accessed successfully for cvEducation ID: ' . $cv_personal_details_id);
   
               // Pass the cvReference model to the view
               
               return view('ResumeTemplates.template2', compact('cvEducation','cvExperience','cvReference', 'cvPersonalDetails', 'cvAdditionalDetails'));
           } else {
               // Log error
               Log::error('Review Education record not found for ID: ' . $cv_personal_details_id);
   
               // Redirect or handle the case where the record is not found
               return redirect()->back()->withErrors(['error' => 'Review Education record not found.']);
           }
       } catch (\Exception $e) {
           // Log exception
           Log::error('Exception in review education function: ' . $e->getMessage());
   
           // Handle the exception and redirect with an error message
           return redirect()->back()->withErrors(['error' => 'An error occurred while accessing the review education page.']);
       }
    }


    public function Template3(){
        return view('ResumeTemplates.template3');
    }


    public function Template4(){
        return view('ResumeTemplates.template4');
    }


    public function Template5(){
        return view('ResumeTemplates.template5');
    }

    public function Template6(){
        return view('ResumeTemplates.template6');
    }
    
}
