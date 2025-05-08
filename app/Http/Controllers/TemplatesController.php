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

    public function ColorChoice(Request $request)
    {
        $colorCodes = [
            'color1' => 'dodgerblue',
            'color2' => 'deeppink',
            'color3' => 'orange',
            'color4' => 'green',
            'color5' => 'mediumblue',
            'color6' => 'darkred',
            'color7' => 'darkblue',
            'color8' => 'orangered',
            'color9' => 'purple',
        ];

        $defaultColor = 'darkblue';
        $colorCode = $defaultColor; // Start with default color

        foreach ($colorCodes as $colorKey => $colorValue) {
            if ($request->filled($colorKey)) {
                $colorCode = $colorValue; // Set colorCode to the value if a matching color is found
                break; // Exit the loop once a color is found
            }
        }

        // Store the selected color in session
        session(['colorCode' => $colorCode]);
        // Define the template codes mapping
        $templateCodes = [
            'template1' => '1',
            'template2' => '2',
            'template3' => '3',
            'template4' => '4',
            'template5' => '5',
            'template6' => '6',
            'template7' => '7',
            'template8' => '8',
        ];

        // Retrieve the selected template code from the session
        $templateCode = session('templateCode', 'template2'); // Provide a default value

        // Determine the template ID based on the selected template code
        $template_id = $templateCodes[$templateCode] ?? null;

        return view('CV.finished-resume', compact('template_id'))->with('colorCode', $colorCode);
    }

    public function TemplateChoice(Request $request)
    {
        $templateCodes = [
            'template1' => 'template1',
            'template2' => 'template2',
            'template3' => 'template3',
            'template4' => 'template4',
            'template5' => 'template5',
            'template6' => 'template6',
            'template7' => 'template7',
            'template8' => 'template8',
        ];

        $defaultTemplate = 'template2';
        $templateCode = $defaultTemplate; // Start with default template

        foreach ($templateCodes as $templateKey => $templateValue) {
            if ($request->filled($templateKey)) {
                $templateCode = $templateValue; // Set templateCode to the value if a matching template is found
                break; // Exit the loop once a template is found
            }
        }

        $colorCode = session('colorCode', 'darkblue');
        // Store the selected template in session
        session(['templateCode' => $templateCode]);
        // Retrieve the stored cv_personal_details_id from the session
        $cv_personal_details_id = session('cv_personal_details_id');

        if (!empty($cv_personal_details_id)) {
            return redirect()->back()->with('colorCode', $colorCode);
        }
        return redirect('select-resume')->with('colorCode', $colorCode);
    }

    public function TemplatePreview(Request $request)
    {
        // Retrieve session variables or assign default values
        $colorCode = session('colorCode', 'darkblue');
        $templateCode = session('templateCode', 'template2');
        $cv_personal_details_id = session('cv_personal_details_id');

        // Find the CvPersonalDetails record based on the ID
        $cvPersonalDetails = CvPersonalDetails::where('id', $cv_personal_details_id)->get();
        $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvAdditionalDetails = CvAdditionalDetails::where('cv_personal_details_id', $cv_personal_details_id)->get();
        // Check if the view exists
        if (view()->exists("ResumeTemplates.$templateCode")) {
            return view("ResumeTemplates.$templateCode", compact('colorCode','cvReference', 'cvAdditionalDetails', 'cvEducation', 'cvExperience', 'cvPersonalDetails'));
        } else {
            // Handle the case where the view does not exist
            abort(404, 'Template not found');
        }
    }


}
