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


Route::get('/', function(){
    return view('splashscreen');
});

// <================= Upload & Processing CV Controller=====================>
Route::get('/cv/upload', [PDF_TO_TEXTController::class, 'showForm']);
Route::post('/cv/process', [PDF_TO_TEXTController::class, 'processCV'])->name('cv.process');
// <================= End Upload & Processing CV Controller=====================>


Route::get('MS-Word', [WordController::class, 'convertHtmlToWord']);
Route::get('/PDF/{templateNumber}', [PdfController::class, 'convertBladeToPdf'])->name('pdf.download');


// <================= CV Controller=====================>
Route::get('select-resume', [CV_Controller::class, 'select_resume']);
Route::get('reference', [CV_Controller::class, 'Reference']);
Route::get('more-reference', [CV_Controller::class, 'More_Reference']);
Route::get('review-reference', [CV_Controller::class, 'Review_Reference']);
Route::get('additional-details', [CV_Controller::class, 'Additional_Details']);
Route::get('finalize', [CV_Controller::class, 'Finalize']);
Route::get('skills', [CV_Controller::class, 'Skills']);
Route::get('more-experience', [CV_Controller::class, 'More_Experience']);
Route::get('review-experience', [CV_Controller::class, 'Review_Experience']);
Route::get('experience-details', [CV_Controller::class, 'Experience_Details']);
Route::get('experience', [CV_Controller::class, 'Experience']);
Route::get('more-education', [CV_Controller::class, 'More_Education']);
Route::get('review-education', [CV_Controller::class, 'Review_Education']);
Route::get('education', [CV_Controller::class, 'Education']);
Route::get('summary',[ CV_Controller::class, 'Summary']);
Route::get('finished-resume', [CV_Controller::class, 'Finished_Resume']);
Route::get('preview-resume', [CV_Controller::class, 'Preview_Resume']);


// <================= Post CV Controller=====================>
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
Route::get('/template5', [TemplatesController::class, 'Template5'])->name('template5');
Route::get('/template4', [TemplatesController::class, 'Template4'])->name('template4');
Route::get('/template3', [TemplatesController::class, 'Template3'])->name('template3');
Route::get('/template2', [TemplatesController::class, 'Template2'])->name('template2');
Route::get('/template1', [TemplatesController::class, 'Template1'])->name('template1');
Route::get('/preview',[TemplatesController::class, 'TemplatePreview'])->name('preview');
// <================ End Templates Controller=====================>

// <================Templates Controller=====================>
Route::get('modern1', function(){
    return view('ResumeTemplates.modern1');
});
Route::get('/template1', [TemplatesController::class, 'Template1']);
Route::get('/custom-templates', [TemplatesController::class, 'TemplatePage'])->name('template-display');
// <================ End Templates Controller=====================>

// <================= admin Controller=====================>
Route::get('admin', [AdminController::class, 'ControlPanel']);
Route::get('suggestions', [AdminController::class, 'Suggestions']);
Route::get('pages', [AdminController::class, 'Pages']);
Route::get('account', [AdminController::class, 'Account']);
Route::get('jobs', [AdminController::class, 'Jobs']);
// <================= End admin Controller=====================>


// <================= Employer Controller=====================>
Route::get('employer', [EmployerController::class, 'ControlPanel']);
// <================= End Employer Controller=====================>


// <================= Select-Resume Form Controller=====================>
Route::post('/process-form', [HomeController::class, 'processForm'])->name('processForm');
Route::get('/new-resume', [HomeController::class, 'showNewResumeForm'])->name('newResume');
Route::get('/upload-resume', [HomeController::class, 'showUploadResumeForm'])->name('uploadResume');
// <================= End Select-Resume Form Controller=====================>


// <============Home Controller================>
Route::get('Index', [HomeController::class, 'LandingPage'])->name('landingpage');
Route::get('/about', [HomeController::class, 'About']);
Route::get('/contact', [HomeController::class, 'Contact']);
Route::get('job-search', [HomeController::class, 'JobSearch']);
Route::get('jobs-nearby', [HomeController::class, 'JobSearchNearby']);
Route::get('job-details', [HomeController::class, 'Job_details']);
Route::get('/dashboard',[HomeController::class, 'Index'])->middleware(['auth', 'verified'])->name('dashboard');
// <============Home Controller================>

// <============Profile Controller================>
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// <============Profile Controller================>
require __DIR__.'/auth.php';
