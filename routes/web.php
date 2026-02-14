<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CV_Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\PDF_TO_TEXTController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/Index');
    } else {
        return view('splashscreen');
    }
});

// <================= Upload & Processing CV Controller=====================>
Route::get('/cv/upload', [PDF_TO_TEXTController::class, 'showForm']);
Route::post('/cv/process', [PDF_TO_TEXTController::class, 'processCV'])->name('cv.process');
// <================= End Upload & Processing CV Controller=====================>


Route::get('MS-Word', [WordController::class, 'convertHtmlToWord']);
Route::get('/PDF/{templateNumber}/{colorCode}', [PdfController::class, 'convertBladeToPdf'])->name('pdf.download');



// <================= CV Controller=====================>
Route::get('update-resume', [CV_Controller::class, 'UpdateResume'])->name('updateResume');
Route::get('select-resume', [CV_Controller::class, 'select_resume']);
Route::get('reference', [CV_Controller::class, 'Reference']);
Route::get('more-reference', [CV_Controller::class, 'More_Reference']);
Route::get('review-reference', [CV_Controller::class, 'Review_Reference']);
Route::get('additional-details', [CV_Controller::class, 'Additional_Details']);
Route::get('finalize', [CV_Controller::class, 'Finalize']);
Route::get('skills', [CV_Controller::class, 'Skills']);
Route::get('more-experience', [CV_Controller::class, 'More_Experience']);
Route::get('review-experience', [CV_Controller::class, 'Review_Experience']);
Route::get('experience-details/{id}', [CV_Controller::class, 'Experience_Details']);
Route::get('experience', [CV_Controller::class, 'Experience']);
Route::get('more-education', [CV_Controller::class, 'More_Education']);
Route::get('review-education', [CV_Controller::class, 'Review_Education']);
Route::get('education', [CV_Controller::class, 'Education']);
Route::get('summary', [CV_Controller::class, 'Summary']);
Route::get('finished-resume', [CV_Controller::class, 'Finished_Resume']);
Route::get('experience/delete/{id}', [CV_Controller::class, 'ExperienceDelete']);
Route::get('experience/update/{id}', [CV_Controller::class, 'ExperienceUpdate']);
Route::put('update-experience-info/{id}', [CV_Controller::class, 'ExperienceEdit'])->name('update-experience-info');
Route::put('update-responsibilities/{id}', [CV_Controller::class, 'ResponsibilitiesEdit']);
Route::get('respnosibilities/update/{id}', [CV_Controller::class, 'DisplayRespo']);
Route::get('education/delete/{id}', [CV_Controller::class, 'EducationDelete']);
Route::get('education/update/{id}', [CV_Controller::class, 'EducationUpdate']); 
Route::put('update-education-info/{id}', [CV_Controller::class, 'EducationEdit']);

// <================= Post CV Controller=====================>
Route::put('update/personal-info/{id}', [CV_Controller::class, 'Editpersonal_info'])->name('update.personal_info');
Route::post('personal-info', [CV_Controller::class, 'personal_info'])->name('personal_info');
Route::post('experience-info', [CV_Controller::class, 'experience_info'])->name('experience-info');
Route::post('education-info', [CV_Controller::class, 'education_info'])->name('education-info');
Route::post('reference-info', [CV_Controller::class, 'reference_info'])->name('reference-info');
Route::post('additional-info', [CV_Controller::class, 'addtional_info'])->name('additional-info');

// <================= Update CV Controller=====================>
Route::put('/update-skills', [CV_Controller::class, 'updateSkills'])->name('update-skills');
Route::put('/update-summary', [CV_Controller::class, 'updateSummary'])->name('update-summary');
Route::put('/update-other_details', [CV_Controller::class, 'updateOtherDetails'])->name('update-other_details');

// <================= End CV Controller=====================>



// <================Templates Controller=====================>
Route::get('/preview', [TemplatesController::class, 'TemplatePreview'])->name('preview');
// <================ End Templates Controller=====================>

// <================Templates Controller=====================>
Route::post('select/template', [TemplatesController::class, 'TemplateChoice']);
Route::get('select/color', [TemplatesController::class, 'ColorChoice']);
Route::get('change/template', [TemplatesController::class, 'TemplateChoice']);
Route::get('/custom-templates', [TemplatesController::class, 'TemplatePage'])->name('template-display');
// <================ End Templates Controller=====================>

// <================= admin Controller=====================>
Route::get('admin', [AdminController::class, 'ControlPanel']);
Route::get('suggestions', [AdminController::class, 'Suggestions']);
Route::get('track-jobs', [AdminController::class, 'Pages'])->name('joblists');
Route::get('track-applicants/{id}', [AdminController::class, 'Applicants']);
Route::get('new-testimonials', [AdminController::class, 'UploadTestimonials']);
Route::get('testimonials', [AdminController::class, 'Testimonials']);
Route::get('enquiries', [AdminController::class, 'Enquiries']);
Route::get('applicants/preview/{id}', [AdminController::class, 'PdfPreview'])->name('applicants.pdf');
Route::get('/chat-us', [AdminController::class, 'ChatUs']);
Route::get('account', [AdminController::class, 'Account']);

Route::get('interviews/schedule/{id}', [AdminController::class, 'InterviewPage'])->name('interviews');
Route::post('/send/enquiries', [AdminController::class, 'SendEnquiries']);
Route::post('/send/testimonials', [AdminController::class, 'SendTestimonials']);
Route::get('jobs', [AdminController::class, 'Jobs'])->name('jobpostings');
Route::get('jobs/update/{id}', [AdminController::class, 'UpdateJobs']);
Route::put('jobs/edit/{id}', [AdminController::class, 'EditJobs']);
Route::get('jobs/delete/{id}', [AdminController::class, 'DeleteJobs']);


// <==========Search Routes===========>

Route::get('search/jobs-nearby', [AdminController::class, 'SearchJobsNearBy']);
Route::get('search1', [AdminController::class, 'SearchJobs'])->name('search.jobs1');
Route::get('account/search', [AdminController::class, 'SearchAccount'])->name('search.account');
Route::get('enquiries/search', [AdminController::class, 'SearchEnquiries'])->name('search.enquiries');
Route::get('testimonials/search', [AdminController::class, 'SearchTestimonials'])->name('search.testimonials');
Route::get('track-jobs/search', [AdminController::class, 'SearchTrackJobs'])->name('search.track-jobs');
// <==========End Search Routes===========>

// <==========Chart Display===========>
Route::get('BarChart', [AdminController::class, 'BarChart']);
Route::get('PieChart', [AdminController::class, 'PieChart']);
Route::get('Doughnut', [AdminController::class, 'Doughnut']);
// <================= End admin Controller=====================>


// <================= Employer Controller=====================>
Route::get('employer', [EmployerController::class, 'ControlPanel']);
Route::post('job-application/{id}', [EmployerController::class, 'JobApplication'])->name('job-application');
Route::post('new-jobs', [EmployerController::class, 'JobPostings'])->name('job.post');

// <================= End Employer Controller=====================>


// <================= Select-Resume Form Controller=====================>
Route::post('/process-form', [HomeController::class, 'processForm'])->name('processForm');
Route::get('/new-resume', [HomeController::class, 'showNewResumeForm'])->name('newResume');
Route::get('/upload-resume', [HomeController::class, 'showUploadResumeForm'])->name('uploadResume');
// <================= End Select-Resume Form Controller=====================>


// <============Home Controller================>
Route::get('filter1', [HomeController::class, 'JobSearchNearby'])->name('filter1');
Route::get('filter', [HomeController::class, 'JobSearch'])->name('filter');
Route::get('Index', [HomeController::class, 'LandingPage'])->name('landingpage');
Route::get('/about', [HomeController::class, 'About']);
Route::get('/contact', [HomeController::class, 'Contact']);
Route::get('job-search', [HomeController::class, 'JobSearch'])->name('job-search');
Route::get('jobs-nearby', [HomeController::class, 'JobSearchNearby']);
Route::get('job-details/{id}', [HomeController::class, 'Job_details']);
Route::get('/dashboard', [HomeController::class, 'Index'])->middleware(['auth', 'verified'])->name('dashboard');
// <============Home Controller================>

// <============Profile Controller================>
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// <============Profile Controller================>
require __DIR__ . '/auth.php';
