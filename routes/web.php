<?php

use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\AuthorC;
use App\Http\Controllers\admin\BlogC;
use App\Http\Controllers\admin\BlogCategoryC;
use App\Http\Controllers\admin\BlogContentC;
use App\Http\Controllers\admin\BlogFaqC;
use App\Http\Controllers\admin\CareerC;
use App\Http\Controllers\admin\CourseCategoryC;
use App\Http\Controllers\admin\CourseModeC;
use App\Http\Controllers\admin\CourseSpecializationC;
use App\Http\Controllers\admin\DefaultOgImageC;
use App\Http\Controllers\admin\DestinationArticleC;
use App\Http\Controllers\admin\DestinationArticleContentC;
use App\Http\Controllers\admin\DestinationArticleFaqsC;
use App\Http\Controllers\admin\DestinationC;
use App\Http\Controllers\admin\DestinationFaqC;
use App\Http\Controllers\admin\DynamicPageSeoC;
use App\Http\Controllers\admin\EmployeeC;
use App\Http\Controllers\admin\EmployeeStatusC;
use App\Http\Controllers\admin\ExamC;
use App\Http\Controllers\admin\ExamContentC;
use App\Http\Controllers\admin\ExamFaqC;
use App\Http\Controllers\admin\ExamPageTabC;
use App\Http\Controllers\admin\ExamPageTabContentC;
use App\Http\Controllers\admin\ExamTabFaqC;
use App\Http\Controllers\admin\FaqC;
use App\Http\Controllers\admin\FaqCategoryC;
use App\Http\Controllers\admin\FeesAndDeadlineC;
use App\Http\Controllers\admin\InstituteTypeC;
use App\Http\Controllers\admin\JobApplicationC;
use App\Http\Controllers\admin\JobPageC;
use App\Http\Controllers\admin\JobPageTabC;
use App\Http\Controllers\admin\JobPageTabContentC;
use App\Http\Controllers\admin\LevelC;
use App\Http\Controllers\admin\ProgramC;
use App\Http\Controllers\admin\SeoC;
use App\Http\Controllers\admin\ServiceC;
use App\Http\Controllers\admin\ServiceContentC;
use App\Http\Controllers\admin\StudentC;
use App\Http\Controllers\admin\StudyModeC;
use App\Http\Controllers\admin\TestimonialC;
use App\Http\Controllers\admin\UniversityC;
use App\Http\Controllers\admin\UniversityGalleryC;
use App\Http\Controllers\admin\UniversityOtherContentC;
use App\Http\Controllers\admin\UniversityOverviewC;
use App\Http\Controllers\admin\UniversityProgramC;
use App\Http\Controllers\admin\UniversityReviewC;
use App\Http\Controllers\admin\UniversityScholarshipC;
use App\Http\Controllers\admin\UniversityScholarshipContentC;
use App\Http\Controllers\admin\UniversityVideoGalleryC;
use App\Http\Controllers\admin\UploadFilesC;
use App\Http\Controllers\admin\UrlRedirectionC;
use App\Http\Controllers\admin\UserC;
use App\Http\Controllers\CareerFc;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\front\AboutFc;
use App\Http\Controllers\front\AuthorFc;
use App\Http\Controllers\front\BlogFc;
use App\Http\Controllers\front\CompareFc;
use App\Http\Controllers\front\ContactFc;
use App\Http\Controllers\front\DestinationFc;
use App\Http\Controllers\front\DestinationArticleFc;
use App\Http\Controllers\front\ExamFc;
use App\Http\Controllers\front\HomeFc;
use App\Http\Controllers\front\InquiryController;
use App\Http\Controllers\front\JobPageFc;
use App\Http\Controllers\front\ServiceFc;
use App\Http\Controllers\front\StudentServiceFc;
use App\Http\Controllers\front\TeamFc;
use App\Http\Controllers\front\UniversityCourseListFc;
use App\Http\Controllers\front\UniversityProgramListFc;
use App\Http\Controllers\front\UniversityFc;
use App\Http\Controllers\front\UniversityListFc;
use App\Http\Controllers\front\UniversityOtherTabFc;
use App\Http\Controllers\front\UniversityProfileFc;
use App\Http\Controllers\front\UniversityReviewFc;
use App\Http\Controllers\front\UniversityScholarshipListFc;
use App\Http\Controllers\sitemap\SitemapController;
use App\Http\Controllers\student\ApplyProgramFc;
use App\Http\Controllers\student\BookDemoC;
use App\Http\Controllers\student\StudentFc;
use App\Http\Controllers\student\StudentLoginFc;
use App\Http\Controllers\TestController;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Destination;
use App\Models\Exam;
use App\Models\JobPage;
use App\Models\Service;
use App\Models\University;
use App\Models\UniversityProgram;
use App\Models\UrlRedirection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//   return view('startpage');
// });


//Reoptimized class loader:
Route::get('/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return '<h1>Reoptimized class loader</h1>';
});
//Reoptimized class loader:
Route::get('/optimize-clear', function () {
  $exitCode = Artisan::call('optimize:clear');
  return '<h1>Reoptimized class loader</h1>';
});
Route::get('/f/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return true;
});

//For MIgrate:
Route::get('/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return '<h1>Migrated</h1>';
});
Route::get('/f/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return true;
});

/* STUDENT ROUTES BEFORE LOGIN */
Route::middleware(['studentLoggedOut'])->group(function () {
  Route::get('/sign-up', [StudentLoginFc::class, 'signup']);
  Route::post('/sign-up', [StudentLoginFc::class, 'register']);
  Route::get('/sign-in', [StudentLoginFc::class, 'login']);
  Route::post('/login', [StudentLoginFc::class, 'signin']);
  Route::get('/confirmed-email', [StudentLoginFc::class, 'confirmedEmail']);
  Route::post('/submit-email-otp', [StudentLoginFc::class, 'submitOtp']);
  Route::get('/account/password/reset', [StudentLoginFc::class, 'viewForgetPassword']);
  Route::post('/forget-password', [StudentLoginFc::class, 'forgetPassword']);
  Route::get('/forget-password/email-sent', [StudentLoginFc::class, 'emailSent']);
  Route::get('/email-login', [StudentLoginFc::class, 'emailLogin']);
  Route::get('/password/reset', [StudentLoginFc::class, 'viewResetPassword']);
  Route::post('/reset-password', [StudentLoginFc::class, 'resetPassword']);
  Route::get('/account/invalid_link', [StudentLoginFc::class, 'invalidLink']);
});
/* STUDENT ROUTES AFTER LOGIN */
Route::middleware(['studentLoggedIn'])->group(function () {
  Route::prefix('/student')->group(function () {
    Route::get('/delete-school/{id}', [StudentFc::class, 'deleteSchool']);
    Route::prefix('profile')->group(function () {
      Route::get('', [StudentFc::class, 'profile']);
      Route::post('/update', [StudentFc::class, 'updateProfile']);
    });
    Route::get('/change-password', [StudentFc::class, 'viewChangePassword']);
    Route::post('/change-password', [StudentFc::class, 'changePassword']);
    Route::get('/applied-college', [StudentFc::class, 'appliedCollege']);
    Route::get('/shortlist', [StudentFc::class, 'shortlist']);
    Route::get('/account-settings', [StudentFc::class, 'settings']);

    Route::post('/personal-information', [StudentFc::class, 'submitPersonalInfo'])->name('pi');
    Route::post('/education-summary', [StudentFc::class, 'submitEduSum'])->name('education.summary');
    Route::post('/add-school', [StudentFc::class, 'addSchool'])->name('add.school');
    Route::post('/update-school', [StudentFc::class, 'updateSchool'])->name('update.school');
    Route::post('/update-test-score', [StudentFc::class, 'updateTestScore'])->name('update.test.score');
    Route::post('/update-gre-score', [StudentFc::class, 'updateGRE'])->name('update.gre.score');
    Route::post('/update-gmat-score', [StudentFc::class, 'updateGMAT'])->name('update.gmat.score');
    Route::post('/update-sat-score', [StudentFc::class, 'updateSAT'])->name('update.sat.score');
    Route::post('/update-background-info', [StudentFc::class, 'updateBI'])->name('update.bi');
    Route::post('/upload-documents', [StudentFc::class, 'updateDocs'])->name('upload.document');

    Route::get('/apply-program', [ApplyProgramFc::class, 'applyProgram']);
    Route::get('/shortlist-program', [ApplyProgramFc::class, 'shortlistProgram']);
    Route::get('/delete-program/{id}', [StudentFc::class, 'deleteProgram']);
    Route::get('/logout', function () {
      session()->forget('studentLoggedIn');
      session()->forget('student_id');
      return redirect('sign-in');
    });
  });
});

/* ADMIN ROUTES BEFORE LOGIN */
Route::middleware(['adminLoggedOut'])->group(function () {
  Route::prefix('/admin')->group(function () {
    Route::get('/login/', [AdminLogin::class, 'index']);
    Route::post('/login/', [AdminLogin::class, 'login']);
    Route::get('/account/password/reset', [AdminLogin::class, 'viewForgetPassword']);
    Route::post('/forget-password', [AdminLogin::class, 'forgetPassword']);
    Route::get('/forget-password/email-sent', [AdminLogin::class, 'emailSent']);
    Route::get('/email-login', [AdminLogin::class, 'emailLogin']);
    Route::get('/password/reset', [AdminLogin::class, 'viewResetPassword']);
    Route::post('/reset-password', [AdminLogin::class, 'resetPassword']);
    Route::get('/account/invalid_link', [AdminLogin::class, 'invalidLink']);
  });
});
/* ADMIN ROUTES AFTER LOGIN */
Route::middleware(['adminLoggedIn'])->group(function () {
  Route::get('/admin/logout/', function () {
    session()->forget('adminLoggedIn');
    return redirect('admin/login');
  });
  Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminDashboard::class, 'index']);
    Route::get('/dashboard', [AdminDashboard::class, 'index']);
    Route::get('/profile', [AdminDashboard::class, 'profile']);
    Route::post('/update-profile', [AdminDashboard::class, 'updateProfile']);

    Route::prefix('/destinations')->group(function () {
      Route::get('', [DestinationC::class, 'index']);
      Route::post('/store', [DestinationC::class, 'store']);
      Route::get('/delete/{id}', [DestinationC::class, 'delete']);
      Route::get('/update/{id}', [DestinationC::class, 'index']);
      Route::post('/update/{id}', [DestinationC::class, 'update']);
    });
    Route::prefix('/destination-faqs')->group(function () {
      Route::get('/get-data', [DestinationFaqC::class, 'getData']);
      Route::get('/delete/{id}', [DestinationFaqC::class, 'delete']);
      Route::post('/store', [DestinationFaqC::class, 'store']);
      Route::get('/{destination_id}/', [DestinationFaqC::class, 'index']);
      Route::get('/{destination_id}/update/{id}', [DestinationFaqC::class, 'index']);
      Route::post('/{destination_id}/update/{id}', [DestinationFaqC::class, 'update']);
    });

    Route::prefix('/course-category')->group(function () {
      Route::get('', [CourseCategoryC::class, 'index']);
      Route::post('/store', [CourseCategoryC::class, 'store']);
      Route::get('/delete/{id}', [CourseCategoryC::class, 'delete']);
      Route::get('/update/{id}', [CourseCategoryC::class, 'index']);
      Route::post('/update/{id}', [CourseCategoryC::class, 'update']);
      Route::post('/import', [CourseCategoryC::class, 'import']);
    });
    Route::prefix('/course-specialization')->group(function () {
      Route::get('', [CourseSpecializationC::class, 'index']);
      Route::post('/store', [CourseSpecializationC::class, 'store']);
      Route::get('/delete/{id}', [CourseSpecializationC::class, 'delete']);
      Route::get('/update/{id}', [CourseSpecializationC::class, 'index']);
      Route::post('/update/{id}', [CourseSpecializationC::class, 'update']);
      Route::post('/import', [CourseSpecializationC::class, 'import']);
      Route::get('/export', [CourseSpecializationC::class, 'export']);
      Route::get('/get-by-category', [CourseSpecializationC::class, 'getByCategory']);
    });
    Route::prefix('/programs')->group(function () {
      Route::get('', [ProgramC::class, 'index']);
      Route::post('/store', [ProgramC::class, 'store']);
      Route::get('/delete/{id}', [ProgramC::class, 'delete']);
      Route::get('/update/{id}', [ProgramC::class, 'index']);
      Route::post('/update/{id}', [ProgramC::class, 'update']);
      Route::post('/import', [ProgramC::class, 'import']);
      Route::get('/get-by-spc-and-cat', [ProgramC::class, 'getBySpcCat']);
    });
    Route::prefix('/levels')->group(function () {
      Route::get('', [LevelC::class, 'index']);
      Route::post('/store', [LevelC::class, 'store']);
      Route::get('/delete/{id}', [LevelC::class, 'delete']);
      Route::get('/update/{id}', [LevelC::class, 'index']);
      Route::post('/update/{id}', [LevelC::class, 'update']);
      Route::post('/import', [LevelC::class, 'import']);
    });

    Route::prefix('/institute-types')->group(function () {
      Route::get('', [InstituteTypeC::class, 'index']);
      Route::post('/store', [InstituteTypeC::class, 'store']);
      Route::get('/delete/{id}', [InstituteTypeC::class, 'delete']);
      Route::get('/update/{id}', [InstituteTypeC::class, 'index']);
      Route::post('/update/{id}', [InstituteTypeC::class, 'update']);
    });
    Route::prefix('/study-modes')->group(function () {
      Route::get('', [StudyModeC::class, 'index']);
      Route::post('/store', [StudyModeC::class, 'store']);
      Route::get('/delete/{id}', [StudyModeC::class, 'delete']);
      Route::get('/update/{id}', [StudyModeC::class, 'index']);
      Route::post('/update/{id}', [StudyModeC::class, 'update']);
    });
    Route::prefix('/course-modes')->group(function () {
      Route::get('', [CourseModeC::class, 'index']);
      Route::post('/store', [CourseModeC::class, 'store']);
      Route::get('/delete/{id}', [CourseModeC::class, 'delete']);
      Route::get('/update/{id}', [CourseModeC::class, 'index']);
      Route::post('/update/{id}', [CourseModeC::class, 'update']);
    });
    Route::prefix('/university')->group(function () {
      Route::get('add', [UniversityC::class, 'add']);
      Route::get('', [UniversityC::class, 'index']);
      Route::post('/store', [UniversityC::class, 'store']);
      Route::get('/delete/{id}', [UniversityC::class, 'delete']);
      Route::get('/update/{id}', [UniversityC::class, 'add']);
      Route::post('/update/{id}', [UniversityC::class, 'update']);
      Route::post('/import', [UniversityC::class, 'import']);
      Route::post('/bulk-update-import', [UniversityC::class, 'bulkUpdateImport']);
      Route::get('/export', [UniversityC::class, 'export']);
    });

    Route::get('/get-state-by-country', [UniversityC::class, 'getStateByCountry']);
    Route::get('/get-city-by-state', [UniversityC::class, 'getCityByState']);

    Route::prefix('/university-overview')->group(function () {
      Route::get('/{university_id}', [UniversityOverviewC::class, 'index']);
      Route::post('/{university_id}/store', [UniversityOverviewC::class, 'store']);
      Route::get('/delete/{id}', [UniversityOverviewC::class, 'delete']);
      Route::get('/{university_id}/update/{id}', [UniversityOverviewC::class, 'index']);
      Route::post('/{university_id}/update/{id}', [UniversityOverviewC::class, 'update']);
    });
    Route::prefix('/university-programs')->group(function () {
      Route::get('/{university_id}', [UniversityProgramC::class, 'index']);
      Route::post('/{university_id}/store', [UniversityProgramC::class, 'store']);
      Route::get('/delete/{id}', [UniversityProgramC::class, 'delete']);
      Route::get('/{university_id}/update/{id}', [UniversityProgramC::class, 'index']);
      Route::post('/{university_id}/update/{id}', [UniversityProgramC::class, 'update']);
      Route::post('/{university_id}/import', [UniversityProgramC::class, 'import']);
      Route::post('/{university_id}/bulk-update-import', [UniversityProgramC::class, 'bulkUpdateImport']);
      Route::get('/{university_id}/export', [UniversityProgramC::class, 'export']);
    });
    Route::prefix('/university-gallery')->group(function () {
      Route::get('/{university_id}', [UniversityGalleryC::class, 'index']);
      Route::post('/{university_id}/store', [UniversityGalleryC::class, 'store']);
      Route::get('/delete/{id}', [UniversityGalleryC::class, 'delete']);
      Route::get('/{university_id}/update/{id}', [UniversityGalleryC::class, 'index']);
      Route::post('/{university_id}/update/{id}', [UniversityGalleryC::class, 'update']);
    });
    Route::prefix('/university-video-gallery')->group(function () {
      Route::get('/{university_id}', [UniversityVideoGalleryC::class, 'index']);
      Route::post('/{university_id}/store', [UniversityVideoGalleryC::class, 'store']);
      Route::get('/delete/{id}', [UniversityVideoGalleryC::class, 'delete']);
      Route::get('/{university_id}/update/{id}', [UniversityVideoGalleryC::class, 'index']);
      Route::post('/{university_id}/update/{id}', [UniversityVideoGalleryC::class, 'update']);
    });
    Route::prefix('/fees-and-deadline')->group(function () {
      Route::get('/{university_id}', [FeesAndDeadlineC::class, 'index']);
      Route::post('/{university_id}/store', [FeesAndDeadlineC::class, 'store']);
      Route::get('/delete/{id}', [FeesAndDeadlineC::class, 'delete']);
      Route::get('/{university_id}/update/{id}', [FeesAndDeadlineC::class, 'index']);
      Route::post('/{university_id}/update/{id}', [FeesAndDeadlineC::class, 'update']);
    });
    Route::prefix('/other-content')->group(function () {
      Route::get('/get-data', [UniversityOtherContentC::class, 'getData']);
      Route::get('/delete/{id}', [UniversityOtherContentC::class, 'delete']);
      Route::post('/store', [UniversityOtherContentC::class, 'store']);
      Route::get('/{university_id}/', [UniversityOtherContentC::class, 'index']);
      Route::get('/{university_id}/update/{id}', [UniversityOtherContentC::class, 'index']);
      Route::post('/{university_id}/update/{id}', [UniversityOtherContentC::class, 'update']);
    });
    Route::prefix('/services')->group(function () {
      Route::get('', [ServiceC::class, 'index']);
      Route::post('/store', [ServiceC::class, 'store']);
      Route::get('/delete/{id}', [ServiceC::class, 'delete']);
      Route::get('/update/{id}', [ServiceC::class, 'index']);
      Route::post('/update/{id}', [ServiceC::class, 'update']);
    });
    Route::prefix('/service-content')->group(function () {
      Route::get('/{service_id}', [ServiceContentC::class, 'index']);
      Route::post('/{service_id}/store', [ServiceContentC::class, 'store']);
      Route::get('/delete/{id}', [ServiceContentC::class, 'delete']);
      Route::get('/{service_id}/update/{id}', [ServiceContentC::class, 'index']);
      Route::post('/{service_id}/update/{id}', [ServiceContentC::class, 'update']);
    });
    Route::prefix('/exams')->group(function () {
      Route::get('', [ExamC::class, 'index']);
      Route::post('/store', [ExamC::class, 'store']);
      Route::get('/delete/{id}', [ExamC::class, 'delete']);
      Route::get('/update/{id}', [ExamC::class, 'index']);
      Route::post('/update/{id}', [ExamC::class, 'update']);
    });
    Route::prefix('/exam-page-tabs')->group(function () {
      Route::get('/get-tabs', [ExamPageTabC::class, 'getTabs']);
      Route::get('/get-data', [ExamPageTabC::class, 'getData']);
      Route::get('/delete/{id}', [ExamPageTabC::class, 'delete']);
      Route::post('/store', [ExamPageTabC::class, 'store']);
      Route::get('/{exam_id}/', [ExamPageTabC::class, 'index']);
      Route::get('/{exam_id}/update/{id}', [ExamPageTabC::class, 'index']);
      Route::post('/{exam_id}/update/{id}', [ExamPageTabC::class, 'update']);
    });
    Route::prefix('/exam-page-tab-contents')->group(function () {
      Route::get('/get-headings', [ExamPageTabContentC::class, 'getHeadings']);
      Route::get('/get-data', [ExamPageTabContentC::class, 'getData']);
      Route::get('/delete/{id}', [ExamPageTabContentC::class, 'delete']);
      Route::post('/store', [ExamPageTabContentC::class, 'store']);
      Route::get('/{tab_id}/', [ExamPageTabContentC::class, 'index']);
      Route::get('/{tab_id}/update/{id}', [ExamPageTabContentC::class, 'index']);
      Route::post('/{tab_id}/update/{id}', [ExamPageTabContentC::class, 'update']);
    });
    Route::prefix('/job-pages')->group(function () {
      Route::get('', [JobPageC::class, 'index']);
      Route::post('/store', [JobPageC::class, 'store']);
      Route::get('/delete/{id}', [JobPageC::class, 'delete']);
      Route::get('/update/{id}', [JobPageC::class, 'index']);
      Route::post('/update/{id}', [JobPageC::class, 'update']);
    });
    Route::prefix('/job-page-tabs')->group(function () {
      Route::get('/get-data', [JobPageTabC::class, 'getData']);
      Route::get('/delete/{id}', [JobPageTabC::class, 'delete']);
      Route::post('/store', [JobPageTabC::class, 'store']);
      Route::get('/{page_id}/', [JobPageTabC::class, 'index']);
      Route::get('/{page_id}/update/{id}', [JobPageTabC::class, 'index']);
      Route::post('/{page_id}/update/{id}', [JobPageTabC::class, 'update']);
    });
    Route::prefix('/job-page-tab-contents')->group(function () {
      Route::get('/get-data', [JobPageTabContentC::class, 'getData']);
      Route::get('/delete/{id}', [JobPageTabContentC::class, 'delete']);
      Route::post('/store', [JobPageTabContentC::class, 'store']);
      Route::get('/{tab_id}/', [JobPageTabContentC::class, 'index']);
      Route::get('/{tab_id}/update/{id}', [JobPageTabContentC::class, 'index']);
      Route::post('/{tab_id}/update/{id}', [JobPageTabContentC::class, 'update']);
    });
    Route::prefix('/exam-tab-faqs')->group(function () {
      Route::get('/get-data', [ExamTabFaqC::class, 'getData']);
      Route::get('/delete/{id}', [ExamTabFaqC::class, 'delete']);
      Route::post('/store', [ExamTabFaqC::class, 'store']);
      Route::get('/{exam_id}/', [ExamTabFaqC::class, 'index']);
      Route::get('/{exam_id}/update/{id}', [ExamTabFaqC::class, 'index']);
      Route::post('/{exam_id}/update/{id}', [ExamTabFaqC::class, 'update']);
    });
    Route::prefix('/exam-faqs')->group(function () {
      Route::get('/get-data', [ExamFaqC::class, 'getData']);
      Route::get('/delete/{id}', [ExamFaqC::class, 'delete']);
      Route::post('/store', [ExamFaqC::class, 'store']);
      Route::get('/{exam_id}/', [ExamFaqC::class, 'index']);
      Route::get('/{exam_id}/update/{id}', [ExamFaqC::class, 'index']);
      Route::post('/{exam_id}/update/{id}', [ExamFaqC::class, 'update']);
    });
    Route::prefix('/exam-content')->group(function () {
      Route::get('/{exam_id}', [ExamContentC::class, 'index']);
      Route::post('/{exam_id}/store', [ExamContentC::class, 'store']);
      Route::get('/delete/{id}', [ExamContentC::class, 'delete']);
      Route::get('/{exam_id}/update/{id}', [ExamContentC::class, 'index']);
      Route::post('/{exam_id}/update/{id}', [ExamContentC::class, 'update']);
    });

    Route::prefix('/blog-category')->group(function () {
      Route::get('', [BlogCategoryC::class, 'index']);
      Route::post('/store', [BlogCategoryC::class, 'store']);
      Route::get('/delete/{id}', [BlogCategoryC::class, 'delete']);
      Route::get('/update/{id}', [BlogCategoryC::class, 'index']);
      Route::post('/update/{id}', [BlogCategoryC::class, 'update']);
    });
    Route::prefix('/blogs')->group(function () {
      Route::get('', [BlogC::class, 'index']);
      Route::post('/store', [BlogC::class, 'store']);
      Route::get('/delete/{id}', [BlogC::class, 'delete']);
      Route::get('/update/{id}', [BlogC::class, 'index']);
      Route::post('/update/{id}', [BlogC::class, 'update']);
    });
    Route::prefix('/blog-contents/')->group(function () {
      Route::get('/get-data', [BlogContentC::class, 'getData']);
      Route::get('/get-position', [BlogContentC::class, 'getPosition']);
      Route::get('/delete/{id}', [BlogContentC::class, 'delete']);
      Route::post('/store', [BlogContentC::class, 'store']);
      Route::get('/{blog_id}/', [BlogContentC::class, 'index']);
      Route::get('{blog_id}/update/{id}', [BlogContentC::class, 'index']);
      Route::post('{blog_id}/update/{id}', [BlogContentC::class, 'update']);
    });
    Route::prefix('/blog-faqs/')->group(function () {
      Route::get('/get-data', [BlogFaqC::class, 'getData']);
      Route::get('/delete/{id}', [BlogFaqC::class, 'delete']);
      Route::post('/store', [BlogFaqC::class, 'store']);
      Route::get('/{blog_id}/', [BlogFaqC::class, 'index']);
      Route::get('{blog_id}/update/{id}', [BlogFaqC::class, 'index']);
      Route::post('{blog_id}/update/{id}', [BlogFaqC::class, 'update']);
    });

    Route::prefix('/users')->group(function () {
      Route::get('', [UserC::class, 'index']);
      Route::post('/store', [UserC::class, 'store']);
      Route::get('/delete/{id}', [UserC::class, 'delete']);
      Route::get('/update/{id}', [UserC::class, 'index']);
      Route::post('/update/{id}', [UserC::class, 'update']);
    });
    Route::prefix('/employees')->group(function () {
      Route::get('', [EmployeeC::class, 'index']);
      Route::post('/store', [EmployeeC::class, 'store']);
      Route::get('/get-data', [EmployeeC::class, 'getData']);
      Route::get('/delete/{id}', [EmployeeC::class, 'delete']);
      Route::get('/update/{id}', [EmployeeC::class, 'index']);
      Route::post('/update/{id}', [EmployeeC::class, 'update']);
    });
    Route::prefix('/employee-statuses')->group(function () {
      Route::get('', [EmployeeStatusC::class, 'index']);
      Route::post('/store', [EmployeeStatusC::class, 'store']);
      Route::get('/get-data', [EmployeeStatusC::class, 'getData']);
      Route::get('/delete/{id}', [EmployeeStatusC::class, 'delete']);
      Route::get('/update/{id}', [EmployeeStatusC::class, 'index']);
      Route::post('/update/{id}', [EmployeeStatusC::class, 'update']);
    });

    Route::prefix('/seos')->group(function () {
      Route::get('/', [SeoC::class, 'index']);
      Route::post('/store/', [SeoC::class, 'store']);
      Route::get('/delete/{id}/', [SeoC::class, 'delete']);
      Route::get('/update/{id}/', [SeoC::class, 'index']);
      Route::post('/update/{id}/', [SeoC::class, 'update']);
    });
    Route::prefix('/dynamic-page-seos')->group(function () {
      Route::get('/', [DynamicPageSeoC::class, 'index']);
      Route::get('add/', [DynamicPageSeoC::class, 'index']);
      Route::post('/store/', [DynamicPageSeoC::class, 'store']);
      Route::get('/delete/{id}/', [DynamicPageSeoC::class, 'delete']);
      Route::get('/update/{id}/', [DynamicPageSeoC::class, 'index']);
      Route::post('/update/{id}/', [DynamicPageSeoC::class, 'update']);
    });
    Route::prefix('/default-og-image')->group(function () {
      Route::get('/', [DefaultOgImageC::class, 'index']);
      Route::get('add/', [DefaultOgImageC::class, 'index']);
      Route::post('/store/', [DefaultOgImageC::class, 'store']);
      Route::get('/delete/{id}/', [DefaultOgImageC::class, 'delete']);
      Route::get('/update/{id}/', [DefaultOgImageC::class, 'index']);
      Route::post('/update/{id}/', [DefaultOgImageC::class, 'update']);
    });

    Route::prefix('/university-scholarships/')->group(function () {
      Route::get('/get-data', [UniversityScholarshipC::class, 'getData']);
      Route::get('/delete/{id}', [UniversityScholarshipC::class, 'delete']);
      Route::post('/store', [UniversityScholarshipC::class, 'store']);
      Route::get('/{university_id}/', [UniversityScholarshipC::class, 'index']);
      Route::get('{university_id}/update/{id}', [UniversityScholarshipC::class, 'index']);
      Route::post('{university_id}/update/{id}', [UniversityScholarshipC::class, 'update']);
    });
    Route::prefix('/university-scholarship-contents/')->group(function () {
      Route::get('/get-data', [UniversityScholarshipContentC::class, 'getData']);
      Route::get('/delete/{id}', [UniversityScholarshipContentC::class, 'delete']);
      Route::post('/store', [UniversityScholarshipContentC::class, 'store']);
      Route::get('/{scholarship_id}/', [UniversityScholarshipContentC::class, 'index']);
      Route::get('{scholarship_id}/update/{id}', [UniversityScholarshipContentC::class, 'index']);
      Route::post('{scholarship_id}/update/{id}', [UniversityScholarshipContentC::class, 'update']);
    });
    Route::prefix('leads')->group(function () {
      Route::get('', [StudentC::class, 'index']);
      Route::get('/add', [StudentC::class, 'add']);
      Route::get('/update/{id}', [StudentC::class, 'add']);
      Route::post('/update/{id}', [StudentC::class, 'update']);
      Route::get('/delete/{id}', [StudentC::class, 'delete']);
      Route::post('/store', [StudentC::class, 'store']);
      Route::get('get-quick-info', [StudentC::class, 'getQuickInfo']);
      Route::get('/update-quick-info/', [StudentC::class, 'updateQuickInfo']);
      Route::get('/fetch-last-updated-record/{id}', [StudentC::class, 'fetchLastRecord']);


      Route::get('/add2', [StudentC::class, 'add2']);
      Route::post('/store', [StudentC::class, 'store']);
    });
    Route::prefix('/university-reviews')->group(function () {
      Route::get('/', [UniversityReviewC::class, 'index']);
      Route::get('/get-data', [UniversityReviewC::class, 'getData']);
      Route::get('/delete/{id}', [UniversityReviewC::class, 'delete']);
      Route::post('/store', [UniversityReviewC::class, 'store']);
      Route::get('/update/{id}', [UniversityReviewC::class, 'index']);
      Route::post('/update/{id}', [UniversityReviewC::class, 'update']);
    });
    Route::prefix('/upload-files')->group(function () {
      Route::get('/', [UploadFilesC::class, 'index']);
      Route::get('/get-data', [UploadFilesC::class, 'getData']);
      Route::get('/delete/{id}', [UploadFilesC::class, 'delete']);
      Route::post('/store', [UploadFilesC::class, 'store']);
      Route::get('/update/{id}', [UploadFilesC::class, 'index']);
      Route::post('/update/{id}', [UploadFilesC::class, 'update']);
    });
    Route::prefix('/authors')->group(function () {
      Route::get('/', [AuthorC::class, 'index']);
      Route::get('/get-data', [AuthorC::class, 'getData']);
      Route::get('/delete/{id}', [AuthorC::class, 'delete']);
      Route::post('/store', [AuthorC::class, 'store']);
      Route::get('/update/{id}', [AuthorC::class, 'index']);
      Route::post('/update/{id}', [AuthorC::class, 'update']);
    });
    Route::prefix('/users')->group(function () {
      Route::get('/', [UserC::class, 'index']);
      Route::get('/get-data', [UserC::class, 'getData']);
      Route::get('/delete/{id}', [UserC::class, 'delete']);
      Route::post('/store', [UserC::class, 'store']);
      Route::get('/update/{id}', [UserC::class, 'index']);
      Route::post('/update/{id}', [UserC::class, 'update']);
    });
    Route::prefix('/testimonials')->group(function () {
      Route::get('/', [TestimonialC::class, 'index']);
      Route::get('/get-data', [TestimonialC::class, 'getData']);
      Route::get('/delete/{id}', [TestimonialC::class, 'delete']);
      Route::post('/store', [TestimonialC::class, 'store']);
      Route::get('/update/{id}', [TestimonialC::class, 'index']);
      Route::post('/update/{id}', [TestimonialC::class, 'update']);
    });
    Route::prefix('/destination-articles')->group(function () {
      Route::get('/', [DestinationArticleC::class, 'index']);
      Route::get('/get-data', [DestinationArticleC::class, 'getData']);
      Route::post('/store', [DestinationArticleC::class, 'store']);
      Route::get('/update/{id}', [DestinationArticleC::class, 'index']);
      Route::post('/update/{id}', [DestinationArticleC::class, 'update']);
      Route::get('/delete/{id}', [DestinationArticleC::class, 'delete']);
    });
    Route::prefix('/destination-article-contents')->group(function () {
      Route::get('/get-headings', [DestinationArticleContentC::class, 'getHeadings']);
      Route::get('/get-data', [DestinationArticleContentC::class, 'getData']);
      Route::get('/delete/{id}', [DestinationArticleContentC::class, 'delete']);
      Route::post('/store', [DestinationArticleContentC::class, 'store']);
      Route::get('/{article_id}/', [DestinationArticleContentC::class, 'index']);
      Route::get('/{article_id}/update/{id}', [DestinationArticleContentC::class, 'index']);
      Route::post('/{article_id}/update/{id}', [DestinationArticleContentC::class, 'update']);
    });
    Route::prefix('/destination-article-faqs')->group(function () {
      Route::get('/get-data', [DestinationArticleFaqsC::class, 'getData']);
      Route::get('/delete/{id}', [DestinationArticleFaqsC::class, 'delete']);
      Route::post('/store', [DestinationArticleFaqsC::class, 'store']);
      Route::get('/{destination_article_id}/', [DestinationArticleFaqsC::class, 'index']);
      Route::get('/{destination_article_id}/update/{id}', [DestinationArticleFaqsC::class, 'index']);
      Route::post('/{destination_article_id}/update/{id}', [DestinationArticleFaqsC::class, 'update']);
    });
    Route::prefix('/career')->group(function () {
      Route::get('/', [CareerC::class, 'index']);
      Route::get('/get-data', [CareerC::class, 'getData']);
      Route::post('/store', [CareerC::class, 'store']);
      Route::get('/update/{id}', [CareerC::class, 'index']);
      Route::post('/update/{id}', [CareerC::class, 'update']);
      Route::get('/delete/{id}', [CareerC::class, 'delete']);
    });
    Route::prefix('/job-application')->group(function () {
      Route::get('/', [JobApplicationC::class, 'index']);
      Route::get('/get-data', [JobApplicationC::class, 'getData']);
      Route::get('/delete/{id}', [JobApplicationC::class, 'delete']);
      Route::post('/store', [JobApplicationC::class, 'store']);
      Route::get('/update/{id}', [JobApplicationC::class, 'index']);
      Route::post('/update/{id}', [JobApplicationC::class, 'update']);
    });
    Route::prefix('/faq-categories')->group(function () {
      Route::get('/', [FaqCategoryC::class, 'index']);
      Route::get('/get-data', [FaqCategoryC::class, 'getData']);
      Route::post('/store', [FaqCategoryC::class, 'store']);
      Route::get('/update/{id}', [FaqCategoryC::class, 'index']);
      Route::post('/update/{id}', [FaqCategoryC::class, 'update']);
      Route::get('/delete/{id}', [FaqCategoryC::class, 'delete']);
    });
    Route::prefix('/faqs')->group(function () {
      Route::get('/', [FaqC::class, 'index']);
      Route::get('/get-data', [FaqC::class, 'getData']);
      Route::post('/store', [FaqC::class, 'store']);
      Route::get('/update/{id}', [FaqC::class, 'index']);
      Route::post('/update/{id}', [FaqC::class, 'update']);
      Route::get('/delete/{id}', [FaqC::class, 'delete']);
    });
    Route::prefix('/url-redirections')->group(function () {
      Route::get('/', [UrlRedirectionC::class, 'index']);
      Route::get('/get-data', [UrlRedirectionC::class, 'getData']);
      Route::post('/store', [UrlRedirectionC::class, 'store']);
      Route::get('/update/{id}', [UrlRedirectionC::class, 'index']);
      Route::post('/update/{id}', [UrlRedirectionC::class, 'update']);
      Route::get('/delete/{id}', [UrlRedirectionC::class, 'delete']);
    });
  });
  Route::prefix('common')->group(function () {
    Route::get('/change-status', [CommonController::class, 'changeStatus']);
    Route::get('/update-field', [CommonController::class, 'updateFieldById']);
    Route::get('/update-bulk-field', [CommonController::class, 'updateBulkField']);
    Route::get('/bulk-delete', [CommonController::class, 'bulkDelete']);
    Route::get('/get-country-by-destination', [CommonController::class, 'getCountryByDestination']);
    Route::get('/slugify', [CommonController::class, 'slugify']);
  });
});


// SITE MAP
Route::get('sitemap.xml', [SitemapController::class, 'sitemap']);
Route::get('sitemap-home.xml', [SitemapController::class, 'home']);
Route::get('sitemap-blog.xml', [SitemapController::class, 'blog']);
Route::get('sitemap-destinations.xml', [SitemapController::class, 'destination']);
Route::get('sitemap-universities.xml', [SitemapController::class, 'university']);
Route::get('sitemap-exams.xml', [SitemapController::class, 'exam']);
Route::get('sitemap-services.xml', [SitemapController::class, 'services']);
Route::get('sitemap-jobs.xml', [SitemapController::class, 'jobs']);
Route::get('sitemap-teams.xml', [SitemapController::class, 'teams']);
Route::get('sitemap-university-courses.xml', [SitemapController::class, 'universityCourses']);
Route::get('sitemap-university-list.xml', [SitemapController::class, 'universityList']);
Route::get('sitemap-university-scholarships.xml', [SitemapController::class, 'universityScholarships']);

/* BOOK DEMO FORM */
Route::prefix('book-demo')->group(function () {
  Route::get('/', [BookDemoC::class, 'index']);
  Route::post('save-info', [BookDemoC::class, 'saveInfo']);
  Route::get('verify-email', [BookDemoC::class, 'verifyEmail']);
  Route::post('verify-email', [BookDemoC::class, 'submitOTP']);
  Route::get('thank-you', [BookDemoC::class, 'thankYou']);
});
Route::prefix('book-slot')->group(function () {
  Route::get('/', [BookDemoC::class, 'bookSlot']);
  Route::post('save-slot', [BookDemoC::class, 'saveSlot']);
});



/* FRONT ROUTES */

Route::get('/', [HomeFc::class, 'index']);
Route::get('/home', [HomeFc::class, 'index']);
Route::get('/career', [CareerFc::class, 'index']);
Route::post('/career/apply', [CareerFc::class, 'apply']);
Route::get('career/thank-you', [BookDemoC::class, 'thankYou']);
Route::get('/about', [AboutFc::class, 'index']);
Route::get('/contact', [ContactFc::class, 'index']);
Route::post('/contact', [ContactFc::class, 'submitInquiry']);
Route::get('/terms-conditions', [HomeFc::class, 'termsConditions']);
Route::get('/privacy-policy', [HomeFc::class, 'privacyPolicy']);
Route::get('/faqs', [HomeFc::class, 'faqs']);
Route::get('/universities', [DestinationFc::class, 'destinationList'])->name('universities');
Route::get('compare', [CompareFc::class, 'index']);
Route::get('compare/get-category-by-level', [CompareFc::class, 'getCategoryByLevel']);
Route::get('compare/get-spc-by-level-and-category', [CompareFc::class, 'getSpcByLC']);

Route::get('/student-services', [StudentServiceFc::class, 'index']);
Route::get('/franchise-services', [StudentServiceFc::class, 'franchise']);
Route::get('/partner-services', [StudentServiceFc::class, 'partner']);
Route::get('/universities-services', [StudentServiceFc::class, 'university']);

Route::get('/author/{author_slug}', [AuthorFc::class, 'index']);

Route::get('search-university-and-program', [HomeFc::class, 'searchUniversity']);

Route::get('team', [TeamFc::class, 'team']);
Route::get('team/{slug}', [TeamFc::class, 'userDetail']);

Route::prefix('/inquiry')->group(function () {
  Route::post('/exam-page', [InquiryController::class, 'examPage']);
  Route::post('/job-page', [InquiryController::class, 'jobPage']);
});
Route::post('/submit-modal-form', [InquiryController::class, 'submitCounselling'])->name('counselling.submit');
Route::get('/test-api', [InquiryController::class, 'testApi']);

$destinations = Destination::where(['status' => 1])->get();
foreach ($destinations as $row) {
  $oldSlug = str_replace("study-in-", "", $row->destination_slug);

  Route::get('/' . $row->destination_slug, [DestinationFc::class, 'index']);

  Route::get($oldSlug, function () use ($row) {
    return redirect($row->destination_slug . '/', 301);
  });
  Route::get($oldSlug . '/articles/{page_url}', function ($page_url) use ($row) {
    return redirect($row->destination_slug . '/articles/' . $page_url, 301);
  });
}

$destinationsUniversities = University::whereHas('getPrograms', function ($query) {
  $query->whereExists(function ($subQuery) {
    $subQuery->select('id')->from('university_programs')->whereColumn('university_id', 'universities.id');
  });
})->where('status', 1)->select('destination_id')->groupBy('destination_id')->get();

foreach ($destinationsUniversities as $row) {
  Route::get('/' . $row->getDestination->destination_slug . '/universities/', [UniversityProgramListFc::class, 'index']);

  // Route::get('/' . $row->getDestination->destination_slug . '/' . $row->getDestination->destination_slug . '-universities/', [UniversityProgramListFc::class, 'index']);

  Route::get('/' . $row->getDestination->destination_slug . '/{filter}', [UniversityProgramListFc::class, 'filterUniversity']);
}
Route::prefix('/course-list')->group(function () {
  Route::get('/remove-filter', [UniversityProgramListFc::class, 'removeFilter']);
  Route::get('/remove-all-filter', [UniversityProgramListFc::class, 'removeAllFilter']);
});

Route::get('services', [ServiceFc::class, 'index'])->name('services');
Route::get('services/{service_slug}', [ServiceFc::class, 'serviceDetail'])->name('service.detail');
// $services = Service::where(['status' => 1])->get();
// foreach ($services as $row) {
//   Route::get('/' . $row->slug, [ServiceFc::class, 'serviceDetail']);
// }

Route::get('jobs', [JobPageFc::class, 'index'])->name('jobs');
Route::get('jobs/{page_slug}', [JobPageFc::class, 'detailPage'])->name('job.detail');
$jobpages = JobPage::where(['status' => 1])->get();
foreach ($jobpages as $row) {
  Route::get($row->page_slug, function () use ($row) {
    return redirect('jobs/' . $row->page_slug, 301);
  });
}

Route::get('exams', [ExamFc::class, 'index']);
Route::get('exam/{exam_slug}/{tab_slug}', [ExamFc::class, 'examDetailPage']);

Route::get('/blog/', [BlogFc::class, 'index'])->name('blog');
Route::get('blog/{category_slug}', [BlogFc::class, 'blogByCategory'])->name('blog.category');
Route::get('blog/{category_slug}/{slug}', [BlogFc::class, 'blogdetail'])->name('blog.detail');

// OLD CODE PLACE HERE

Route::prefix('/university-course-list')->group(function () {
  Route::get('/level', [UniversityCourseListFc::class, 'applyLevelFilter']);
  Route::get('/category', [UniversityCourseListFc::class, 'applyCategoryFilter']);
  Route::get('/specialization', [UniversityCourseListFc::class, 'applySpecializationFilter']);
  Route::get('/apply-filter', [UniversityCourseListFc::class, 'applyFilter']);
  Route::get('/remove-filter', [UniversityCourseListFc::class, 'removeFilter']);
  Route::get('/remove-all-filter', [UniversityCourseListFc::class, 'removeAllFilter']);
});
Route::prefix('/university-scholarship-list')->group(function () {
  Route::get('/level', [UniversityScholarshipListFc::class, 'applyLevelFilter']);
  Route::get('/category', [UniversityScholarshipListFc::class, 'applyCategoryFilter']);
  Route::get('/specialization', [UniversityScholarshipListFc::class, 'applySpecializationFilter']);
  Route::get('/apply-filter', [UniversityScholarshipListFc::class, 'applyFilter']);
  Route::get('/remove-filter', [UniversityScholarshipListFc::class, 'removeFilter']);
  Route::get('/remove-all-filter', [UniversityScholarshipListFc::class, 'removeAllFilter']);
});

Route::get('/{destination_slug}/articles/{page_url}', [DestinationArticleFc::class, 'detailPage']);

Route::prefix('{destination_slug}/universities/')->group(function () {
  Route::get('/{university_slug}/', [UniversityProfileFc::class, 'index'])->name('university.overview');
  Route::get('/{university_slug}/courses', [UniversityCourseListFc::class, 'index'])->name('university.courses');
  Route::get('/{university_slug}/courses/{program_slug}', [UniversityCourseListFc::class, 'programDetail'])->name('university.course.detail');

  $ulevel = UniversityProgram::select('level_id')->where(['status' => 1])->distinct()->get();
  foreach ($ulevel as $row2) {
    Route::get('/{university_slug}/' . $row2->getLevel->slug . '-courses', [UniversityCourseListFc::class, 'index']);
  }
  $ucat = UniversityProgram::select('course_category_id')->where(['status' => 1])->distinct()->get();
  foreach ($ucat as $row2) {
    Route::get('/{university_slug}/' . $row2->getCategory->category_slug . '-courses', [UniversityCourseListFc::class, 'index']);
  }
  $uspc = UniversityProgram::select('specialization_id')->where(['status' => 1])->distinct()->get();
  foreach ($uspc as $row2) {
    Route::get('/{university_slug}/' . $row2->getSpecialization->specialization_slug . '-courses', [UniversityCourseListFc::class, 'index']);
  }

  Route::get('/{university_slug}' . '/scholarship', [UniversityScholarshipListFc::class, 'index'])->name('university.scholarship');
  Route::get('/{university_slug}' . '/scholarship/{scholarship_slug}', [UniversityScholarshipListFc::class, 'scholarshipDetail'])->name('university.scholarship.detail');

  Route::get('/{university_slug}/reviews', [UniversityReviewFc::class, 'index'])->name('university.reviews');
  Route::get('/{university_slug}/write-a-review', [UniversityReviewFc::class, 'writeReview'])->name('university.write.review');
  Route::get('/{university_slug}/{tab_slug}', [UniversityOtherTabFc::class, 'index'])->name('university.tab.content');
});
Route::post('/university/write-review', [UniversityReviewFc::class, 'addReview']);

$oldUniversities = University::where('status', '1')->get();
foreach ($oldUniversities as $row) {
  Route::get($row->slug, function () use ($row) {
    return redirect($row->getDestination->destination_slug . '/universities/' . $row->slug . '/', 301);
  });
  Route::get($row->slug . '/courses/', function () use ($row) {
    return redirect($row->getDestination->destination_slug . '/universities/' . $row->slug . '/courses/', 301);
  });
  Route::get($row->slug . '/write-a-review/', function () use ($row) {
    return redirect($row->getDestination->destination_slug . '/universities/' . $row->slug . '/write-a-review/', 301);
  });
}

Route::get('{slug}/course/{program_slug}', function ($slug, $program_slug) {
  $university = University::where('slug', $slug)->where('status', '1')->first();

  if (!$university || !$university->getDestination) {
    abort(404);
  }

  return redirect($university->getDestination->destination_slug . '/universities/' . $slug . '/courses/' . $program_slug, 301);
});


$customsRedirections = UrlRedirection::all();
foreach ($customsRedirections as $row) {
  Route::get($row->old_url, function () use ($row) {
    return redirect($row->new_url, 301);
  });
}
