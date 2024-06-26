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
                return view('admin.dashboard', compact('countUsers', 'countJobs', 'countTestimonials'));
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
    
        // Helper function to fetch and transform paginated jobs
        $fetchAndTransformJobs = function($category, $perPage) {
            $jobs = JobDisplay::where('category', $category)->paginate($perPage);
    
            // Check if jobs collection is empty
            if ($jobs->isEmpty()) {
                return null; // Return null if no jobs found for the category
            }
    
            $transformed = $jobs->getCollection()->map(function ($job) {
                $firstLetter = (!empty($job->job_title)) ? $job->job_title[0] : 'N/A';
                // Include a debug log for each job processed
                Log::debug('Job Title: ' . $job->job_title . ' - First Letter: ' . $firstLetter);
                return [
                    'job' => $job,
                    'first_letter' => $firstLetter
                ];
            });
    
            // Replace the original collection in the paginator
            $jobs->setCollection($transformed);
    
            return $jobs;
        };
    
        // Fetch and transform jobs for each category
        $categories = [
            'Information Technology' => 'IT',
            'Business Administration' => 'BA',
            'Social Sciences' => 'SS',
            'Engineering' => 'EE',
            'Arts and Fashion' => 'Arts',
            'Health Sciences' => 'HS',
            'Education' => 'Edu',
            'Applied Science' => 'Science',
            'Agriculture' => 'Agric',
            'Law' => 'Law'
        ];
    
        $data = [];
        $counts = [];
        $totalJobs = 0;
    
        foreach ($categories as $category => $variable) {
            $jobs = $fetchAndTransformJobs($category, $perPage);
    
            // Check if jobs variable is null (no jobs found for the category)
            if ($jobs === null) {
                // Handle the case where no jobs are found
                $data[$variable] = collect(); // Provide an empty collection or handle as per your requirement
                $counts[$variable . 'Count'] = 0;
            } else {
                $data[$variable] = $jobs;
                $counts[$variable . 'Count'] = $jobs->total();
                $totalJobs += $jobs->total();
            }
        }
    
        // Initialize result variable
        $result = '';
    
        // Check if all data arrays are empty
        if ($totalJobs === 0) {
            $result = 'No jobs found!';
        }
    
        // Send data to the view
        return view('job-search', array_merge($data, $counts, [
            'data' => $data,
            'result' => $result,
            'perPage' => $perPage
        ]));
    }
    


    public function JobSearchNearby(Request $request)
    {
        // Default number of items per page
        $perPage = $request->input('perPage', 4); // Default to 4 if no input is provided

        // Define categories and corresponding variables
        $categories = [
            'Information Technology' => 'IT',
            'Business Administration' => 'BA',
            'Social Sciences' => 'SS',
            'Engineering' => 'EE',
            'Arts and Fashion' => 'Arts',
            'Health Sciences' => 'HS',
            'Education' => 'Edu',
            'Applied Science' => 'Science',
            'Agriculture' => 'Agric',
            'Law' => 'Law'
        ];

        // Helper function to fetch and transform jobs for a given category
        function fetchJobs($category, $perPage)
        {
            $jobs = JobDisplay::where('category', $category)->paginate($perPage);

            $transformed = $jobs->getCollection()->map(function ($job) {
                $firstLetter = (!empty($job->job_title)) ? $job->job_title[0] : 'N/A';
                // Include a debug log for each job processed
                Log::debug('Job Title: ' . $job->job_title . ' - First Letter: ' . $firstLetter);
                return [
                    'job' => $job,
                    'first_letter' => $firstLetter
                ];
            });

            // Replace the original collection in the paginator
            $jobs->setCollection($transformed);

            return $jobs;
        }

        // Initialize arrays to store data and counts
        $data = [];
        $counts = [];

        // Fetch and transform jobs for each category
        foreach ($categories as $category => $variable) {
            $jobs = fetchJobs($category, $perPage);
            $data[$variable] = $jobs;
            $counts[$variable . 'Count'] = $jobs->total();
        }

        // Send data to the view
        return view('jobs-nearby', array_merge($data, $counts, [
            'perPage' => $perPage
        ]));
    }
}
