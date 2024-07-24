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

class AdminController extends Controller
{
    //
    public function Jobs()
    {
        return view('admin.add-jobs');
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

        // Fetch jobs based on search query
        $data = JobDisplay::where('job_title', 'like', '%' . $search . '%')->get();

        // Initialize result variable
        $result = '';

        // Check if data is empty
        if ($data->isEmpty()) {
            $formattedSearch = '<b>' . htmlspecialchars($search, ENT_QUOTES, 'UTF-8') . '</b>';
            $result = 'Search result for "' . $formattedSearch . '" not found';
        }
        else{

        }
        // Send data and result to the view
        return view('job-search', compact('data', 'result'));
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
        $data = JobDisplay::where('posted_by', Auth::user()->id)->get();
        return view('admin.track-jobs', compact('data'));
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
        $jobPostings = JobDisplay::select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();

        $labels = $jobPostings->pluck('year')->toArray();
        $data = $jobPostings->pluck('count')->toArray();

        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    public function PieChart(): JsonResponse
    {
        $jobPostings = JobDisplay::select('category', DB::raw('COUNT(*) as count'))
            ->groupBy('category')
            ->get();

        $labels = $jobPostings->pluck('category')->toArray();
        $data = $jobPostings->pluck('count')->toArray();

        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    public function Doughnut(): JsonResponse
    {
        $jobPostings = JobDisplay::select('category', DB::raw('COUNT(*) as count'))
            ->groupBy('category')
            ->get();

        $labels = $jobPostings->pluck('category')->toArray();
        $data = $jobPostings->pluck('count')->toArray();

        return response()->json(['labels' => $labels, 'data' => $data]);
    }
}
