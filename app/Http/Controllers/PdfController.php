<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;

use App\Models\CvPersonalDetails;
use App\Models\CvAdditionalDetails;
use App\Models\CvEducation;
use App\Models\CvExperience;
use App\Models\CvReference;

class PdfController extends Controller
{
    public function convertBladeToPdf($templateNumber)
    {
        try {
             // Determine the template name based on the condition
            $template = 'template' . $templateNumber;

             // Get the stored cv_personal_details_id from the session
             $cv_personal_details_id = session('cv_personal_details_id');
    
             // Find the CvPersonalDetails record based on the ID
             $cvPersonalDetails = CvPersonalDetails::where('id', $cv_personal_details_id)->get();
             $cvAdditionalDetails = CvAdditionalDetails::where('cv_personal_details_id', $cv_personal_details_id)->get();
             $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
             $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
             $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
     
            $data = [
                'cvPersonalDetails' => $cvPersonalDetails,
                'cvEducation' => $cvEducation,
                'cvExperience' => $cvExperience,
                'cvAdditionalDetails' => $cvAdditionalDetails,
                'cvReference' => $cvReference,
            ];

            // Load the Blade view and set options
            $pdf = PDF::loadView('ResumeTemplates/'.$template,$data);

            // Download the PDF file
            return $pdf->download('flexcv.pdf');
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => $e->getMessage()]);
        }
    }


}
