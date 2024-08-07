<?php

namespace App\Http\Controllers;

use App\Models\CvPersonalDetails;
use App\Models\CvAdditionalDetails;
use App\Models\CvEducation;
use App\Models\CvExperience;
use App\Models\CvReference;
use App\Models\JobApplication;
use App\Models\JobDisplay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class CV_Controller extends Controller
{
    //
    public function select_resume()
    {

        return view('CV.select-resume');
    }

    public function UpdateResume()
    {
        // Get the stored cv_personal_details_id from the session
        $cv_personal_details_id = session('cv_personal_details_id');

        $details = CvPersonalDetails::find($cv_personal_details_id);
        return view('CV.update-header', compact('details'));
    }

    public function Additional_Details()
    {
        try {
            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');

            // Find the CvPersonalDetails record based on the ID
            $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
            // Find the CvPersonalDetails record based on the ID
            $cvPersonalDetails = CvPersonalDetails::find($cv_personal_details_id);

            if ($cvPersonalDetails) {
                // Log success
                Log::info('Other details page accessed successfully for CVPersonalDetails ID: ' . $cv_personal_details_id);

                // Pass the CvPersonalDetails model to the 'CV.other details' view
                return view('CV.additional-details', compact('cvPersonalDetails', 'cvReference', 'cvExperience', 'cvEducation'));
            } else {
                // Log error
                Log::error('CVPersonalDetails record not found for ID: ' . $cv_personal_details_id);

                // Redirect or handle the case where the record is not found
                return redirect()->back()->withErrors(['error' => 'CVPersonalDetails record not found.']);
            }
        } catch (\Exception $e) {
            // Log exception
            Log::error('Exception in other details function: ' . $e->getMessage());

            // Handle the exception and redirect with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while accessing the other details page.']);
        }
    }

    public function Finalize()
    {
        // Get the stored cv_personal_details_id from the session
        $cv_personal_details_id = session('cv_personal_details_id');

        // Find the CvPersonalDetails record based on the ID
        $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
        return view('CV.finalize', compact('cvEducation', 'cvExperience', 'cvReference'));
    }

    public function Skills()
    {
        try {
            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');

            // Find the CvPersonalDetails record based on the ID
            $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvPersonalDetails = CvPersonalDetails::find($cv_personal_details_id);

            if ($cvPersonalDetails) {
                // Log success
                Log::info('Skills page accessed successfully for CVPersonalDetails ID: ' . $cv_personal_details_id);

                // Pass the CvPersonalDetails model to the 'CV.skills' view
                return view('CV.skills', compact('cvPersonalDetails', 'cvReference', 'cvExperience', 'cvEducation'));
            } else {
                // Log error
                Log::error('CVPersonalDetails record not found for ID: ' . $cv_personal_details_id);

                // Redirect or handle the case where the record is not found
                return redirect()->back()->withErrors(['error' => 'CVPersonalDetails record not found.']);
            }
        } catch (\Exception $e) {
            // Log exception
            Log::error('Exception in Skills function: ' . $e->getMessage());

            // Handle the exception and redirect with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while accessing the Skills page.']);
        }
    }

    public function Summary()
    {
        try {
            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');

            // Find the CvPersonalDetails record based on the ID
            $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
            // Find the CvPersonalDetails record based on the ID
            $cvPersonalDetails = CvPersonalDetails::find($cv_personal_details_id);

            if ($cvPersonalDetails) {
                // Log success
                Log::info('summary page accessed successfully for CVPersonalDetails ID: ' . $cv_personal_details_id);

                // Pass the CvPersonalDetails model to the 'CV.summary' view
                return view('CV.summary', compact('cvEducation', 'cvExperience', 'cvReference', 'cvPersonalDetails'));
            } else {
                // Log error
                Log::error('CVPersonalDetails record not found for ID: ' . $cv_personal_details_id);

                // Redirect or handle the case where the record is not found
                return redirect()->back()->withErrors(['error' => 'CVPersonalDetails record not found.']);
            }
        } catch (\Exception $e) {
            // Log exception
            Log::error('Exception in summary function: ' . $e->getMessage());

            // Handle the exception and redirect with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while accessing the summary page.']);
        }
    }

    public function Education()
    {
        // Get the stored cv_personal_details_id from the session
        $cv_personal_details_id = session('cv_personal_details_id');

        //checking if there is an entry for experience with the id
        $result = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
        if ($result->isEmpty()) {
            // Find the CvPersonalDetails record based on the ID
            $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
            return view('CV.education', compact('cvEducation', 'cvExperience', 'cvReference'));
        } else {
            return redirect('review-education');
        }
    }

    public function Review_Education()
    {
        try {
            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');

            // Find the CvPersonalDetails record based on the ID
            $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();

            if ($cvEducation) {
                // Log success
                Log::info('Review Education page accessed successfully for cvEducation ID: ' . $cv_personal_details_id);

                // Pass the cvReference model to the view
                return view('CV.education-review', compact('cvEducation', 'cvExperience', 'cvReference'));
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

    public function More_Education()
    {
        return view('CV.education-more');
    }

    public function Experience()
    {
        // Get the stored cv_personal_details_id from the session
        $cv_personal_details_id = session('cv_personal_details_id');

        // Find the CvPersonalDetails record based on the ID
        $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();

        return view('CV.experience', compact('cvEducation', 'cvExperience', 'cvReference'));
    }

    public function Experience_Details($id)
    {
        $job = cvExperience::find($id);
        return view('CV.experience-details', compact('job'));
    }

    public function DisplayRespo($id)
    {
        $job = cvExperience::find($id);
        return view('CV.update-experience-details', compact('job'));
    }

    public function Review_Experience()
    {
        try {
            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');

            // Find the CvPersonalDetails record based on the ID
            $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();

            if ($cvExperience) {
                // Log success
                Log::info('Review Experience page accessed successfully for cvReference ID: ' . $cv_personal_details_id);

                // Pass the cvReference model to the view
                return view('CV.experience-review', compact('cvExperience', 'cvEducation', 'cvReference'));
            } else {
                // Log error
                Log::error('Review Experience record not found for ID: ' . $cv_personal_details_id);

                // Redirect or handle the case where the record is not found
                return redirect()->back()->withErrors(['error' => 'Review Reference record not found.']);
            }
        } catch (\Exception $e) {
            // Log exception
            Log::error('Exception in summary function: ' . $e->getMessage());

            // Handle the exception and redirect with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while accessing the summary page.']);
        }
    }

    public function More_Experience()
    {
        // Get the stored cv_personal_details_id from the session
        $cv_personal_details_id = session('cv_personal_details_id');

        // Find the CvPersonalDetails record based on the ID
        $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
        return view('CV.experience-more', compact('cvExperience', 'cvEducation', 'cvReference'));
    }



    public function Finished_Resume(Request $request)
{
    // Retrieve the selected color code from the session
    $colorCode = session('colorCode', 'darkblue'); // Provide a default value in case session is empty

    // Retrieve the stored cv_personal_details_id from the session
    $cv_personal_details_id = session('cv_personal_details_id');

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

    // Retrieve the records based on cv_personal_details_id
    $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
    $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
    $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();

    // Pass the data to the view
    return view('CV.finished-resume', compact('cvEducation', 'cvExperience', 'cvReference', 'colorCode', 'template_id'));
}



    public function Reference()
    {
        // Get the stored cv_personal_details_id from the session
        $cv_personal_details_id = session('cv_personal_details_id');

        // Find the CvPersonalDetails record based on the ID
        $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
        return view('CV.reference', compact('cvEducation', 'cvExperience', 'cvReference'));
    }

    public function More_Reference()
    {
        // Get the stored cv_personal_details_id from the session
        $cv_personal_details_id = session('cv_personal_details_id');

        $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
        $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();
        return view('CV.more-reference', compact('cvEducation', 'cvExperience', 'cvReference'));
    }

    public function Review_Reference()
    {
        try {
            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');

            // Find the CvPersonalDetails record based on the ID
            $cvEducation = CvEducation::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvExperience = CvExperience::where('cv_personal_details_id', $cv_personal_details_id)->get();
            $cvReference = CvReference::where('cv_personal_details_id', $cv_personal_details_id)->get();

            if ($cvReference) {
                // Log success
                Log::info('Review Reference page accessed successfully for cvReference ID: ' . $cv_personal_details_id);

                // Clean the responsibilities field for each experience
                foreach ($cvExperience as $experience) {
                    // Decode HTML entities and strip tags
                    $experience->responsibilities = strip_tags(htmlspecialchars_decode($experience->responsibilities, ENT_QUOTES));
                }
                // Pass the cvReference model to the view
                return view('CV.review-reference', compact('cvEducation', 'cvExperience', 'cvReference'));
            } else {
                // Log error
                Log::error('Review Reference record not found for ID: ' . $cv_personal_details_id);

                // Redirect or handle the case where the record is not found
                return redirect()->back()->withErrors(['error' => 'Review Reference record not found.']);
            }
        } catch (\Exception $e) {
            // Log exception
            Log::error('Exception in summary function: ' . $e->getMessage());

            // Handle the exception and redirect with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while accessing the summary page.']);
        }
    }


    public function personal_info(Request $request)
    {
        try {
            $request->validate([
                'picture' => 'nullable',
                'firstname' => 'required',
                'othername' => 'nullable',
                'lastname' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'address' => 'nullable',
                'country' => 'nullable',
                'city_town' => 'nullable',
                'DOB' => 'nullable|date',
            ]);

            $personal_data = new CvPersonalDetails();

            $personal_data->picture = $request->input('picture');
            $personal_data->firstname = $request->input('firstname');
            $personal_data->othername = $request->input('othername');
            $personal_data->lastname = $request->input('lastname');
            $personal_data->email = $request->input('email');
            $personal_data->phone_number = $request->input('phone_number');
            $personal_data->address = $request->input('address');
            $personal_data->country = $request->input('country');
            $personal_data->city_town = $request->input('city/town');
            $personal_data->DOB = $request->input('DOB');

            $saveSuccess = $personal_data->save();

            if ($saveSuccess) {
                // Store the personal details ID in the session
                session(['cv_personal_details_id' => $personal_data->id]);

                Log::info('Personal information posted successfully.');
                return redirect('experience');
            } else {
                Log::error('Failed to save personal information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save personal information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during personal_info: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }

    public function Editpersonal_info($id, Request $request)
    {
        try {
            $request->validate([
                'picture' => 'nullable',
                'firstname' => 'required',
                'othername' => 'nullable',
                'lastname' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'address' => 'nullable',
                'country' => 'nullable',
                'city_town' => 'nullable',
                'DOB' => 'nullable|date',
            ]);

            $personal_data = CvPersonalDetails::find($id);

            $personal_data->picture = $request->input('picture');
            $personal_data->firstname = $request->input('firstname');
            $personal_data->othername = $request->input('othername');
            $personal_data->lastname = $request->input('lastname');
            $personal_data->email = $request->input('email');
            $personal_data->phone_number = $request->input('phone_number');
            $personal_data->address = $request->input('address');
            $personal_data->country = $request->input('country');
            $personal_data->city_town = $request->input('city/town');
            $personal_data->DOB = $request->input('DOB');

            $saveSuccess = $personal_data->save();

            if ($saveSuccess) {
                // Store the personal details ID in the session
                session(['cv_personal_details_id' => $personal_data->id]);

                Log::info('Personal information posted successfully.');

                //checking if there is an entry for experience with the id
                $result = CvExperience::where('cv_personal_details_id', $id)->get();
                if ($result->isEmpty()) {
                    return redirect('experience');
                } else {
                    return redirect('review-experience');
                }
            } else {
                Log::error('Failed to save personal information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save personal information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during personal_info: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }

    public function additional_info(Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'other_details' => 'nullable',
            ]);

            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');


            $additional_data = new CvAdditionalDetails();

            $additional_data->other_details = $request->input('other_details');
            $additional_data->cv_personal_details_id = $cv_personal_details_id;

            $saveSuccess = $additional_data->save();

            if ($saveSuccess) {
                Log::info('additional information posted successfully.');
                return redirect('reference');
            } else {
                Log::error('Failed to save additional information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save additional information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during additional_info: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }


    public function education_info(Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'institution'  => 'nullable',
                'certification'  => 'nullable',
                'field_of_study'  => 'nullable',
                'location' => 'nullable',
                'start_date' => 'nullable',
                'end_date' => 'nullable',
            ]);

            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');


            $education_data = new CvEducation();

            $education_data->institution = $request->input('institution');
            $education_data->certification = $request->input('certification');
            $education_data->field_of_study = $request->input('field_of_study');
            $education_data->location = $request->input('location');
            $education_data->start_date = $request->input('start_date');
            $education_data->end_date = $request->input('end_date');
            $education_data->cv_personal_details_id = $cv_personal_details_id;

            $saveSuccess = $education_data->save();

            if ($saveSuccess) {
                Log::info('education information posted successfully.');
                return redirect('review-education');
            } else {
                Log::error('Failed to save education information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save education information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during education_info: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }


    public function experience_info(Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'job_title' => 'nullable',
                'company' => 'nullable',
                'country' => 'nullable',
                'responsibilities' => 'nullable',
                'city_town' => 'nullable',
                'start_date' => 'nullable',
                'end_date' => 'nullable',
                'checkbox' => 'nullable', // Make sure the checkbox is nullable
            ]);

            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');

            $experience_data = new CvExperience();

            $experience_data->job_title = $request->input('job_title');
            $experience_data->company = $request->input('company');
            $experience_data->country = $request->input('country');
            $experience_data->city_town = $request->input('city_town');
            $experience_data->responsibilities = $request->input('responsibilities');
            $experience_data->cv_personal_details_id = $cv_personal_details_id;

            // Check if the checkbox is checked
            $isChecked = $request->has('checkbox');

            if ($isChecked) {
                $experience_data->end_date = null;
            } else {
                $experience_data->end_date = $request->input('end_date');
            }

            // Save the experience data
            $saveSuccess = $experience_data->save();

            if ($saveSuccess) {
                Log::info('Experience information posted successfully.');
                return redirect('review-experience');
            } else {
                Log::error('Failed to save experience information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save experience information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during experience_info: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }


    public function reference_info(Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'fullname' => 'required',
                'position' => 'required',
                'company' => 'required',
                'email' => 'nullable',
                'telephone' => 'required',
            ]);


            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');


            $reference_data = new CvReference();

            $reference_data->fullname = $request->input('fullname');
            $reference_data->position = $request->input('position');
            $reference_data->company = $request->input('company');
            $reference_data->email = $request->input('email');
            $reference_data->telephone = $request->input('telephone');
            $reference_data->cv_personal_details_id = $cv_personal_details_id;

            $saveSuccess = $reference_data->save();

            if ($saveSuccess) {
                Log::info('reference information posted successfully.');
                return redirect('review-reference');
            } else {
                Log::error('Failed to save reference information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save reference information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during reference_info: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }

    public function updateSkills(Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'editordata' => 'required',
            ]);
            $cvPersonalDetails = CvPersonalDetails::find(session('cv_personal_details_id'));

            if ($cvPersonalDetails) {
                // Assuming 'skills' is the name of the column in your CvPersonalDetails table
                $cvPersonalDetails->skills = $request->input('editordata');
                $cvPersonalDetails->save();

                // Log success
                Log::info('Skills updated successfully.');
                return redirect('summary')->with('success', 'Skills updated successfully.');
            } else {
                // Log error
                Log::error('CVPersonalDetails record not found during skills update.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            // Log exception
            Log::error('Exception during skills update: ' . $e->getMessage());
            return redirect()->back();
        }
    }



    public function updateSummary(Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'editordata' => 'required',
            ]);
            $cvPersonalDetails = CvPersonalDetails::find(session('cv_personal_details_id'));

            if ($cvPersonalDetails) {
                // Assuming 'skills' is the name of the column in your CvPersonalDetails table
                $cvPersonalDetails->summary = $request->input('editordata');
                $cvPersonalDetails->save();

                // Log success
                Log::info('summary updated successfully.');
                return redirect('additional-details')->with('success', 'summary updated successfully.');
            } else {
                // Log error
                Log::error('CVPersonalDetails record not found during summary update.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            // Log exception
            Log::error('Exception during summary update: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function updateOtherDetails(Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'editordata' => 'required',
            ]);


            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');


            $other_details_data = new CvAdditionalDetails();

            $other_details_data->other_details = $request->input('editordata');
            $other_details_data->cv_personal_details_id = $cv_personal_details_id;

            $saveSuccess = $other_details_data->save();

            if ($saveSuccess) {
                Log::info('experience information posted successfully.');
                return redirect('reference');
            } else {
                Log::error('Failed to save experience information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save experience information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during adding reference: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }


    public function AddReference(Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'editordata' => 'required',
            ]);


            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');


            $other_details_data = new CvReference();

            $other_details_data->other_details = $request->input('editordata');
            $other_details_data->cv_personal_details_id = $cv_personal_details_id;

            $saveSuccess = $other_details_data->save();

            if ($saveSuccess) {
                Log::info('experience information posted successfully.');
                return redirect('reference');
            } else {
                Log::error('Failed to save experience information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save experience information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during adding referen: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }

    public function ExperienceDelete($id)
    {
        $data = CvExperience::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function ExperienceUpdate($id)
    {
        $data = CvExperience::find($id);
        return view('CV.update-experience', compact('data'));
    }

    public function ExperienceEdit($id, Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'job_title' => 'nullable',
                'company' => 'nullable',
                'country' => 'nullable',
                'responsibilities' => 'nullable',
                'city_town' => 'nullable',
                'start_date' => 'nullable',
                'end_date' => 'nullable',
                'checkbox' => 'nullable', // Make sure the checkbox is nullable
            ]);

            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');

            $result = CvExperience::find($id);
            $result->job_title = $request->input('job_title');
            $result->company = $request->input('company');
            $result->country = $request->input('country');
            $result->responsibilities = $request->input('responsibilities');
            $result->city_town = $request->input('city_town');
            $result->start_date = $request->input('start_date');
            $result->end_date = $request->input('end_date');
            $result->cv_personal_details_id = $cv_personal_details_id;
            // Check if the checkbox is checked
            $isChecked = $request->has('checkbox');

            if ($isChecked) {
                $result->end_date = null;
            } else {
                $result->end_date = $request->input('end_date');
            }
            // Save the experience data
            $saveSuccess = $result->save();
            if ($saveSuccess) {
                Log::info('experience information updated successfully.');
                return redirect('review-experience');
            } else {
                Log::error('Failed to save experience information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save experience information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during updating experience_info: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }

    public function ResponsibilitiesEdit($id, Request $request)
    {
        try {
            $request->validate([
                'responsibilities' => 'nullable'
            ]);

            $result = CvExperience::find($id);
            $result->responsibilities =  htmlspecialchars($request->input('responsibilities'), ENT_QUOTES, 'UTF-8');
            // Save the experience data
            $saveSuccess = $result->save();
            if ($saveSuccess) {
                Log::info('experience information updated successfully.');
                return redirect('review-experience');
            } else {
                Log::error('Failed to save experience information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save experience information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during updating experience_info: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }

    public function EducationDelete($id)
    {
        $data = CvEducation::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function EducationUpdate($id)
    {
        $data = CvEducation::find($id);
        return view('CV.education-update', compact('data'));
    }

    public function EducationEdit($id, Request $request)
    {
        try {
            $request->validate([
                'cv_personal_details_id' => 'nullable',
                'institution'  => 'nullable',
                'certification'  => 'nullable',
                'field_of_study'  => 'nullable',
                'location' => 'nullable',
                'start_date' => 'nullable',
                'end_date' => 'nullable',
            ]);

            // Get the stored cv_personal_details_id from the session
            $cv_personal_details_id = session('cv_personal_details_id');


            $education_data = CvEducation::find($id);

            $education_data->institution = $request->input('institution');
            $education_data->certification = $request->input('certification');
            $education_data->field_of_study = $request->input('field_of_study');
            $education_data->location = $request->input('location');
            $education_data->start_date = $request->input('start_date');
            $education_data->end_date = $request->input('end_date');
            $education_data->cv_personal_details_id = $cv_personal_details_id;

            $saveSuccess = $education_data->save();

            if ($saveSuccess) {
                Log::info('education information posted successfully.');
                return redirect('review-education');
            } else {
                Log::error('Failed to save education information to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save education information.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during education_info: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }
}
