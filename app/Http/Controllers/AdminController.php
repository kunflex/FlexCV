<?php

namespace App\Http\Controllers;

use App\Models\Enquiries;
use App\Models\JobApplication;
use App\Models\JobDisplay;
use App\Models\Testimonials;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class AdminController extends Controller
{

    use HasRoles;
    public function Jobs()
    {
        return view('admin.add-jobs');
    }

    public function InterviewPage($id)
    {
        // Fetch all job applications with related job and user (optional if you need it)
        $data = JobApplication::with('job')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.interview', compact('data'));
    }

    public function SearchTrackJobs(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search = $request->input('search');
        $data = JobDisplay::where('job_title', 'like', '%' . $search . '%')->get();
        $result = '';
        if ($data->isEmpty()) {
            $result = 'Search for "' . $search . '" not found';
        }

        return view('admin.track-jobs', compact('data', 'result'));
    }

    public function SearchJobs(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search = $request->input('search');

        // Default number of items per page
        $perPage = $request->input('perPage', 4); // Default to 4 if no input is provided

        // Helper function to fetch and transform paginated jobs
        $fetchAndTransformJobs = function ($category, $search, $perPage) {
            // Fetch jobs based on the search query and category
            $jobs = JobDisplay::where('category', $category)
                ->where('job_title', 'like', '%' . $search . '%')
                ->paginate($perPage);

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

        // Define categories for pagination
        $categories = [
            'Information Technology',
            'Business Administration',
            'Social Sciences',
            'Engineering',
            'Arts and Fashion',
            'Health Sciences',
            'Education',
            'Applied Science',
            'Agriculture',
            'Law'
        ];

        // Initialize data arrays
        $data = [];
        $counts = [];
        $pages = [];
        $totalJobs = 0;

        foreach ($categories as $category) {
            $jobs = $fetchAndTransformJobs($category, $search, $perPage);

            // Check if jobs variable is null (no jobs found for the category)
            if ($jobs !== null) {
                $data[$category] = $jobs;
                $counts[$category . 'Counts'] = $jobs->total();
                $pages[$category . 'Pages'] = $jobs;
                $totalJobs += $jobs->total();
            }
        }

        // Initialize result variable
        $result = '';

        // Check if any jobs were found
        if ($totalJobs === 0) {
            $formattedSearch = '<b>' . htmlspecialchars($search, ENT_QUOTES, 'UTF-8') . '</b>';
            $result = 'Search result for "' . $formattedSearch . '" not found';
        }

        // Send data to the view, ensuring $data is always passed
        return view('job-search', [
            'data' => $data,
            'result' => $result,
            'counts' => $counts,
            'pages' => $pages,
            'perPage' => $perPage
        ]);
    }


    public function SearchJobsNearBy(Request $request)
    {
        $request->validate(['search1' => 'required', 'search2' => 'required']);
        $search1 = $request->input('search1');
        $search2 = $request->input('search2');

        // Default number of items per page
        $perPage = $request->input('perPage', 4); // Default to 4 if no input is provided

        // Helper function to fetch and transform paginated jobs
        $fetchAndTransformJobs = function ($category, $search1, $search2, $perPage) {
            // Fetch jobs based on the search query and category
            $jobs = JobDisplay::where('category', $category)
                ->where(function ($query) use ($search1, $search2) {
                    if (!empty($search1) && !empty($search2)) {
                        $query->where('job_title', 'like', '%' . $search1 . '%')
                            ->orWhere('job_description', 'like', '%' . $search2 . '%');
                    }
                })
                ->paginate($perPage);

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

        // Define categories for pagination
        $categories = [
            'Information Technology',
            'Business Administration',
            'Social Sciences',
            'Engineering',
            'Arts and Fashion',
            'Health Sciences',
            'Education',
            'Applied Science',
            'Agriculture',
            'Law'
        ];

        // Initialize data arrays
        $data = [];
        $counts = [];
        $pages = [];
        $totalJobs = 0;

        foreach ($categories as $category) {
            $jobs = $fetchAndTransformJobs($category, $search1, $search2, $perPage);

            // Check if jobs variable is null (no jobs found for the category)
            if ($jobs !== null) {
                $data[$category] = $jobs;
                $counts[$category . 'Counts'] = $jobs->total();
                $pages[$category . 'Pages'] = $jobs;
                $totalJobs += $jobs->total();
            }
        }

        // Initialize result variable
        $result = '';

        // Check if any jobs were found
        if ($totalJobs === 0) {
            $formattedSearch1 = '<b>' . htmlspecialchars($search1, ENT_QUOTES, 'UTF-8') . '</b>';
            $formattedSearch2 = '<b>' . htmlspecialchars($search2, ENT_QUOTES, 'UTF-8') . '</b>';
            $result = 'Search result for "' . $formattedSearch1 . '" and location "' . $formattedSearch2 . '" not found';
        }

        // Send data to the view, ensuring $data is always passed
        return view('jobs-nearby', [
            'data' => $data,
            'result' => $result,
            'counts' => $counts,
            'pages' => $pages,
            'perPage' => $perPage
        ]);
    }




    public function SearchEnquiries(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search = $request->input('search');
        $enquiries = Enquiries::where('fullname', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('advertisement', 'like', '%' . $search . '%')
            ->get();
        $result = '';
        if ($enquiries->isEmpty()) {
            $result = 'Search for "' . $search . '" not found';
        }


        return view('admin.enquiries', compact('enquiries', 'result'));
    }


    public function SearchTestimonials(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search = $request->input('search');
        $testimonials = Testimonials::where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->get();
        $result = '';
        if ($testimonials->isEmpty()) {
            $result = 'Search for "' . $search . '" not found';
        }

        return view('admin.testimonials', compact('testimonials', 'result'));
    }

    public function SearchAccount(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search = $request->input('search');
        $dataUsers = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->get();
        $result = '';
        if ($dataUsers->isEmpty()) {
            $result = 'Search for "' . $search . '" not found';
        }


        return view('admin.account', compact('dataUsers', 'result'));
    }


    public function UpdateJobs($id)
    {
        $data = JobDisplay::find($id);
        // Check if data is found
        if ($data) {
            // Decode HTML entities for fields that contain HTML content
            $data->job_description = htmlspecialchars_decode($data->job_description, ENT_QUOTES);
            $data->application_instructions = htmlspecialchars_decode($data->application_instructions, ENT_QUOTES);
        } else {
            // If no data is found, return an error response
            return response()->json(['error' => 'Job details not found for ID ' . $id], 404);
        }
        return view('admin.update-jobs', compact('data'));
    }

    public function EditJobs($id, Request $request)
    {
        try {
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
            $result_data = JobDisplay::find($id);
            $result_data->posted_by = auth()->id();
            $result_data->job_title = $request->input('job_title');
            $result_data->job_type = $request->input('job_type');
            $result_data->company = $request->input('company');
            $result_data->contact = $request->input('contact');
            $result_data->email = $request->input('email');
            $result_data->location = $request->input('location');
            $result_data->salary_range = $request->input('salary_range');
            $result_data->category = $request->input('category');
            $result_data->application_instructions = htmlspecialchars($request->input('application_instructions'), ENT_QUOTES, 'UTF-8');
            $result_data->job_description = htmlspecialchars($request->input('job_description'), ENT_QUOTES, 'UTF-8');
            $result_data->deadline = $request->input('deadline');
            $saveSuccess = $result_data->save();

            if ($saveSuccess) {
                Log::info('Job display posted successfully.');
                return redirect('track-jobs');
            } else {
                Log::error('Failed to save job display to the database.');
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save job application.']);
            }
        } catch (\Exception $e) {
            Log::error('Exception during Job display: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred.']);
        }
    }

    public function Testimonials()
    {
        $testimonials = Testimonials::all();
        $result = '';
        if ($testimonials->isEmpty()) {
            $result = 'No queries found!';
        }
        return view('admin.testimonials', compact('testimonials', 'result'));
    }

    public function SendTestimonials(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'profile' => 'required',
            'description' => 'required',
        ]);

        // Storing the cover letter
        $imageFile = $request->file('profile');
        $imageName = 'profile_' . time() . '.' . $imageFile->getClientOriginalExtension();
        $imagePath = $imageFile->storeAs('public/testimonials', $imageName);

        $result = new Testimonials();
        $result->name = $request->input('name');
        $result->profile = $imageName;
        $result->description = $request->input('description');
        $result->save();
        return redirect()->back();
    }

    public function UploadTestimonials()
    {
        return view('admin.create-testimonials');
    }

    public function Account()
    {
        $dataUsers = User::all();
        $result = '';
        if ($dataUsers->isEmpty()) {
            $result = 'No queries found!';
        }
        return view('admin.account', compact('dataUsers', 'result'));
    }

    public function Pages()
    {
        if (Auth::check()) {
            // Check if the user has the 'admin' role
            if (Auth::user()->hasRole('admin')) {
                $data = JobDisplay::all();
            } else {
                $data = JobDisplay::where('posted_by', Auth::user()->id)->get();
            }
        }
        $result = '';
        if ($data->isEmpty()) {
            $result = 'No queries found!';
        }
        return view('admin.track-jobs', compact('data', 'result'));
    }

    public function Applicants($id)
    {
        $data = JobApplication::where('job_display_id', $id)->get();
        return view('admin.track-applicants', compact('data'));
    }

    public function PdfPreview($id)
    {
        // Log the ID to check if the method is called
        Log::info('PdfPreview called with ID: ' . $id);
        $data = JobApplication::find($id);
        // Pass the PDF file contents to the view
        return view('admin.pdfviewer-modal', compact('id', 'data'));
    }



    public function ControlPanel()
    {
        $countUsers = User::all()->count();
        $countTestimonials = Testimonials::all()->count();
        // Count users with the role 'employer'
        $countJobs = JobDisplay::all()->count();

        return view('admin.dashboard', compact('countUsers', 'countJobs', 'countTestimonials'));
    }

    public function Suggestions()
    {
        return view('admin.suggestions');
    }

    public function Enquiries()
    {
        $enquiries = Enquiries::all();
        $result = '';
        if ($enquiries->isEmpty()) {
            $result = 'No queries found!';
        }
        return view('admin.enquiries', compact('enquiries', 'result'));
    }

    public function SendEnquiries(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'advertisement' => 'required',
            'description' => 'required',
        ]);

        $result = new Enquiries();
        $result->fullname = $request->input('fullname');
        $result->email = $request->input('email');
        $result->advertisement = $request->input('advertisement');
        $result->description = $request->input('description');
        $result->save();
        return redirect()->back();
    }
    public function ChatUs()
    {
        return view('admin.chat-us');
    }

    public function BarChart(): JsonResponse
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has the 'admin' role
            if (Auth::user()->hasRole('admin')) {
                $jobPostings = JobDisplay::select('category', DB::raw('COUNT(*) as count'))
                    ->groupBy('category')
                    ->get();
            } else if (Auth::user()->hasRole('employer')) {
                $userId = auth()->user()->id; // Get the authenticated user's ID
                $jobPostings = JobDisplay::select('category', DB::raw('COUNT(*) as count'))
                    ->where('posted_by', $userId) // Filter by the user ID
                    ->groupBy('category')
                    ->get();
            }
            $labels = $jobPostings->pluck('category')->toArray();
            $data = $jobPostings->pluck('count')->toArray();
        }
        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    public function PieChart(): JsonResponse
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has the 'admin' role
            if (Auth::user()->hasRole('admin')) {
                $jobPostings = JobDisplay::select('category', DB::raw('COUNT(*) as count'))
                    ->groupBy('category')
                    ->get();
            } else if (Auth::user()->hasRole('employer')) {
                $userId = auth()->user()->id; // Get the authenticated user's ID
                $jobPostings = JobDisplay::select('category', DB::raw('COUNT(*) as count'))
                    ->where('posted_by', $userId) // Filter by the user ID
                    ->groupBy('category')
                    ->get();
            }
            $labels = $jobPostings->pluck('category')->toArray();
            $data = $jobPostings->pluck('count')->toArray();
        }
        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    public function Doughnut(): JsonResponse
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has the 'admin' role
            if (Auth::user()->hasRole('admin')) {
                $jobPostings = JobDisplay::select('category', DB::raw('COUNT(*) as count'))
                    ->groupBy('category')
                    ->get();
            } else if (Auth::user()->hasRole('employer')) {
                $userId = auth()->user()->id; // Get the authenticated user's ID
                $jobPostings = JobDisplay::select('category', DB::raw('COUNT(*) as count'))
                    ->where('posted_by', $userId) // Filter by the user ID
                    ->groupBy('category')
                    ->get();
            }
            $labels = $jobPostings->pluck('category')->toArray();
            $data = $jobPostings->pluck('count')->toArray();
        }

        return response()->json(['labels' => $labels, 'data' => $data]);
    }
}
