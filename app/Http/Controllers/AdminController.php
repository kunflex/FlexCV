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

    public function Testimonials()
    {
        $testimonials = Testimonials::all();
        return view('admin.testimonials', compact('testimonials'));
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
        return view('admin.account', compact('dataUsers'));
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
        return view('admin.enquiries', compact('enquiries'));
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
