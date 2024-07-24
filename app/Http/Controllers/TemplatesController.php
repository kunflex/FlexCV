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
use Spatie\LaravelData\Attributes\Validation\Json;

class TemplatesController extends Controller
{
    public function TemplatePage()
    {
        return view('template-page');
    }

    public function TemplateChoice(Request $request)
    {
        $colorCodes = [
            'color1' => 'dodgerblue',
            'color2' => 'deeppink',
            'color3' => 'orange',
            'color4' => 'green',
            'color5' => 'mediumblue',
            'color6' => 'red',
            'color7' => 'darkblue',
            'color8' => 'orangered',
            'color9' => 'purple',
        ];
    
        $templateCodes = [
            'template1' => 'template1',
            'template2' => 'template2',
            'template3' => 'template3',
            'template4' => 'template4',
            'template5' => 'template5',
            'template6' => 'template6',
        ];
    
        // Initialize the default color and template
        $defaultColor = 'darkblue';
        $defaultTemplate = 'template2';
    
        // Determine the selected color code
        $colorCode = $defaultColor; // Start with default color
        foreach ($colorCodes as $colorKey => $colorValue) {
            if ($request->filled($colorKey)) {
                $colorCode = $colorValue; // Set colorCode to the value if a matching color is found
                break; // Exit the loop once a color is found
            }
        }
    
        // Determine the selected template code
        $templateCode = $defaultTemplate; // Start with default template
        foreach ($templateCodes as $templateKey => $templateValue) {
            if ($request->filled($templateKey)) {
                $templateCode = $templateValue; // Set templateCode to the value if a matching template is found
                break; // Exit the loop once a template is found
            }
        }
    
        // Store the selected color and template in session
        session(['colorCode' => $colorCode, 'templateCode' => $templateCode]);
    
        return redirect('select-resume');
    }
    
    public function TemplatePreview(Request $request)
    {
        // Define default values
        $defaultColorCode = 'darkblue'; // Replace with your actual default color code
        $defaultTemplateCode = 'template2'; // Replace with your actual default template code
    
        // Retrieve session variables or assign default values
        $colorCode = session('colorCode', $defaultColorCode);
        $templateCode = session('templateCode', $defaultTemplateCode);
    
        // Check if the view exists
        if (view()->exists("ResumeTemplates.$templateCode")) {
            return view("ResumeTemplates.$templateCode", compact('colorCode'));
        } else {
            // Handle the case where the view does not exist
            abort(404, 'Template not found');
        }
    }
    
    

    public function Template1(Request $request)
    {
        try {
            $colorCode = session('colorCode');
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

                return view('ResumeTemplates.template1', compact('cvEducation', 'cvExperience', 'cvReference', 'cvPersonalDetails', 'colorCode'));
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


    public function Template2()
    {
        try {
            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');
            $colorCode = session('colorCode');

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

                return view('ResumeTemplates.template2', compact('cvEducation', 'cvExperience', 'cvReference', 'cvPersonalDetails', 'cvAdditionalDetails', 'colorCode'));
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


    public function Template3()
    {
        $colorCode = session('colorCode');

        return view('ResumeTemplates.template3', compact('colorCode'));
    }


    public function Template4()
    {
        return view('ResumeTemplates.template4');
    }


    public function Template5()
    {
        return view('ResumeTemplates.template5');
    }

    public function Template6()
    {
        return view('ResumeTemplates.template6');
    }
}
