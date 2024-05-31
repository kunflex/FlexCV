<?php

namespace App\Http\Controllers;

use App\Models\Enquiries;
use App\Models\JobApplication;
use App\Models\JobDisplay;
use App\Models\Testimonials;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        // Count users with the role 'employer'
        $countJobs = JobDisplay::all()->count();

        return view('admin.dashboard', compact('countUsers', 'countJobs'));
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
    public function ChatUs(){
        return view('admin.chat-us');
    }
}
