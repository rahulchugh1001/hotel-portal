<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JobsController; 
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CallCenterController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\CompanyController; 
use App\Http\Controllers\CronController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\GoogleMapController; 
use App\Http\Controllers\ImportController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobIndustryController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\JobTitleController; 
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\JobExperienceController;
use App\Http\Controllers\JobEducationController;
use App\Http\Controllers\JobCourseController;
use App\Http\Controllers\JobCertificateController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController; 
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResumeController; 
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SubRoleController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\TeamController; 
use App\Http\Controllers\frontend\SelfCareController; 
use App\Http\Controllers\frontend\OfficeVisitorController; 
use App\Http\Controllers\frontend\SalaryController; 
use App\Http\Controllers\frontend\AboutUsController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/', function () {
    return view('frontend.index');
});

Route::get('/about-us',[AboutUsController::class,'page'])->name('aboutus');

Auth::routes();
  Route::any('dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/selfcare',[SelfCareController::class,'index'])->name('selfcare');


  //salary import (CSV)
  Route::any('/salary-import',[SalaryController::class,'import'])->name('salaryDataImport');
  

    // candidate auth
   Route::any('candidate/login', [CandidateController::class, 'candidateLogin'])->name('candidate.login');
   Route::any('candidate/signup', [CandidateController::class, 'candidateSignup'])->name('candidate.signup');
   Route::any('candidate/dashboard', [CandidateController::class, 'candidateDashboard'])->name('candidate.dashboard');    

   // agency auth
   Route::any('agency/login', [AgencyController::class, 'agencyLogin'])->name('agency.login');
   Route::any('agency/signup', [AgencyController::class, 'agencySignup'])->name('agency.signup');
   Route::any('agency/dashboard', [AgencyController::class, 'agencyDashboard'])->name('agency.dashboard');    

   // company auth
   Route::any('company/login', [CompanyController::class, 'companyLogin'])->name('company.login');
   Route::any('company/signup', [CompanyController::class, 'companySignup'])->name('company.signup');
   Route::any('company/dashboard', [CompanyController::class, 'companyDashboard'])->name('company.dashboard');

Route::group(['middleware' => ['auth']], function() {

   Route::resource('permissions', PermissionController::class);
   Route::resource('roles', RoleController::class);
   // Route::resource('users', UserController::class);
   Route::any('profile', [UserController::class, 'profile'])->name('users.profile');
   Route::any('profile-agency/{id}', [UserController::class, 'profileAgency'])->name('agency.profile');
   Route::any('profile-company/{id}', [UserController::class, 'profileCompany'])->name('company.profile');
   Route::any('profile-candidate/{id}', [UserController::class, 'profileCandidate'])->name('candidate.profile');
   Route::any('force-login/{id}', [UserController::class, 'forceLogin'])->name('force.login');
   
   

   //user
   Route::any('users', [UserController::class, 'index'])->name('users.index');
   Route::any('users/create', [UserController::class, 'create'])->name('users.create');
   Route::any('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
   Route::any('users/update/{id}', [UserController::class, 'update'])->name('users.update');
   Route::any('users/show', [UserController::class, 'show'])->name('users.show');
   Route::any('users/store', [UserController::class, 'store'])->name('users.store');
	
	//candidate import
	
   Route::any('/import-candidate',[CandidateController::class,'importCandidate'])->name('import-candidate');
  


   //agency
   Route::any('agency', [AgencyController::class, 'index'])->name('agency.index');
   Route::any('agency/create', [AgencyController::class, 'create'])->name('agency.create');
   Route::any('agency/edit/{id}', [AgencyController::class, 'edit'])->name('agency.edit');
   Route::any('agency/update/{id}', [AgencyController::class, 'update'])->name('agency.update');
   Route::any('agency/show', [AgencyController::class, 'show'])->name('agency.show');
   Route::any('agency/store', [AgencyController::class, 'store'])->name('agency.store');
   Route::any('agency/assign', [AgencyController::class, 'assign'])->name('agency.assign');


   // Agency sub users
   Route::any('agency/subuser/list', [AgencyController::class, 'subUserIndex'])->name('agency.sub.user.index');
   Route::any('agency/subuser/create', [AgencyController::class, 'subUserCreate'])->name('agency.sub.user.create');
   Route::any('agency/subuser/edit/{id}', [AgencyController::class, 'subUserEdit'])->name('agency.sub.user.edit');
   Route::any('agency/subuser/update/{id}', [AgencyController::class, 'subUserEdit'])->name('agency.sub.user.subUserupdate');
   Route::any('agency/subuser/subUserCreate', [AgencyController::class, 'subUserCreate'])->name('agency.sub.user.subUserCreate');

   
   //candidate
   Route::any('candidate', [CandidateController::class, 'index'])->name('candidate.index');
   Route::any('candidate/create', [CandidateController::class, 'create'])->name('candidate.create');
   Route::any('candidate/edit/{id}', [CandidateController::class, 'edit'])->name('candidate.edit');
   Route::any('candidate/update/{id}', [CandidateController::class, 'update'])->name('candidate.update');
   Route::any('candidate/show', [CandidateController::class, 'show'])->name('candidate.show');
   Route::any('candidate/store', [CandidateController::class, 'store'])->name('candidate.store');
   Route::any('candidate/assign', [CandidateController::class, 'assign'])->name('candidate.assign');


   
   //company
   Route::any('company', [CompanyController::class, 'index'])->name('company.index');
   Route::any('company/create', [CompanyController::class, 'create'])->name('company.create');
   Route::any('company/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
   Route::any('company/update/{id}', [CompanyController::class, 'update'])->name('company.update');
   Route::any('company/show', [CompanyController::class, 'show'])->name('company.show');
   Route::any('company/store', [CompanyController::class, 'store'])->name('company.store');
   Route::any('company/assign', [CompanyController::class, 'assign'])->name('company.assign');

   // Agency sub users
   Route::any('company/subuser/list', [CompanyController::class, 'subUserIndex'])->name('company.sub.user.index');
   Route::any('company/subuser/create', [CompanyController::class, 'subUserCreate'])->name('company.sub.user.create');
   Route::any('company/subuser/edit/{id}', [CompanyController::class, 'subUserEdit'])->name('company.sub.user.edit');
   Route::any('company/subuser/update/{id}', [CompanyController::class, 'subUserEdit'])->name('company.sub.user.subUserupdate');
   Route::any('company/subuser/subUserCreate', [CompanyController::class, 'subUserCreate'])->name('company.sub.user.subUserCreate');
   
   //setting
   Route::any('setting', [SettingController::class, 'index'])->name('setting.index');
   Route::any('setting/create', [SettingController::class, 'create'])->name('setting.create');
   Route::any('setting/edit/{id}', [SettingController::class, 'edit'])->name('setting.edit');
   Route::any('setting/update/{id}', [SettingController::class, 'update'])->name('setting.update');
   Route::any('setting/show', [SettingController::class, 'show'])->name('setting.show');
   Route::any('setting/store', [SettingController::class, 'store'])->name('setting.store');
   
   //cms
   Route::any('cms', [CmsController::class, 'index'])->name('cms.index');
   Route::any('cms/create', [CmsController::class, 'create'])->name('cms.create');
   Route::any('cms/edit/{id}', [CmsController::class, 'edit'])->name('cms.edit');
   Route::any('cms/update/{id}', [CmsController::class, 'update'])->name('cms.update');
   Route::any('cms/show', [CmsController::class, 'show'])->name('cms.show');
   Route::any('cms/store', [CmsController::class, 'store'])->name('cms.store');
   
   //jobs
   Route::any('jobs', [JobsController::class, 'index'])->name('jobs.index');
   Route::any('jobs/create', [JobsController::class, 'create'])->name('jobs.create');
   Route::any('jobs/edit/{id}', [JobsController::class, 'edit'])->name('jobs.edit');
   Route::any('jobs/update/{id}', [JobsController::class, 'update'])->name('jobs.update');
   Route::any('jobs/show', [JobsController::class, 'show'])->name('jobs.show');
   Route::any('jobs/store', [JobsController::class, 'store'])->name('jobs.store');
   

   // for frontend
   
   Route::any('jobs/search', [CandidateController::class, 'searchJobs'])->name('jobs.search');
   Route::any('jobs/apply', [CandidateController::class, 'appliedJob'])->name('jobs.applied');
   Route::any('jobs/saved', [CandidateController::class, 'savedJob'])->name('jobs.saved');
   Route::any('job/detail', [CandidateController::class, 'jobDetail'])->name('job.detail');

   
   //job category
   Route::any('job-category', [JobCategoryController::class, 'index'])->name('job-category.index');
   Route::any('job-category/create', [JobCategoryController::class, 'create'])->name('job-category.create');
   Route::any('job-category/edit/{id}', [JobCategoryController::class, 'edit'])->name('job-category.edit');
   Route::any('job-category/update/{id}', [JobCategoryController::class, 'update'])->name('job-category.update');
   Route::any('job-category/show', [JobCategoryController::class, 'show'])->name('job-category.show');
   Route::any('job-category/store', [JobCategoryController::class, 'store'])->name('job-category.store');
   
  //job industry
   Route::any('job-industry', [JobIndustryController::class, 'index'])->name('job-industry.index');
   Route::any('job-industry/create', [JobIndustryController::class, 'create'])->name('job-industry.create');
   Route::any('job-industry/edit/{id}', [JobIndustryController::class, 'edit'])->name('job-industry.edit');
   Route::any('job-industry/update/{id}', [JobIndustryController::class, 'update'])->name('job-industry.update');
   Route::any('job-industry/show', [JobIndustryController::class, 'show'])->name('job-industry.show');
   Route::any('job-industry/store', [JobIndustryController::class, 'store'])->name('job-industry.store');
   
   //job position
   Route::any('job-position', [JobPositionController::class, 'index'])->name('job-position.index');
   Route::any('job-position/create', [JobPositionController::class, 'create'])->name('job-position.create');
   Route::any('job-position/edit/{id}', [JobPositionController::class, 'edit'])->name('job-position.edit');
   Route::any('job-position/update/{id}', [JobPositionController::class, 'update'])->name('job-position.update');
   Route::any('job-position/show', [JobPositionController::class, 'show'])->name('job-position.show');
   Route::any('job-position/store', [JobPositionController::class, 'store'])->name('job-position.store');
   
   //job title
   Route::any('job-title', [JobTitleController::class, 'index'])->name('job-title.index');
   Route::any('job-title/create', [JobTitleController::class, 'create'])->name('job-title.create');
   Route::any('job-title/edit/{id}', [JobTitleController::class, 'edit'])->name('job-title.edit');
   Route::any('job-title/update/{id}', [JobTitleController::class, 'update'])->name('job-title.update');
   Route::any('job-title/show', [JobTitleController::class, 'show'])->name('job-title.show');
   Route::any('job-title/store', [JobTitleController::class, 'store'])->name('job-title.store');
   
   
   //job type
   Route::any('job-type', [JobTypeController::class, 'index'])->name('job-type.index');
   Route::any('job-type/create', [JobTypeController::class, 'create'])->name('job-type.create');
   Route::any('job-type/edit/{id}', [JobTypeController::class, 'edit'])->name('job-type.edit');
   Route::any('job-type/update/{id}', [JobTypeController::class, 'update'])->name('job-type.update');
   Route::any('job-type/show', [JobTypeController::class, 'show'])->name('job-type.show');
   Route::any('job-type/store', [JobTypeController::class, 'store'])->name('job-type.store');
   
   //job Experience
   Route::any('job-experience', [JobExperienceController::class, 'index'])->name('job-experience.index');
   Route::any('job-experience/create', [JobExperienceController::class, 'create'])->name('job-experience.create');
   Route::any('job-experience/edit/{id}', [JobExperienceController::class, 'edit'])->name('job-experience.edit');
   Route::any('job-experience/update/{id}', [JobExperienceController::class, 'update'])->name('job-experience.update');
   Route::any('job-experience/show', [JobExperienceController::class, 'show'])->name('job-experience.show');
   Route::any('job-experience/store', [JobExperienceController::class, 'store'])->name('job-experience.store');

   //job Education
   Route::any('job-education', [JobEducationController::class, 'index'])->name('job-education.index');
   Route::any('job-education/create', [JobEducationController::class, 'create'])->name('job-education.create');
   Route::any('job-education/edit/{id}', [JobEducationController::class, 'edit'])->name('job-education.edit');
   Route::any('job-education/update/{id}', [JobEducationController::class, 'update'])->name('job-education.update');
   Route::any('job-education/show', [JobEducationController::class, 'show'])->name('job-education.show');
   Route::any('job-education/store', [JobEducationController::class, 'store'])->name('job-education.store');
   
   //job Course
   Route::any('job-course', [JobCourseController::class, 'index'])->name('job-course.index');
   Route::any('job-course/create', [JobCourseController::class, 'create'])->name('job-course.create');
   Route::any('job-course/edit/{id}', [JobCourseController::class, 'edit'])->name('job-course.edit');
   Route::any('job-course/update/{id}', [JobCourseController::class, 'update'])->name('job-course.update');
   Route::any('job-course/show', [JobCourseController::class, 'show'])->name('job-course.show');
   Route::any('job-course/store', [JobCourseController::class, 'store'])->name('job-course.store');
   
   //job Certificate
   Route::any('job-certificate', [JobCertificateController::class, 'index'])->name('job-certificate.index');
   Route::any('job-certificate/create', [JobCertificateController::class, 'create'])->name('job-certificate.create');
   Route::any('job-certificate/edit/{id}', [JobCertificateController::class, 'edit'])->name('job-certificate.edit');
   Route::any('job-certificate/update/{id}', [JobCertificateController::class, 'update'])->name('job-certificate.update');
   Route::any('job-certificate/show', [JobCertificateController::class, 'show'])->name('job-certificate.show');
   Route::any('job-certificate/store', [JobCertificateController::class, 'store'])->name('job-certificate.store');
   
   
   //status
   Route::any('status', [StatusController::class, 'index'])->name('status.index');
   Route::any('status/create', [StatusController::class, 'create'])->name('status.create');
   Route::any('status/edit/{id}', [StatusController::class, 'edit'])->name('status.edit');
   Route::any('status/update/{id}', [StatusController::class, 'update'])->name('status.update');
   Route::any('status/show', [StatusController::class, 'show'])->name('status.show');
   Route::any('status/store', [StatusController::class, 'store'])->name('status.store');
   

   //Plan
   Route::any('plan', [PlanController::class, 'index'])->name('plan.index');
   Route::any('plan/create', [PlanController::class, 'create'])->name('plan.create');
   Route::any('plan/edit/{id}', [PlanController::class, 'edit'])->name('plan.edit');
   Route::any('plan/update/{id}', [PlanController::class, 'update'])->name('plan.update');
   Route::any('plan/show', [PlanController::class, 'show'])->name('plan.show');
   Route::any('plan/store', [PlanController::class, 'store'])->name('plan.store');
   
   
   //ajax controller
   Route::any('city', [AjaxController::class, 'selectCity'])->name('city.index');
   Route::any('bulk/assign/candidate', [AjaxController::class, 'bulkAssignCandidate'])->name('bulk.assign.candidate');
   Route::any('bulk/assign/company', [AjaxController::class, 'bulkAssignCompany'])->name('bulk.assign.company');
   Route::any('bulk/assign/agency', [AjaxController::class, 'bulkAssignAgency'])->name('bulk.assign.agency');
    Route::any('user/status', [AjaxController::class, 'updateUserStatus'])->name('user.status');
	Route::any('plan/status', [AjaxController::class, 'updatePlanStatus'])->name('plan.status');
	Route::any('job/status', [AjaxController::class, 'updateJobStatus'])->name('job.status');
  
   /*
   Route::any('status/create', [StatusController::class, 'create'])->name('status.create');
   Route::any('status/edit/{id}', [StatusController::class, 'edit'])->name('status.edit');
   Route::any('status/update/{id}', [StatusController::class, 'update'])->name('status.update');
   Route::any('status/show', [StatusController::class, 'show'])->name('status.show');
   Route::any('status/store', [StatusController::class, 'store'])->name('status.store');
   */
   
   //import
   Route::any('import', [ImportController::class, 'index'])->name('import.index');


   //company job message
   Route::any('job-message', [MessageController::class, 'index'])->name('message.index');


   //interview
   Route::any('interviews', [InterviewController::class, 'index'])->name('interview.index');


   //report
   Route::any('reports', [ReportController::class, 'index'])->name('report.index');


   //payroll
   Route::any('payroll', [PayrollController::class, 'index'])->name('payroll.index');


   //call center
   Route::any('call-center', [CallCenterController::class, 'index'])->name('callcenter.index');





   
   
   Route::resource('posts', PostController::class);
   Route::resource('products', ProductController::class);      

/*  
  Route::group(['middleware' => ['role:product-manager']], function () {
     Route::resource('products', ProductController::class);  
   });
*/

   //Route::resource('jobs', JobsController::class);  
   
});   




