<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Traits\HasRoles;
use App\Models\CvPersonalDetails;
use App\Models\CvAdditionalDetails;
use App\Models\CvEducation;
use App\Models\CvExperience;
use App\Models\CvReference;
use App\Models\JobDisplay;
use App\Models\Testimonials;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    use HasRoles;
    public function LandingPage()
    {
        return view('welcome');
    }

    public function Index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has the 'admin' role
            if (Auth::user()->hasRole('admin')) {

                $countUsers = ModelsUser::all()->count();
                $countJobs = JobDisplay::all()->count();
                $countTestimonials = Testimonials::all()->count();
                return view('admin.dashboard', compact('countUsers', 'countJobs','countTestimonials'));
            }

            // Check if the user has the 'user' role
            if (Auth::user()->hasRole('employer')) {
                // User route logic
                return view('employer.dashboard');
            } else {
                return view('welcome');
            }

            // Default route for authenticated users without specific roles
            return view('welcome');
        }

        return view('welcome');
    }

    public function About()
    {
        return view('about');
    }

    public function Contact()
    {
        return view('contact');
    }

    public function processForm(Request $request)
    {
        // Get the value of the selected radio button
        $newResumeChoice = $request->filled('new-resume');
        $uploadResumeChoice = $request->filled('upload-resume');

        if ($newResumeChoice) {
            return redirect('new-resume');
        } elseif ($uploadResumeChoice) {
            return redirect('upload-resume');
        } else {
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

        return view('CV.header', compact('cvEducation', 'cvExperience', 'cvReference'));
    }

    public function showUploadResumeForm()
    {
        return view('CV.upload');
    }

    public function Job_details($id)
    {
        try {
            // Fetch job details based on the provided ID
            $data = JobDisplay::where('id', $id)->first();
            // Check if data is found
            if ($data) {
                // Decode HTML entities for fields that contain HTML content
                $data->job_description = htmlspecialchars_decode($data->job_description, ENT_QUOTES);
                $data->application_instructions = htmlspecialchars_decode($data->application_instructions, ENT_QUOTES);

                return view('job-details', compact('data'));
            } else {
                // If no data is found, return an error response
                return response()->json(['error' => 'Job details not found for ID ' . $id], 404);
            }
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function JobSearch(Request $request)
    {
        // Default number of items per page
        $perPage = $request->input('perPage', 4); // Default to 4 if no input is provided

        // Fetch paginated jobs in Information Technology category
        $IT = JobDisplay::where('category', 'Information Technology')->paginate($perPage);

        // Get total number of jobs
        $ITCount = $IT->total();

        // Transform the items to include the first letter of each job
        $transformed = $IT->getCollection()->map(function ($job) {
            $firstLetter = (!empty($job->job_title)) ? $job->job_title[0] : 'N/A';
            // Include a debug log for each job processed
            Log::debug('Job Title: ' . $job->job_title . ' - First Letter: ' . $firstLetter);
            return [
                'job' => $job,
                'first_letter' => $firstLetter
            ];
        });

        // Replace the original collection in the paginator
        $IT->setCollection($transformed);

        // Send data to the view
        return view('job-search', compact('IT', 'ITCount', 'perPage'));
    }


    public function JobSearchNearby(Request $request)
    {
        // Default number of items per page
        $perPage = $request->input('perPage', 4); // Default to 4 if no input is provided

        // Fetch paginated jobs in Information Technology category
        $IT = JobDisplay::where('category', 'Information Technology')->paginate($perPage);

        // Get total number of jobs
        $ITCount = $IT->total();

        // Transform the items to include the first letter of each job
        $transformed = $IT->getCollection()->map(function ($job) {
            $firstLetter = (!empty($job->job_title)) ? $job->job_title[0] : 'N/A';
            // Include a debug log for each job processed
            Log::debug('Job Title: ' . $job->job_title . ' - First Letter: ' . $firstLetter);
            return [
                'job' => $job,
                'first_letter' => $firstLetter
            ];
        });

        // Replace the original collection in the paginator
        $IT->setCollection($transformed);

        // Send data to the view
        return view('jobs-nearby', compact('IT', 'ITCount', 'perPage'));
    }
}
