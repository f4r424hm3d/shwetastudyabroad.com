<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DefaultOgImage;
use App\Models\Destination;
use App\Models\DynamicPageSeo;
use App\Models\Exam;
use App\Models\ExamContent;
use App\Models\ExamFaq;
use App\Models\ExamTab;
use App\Models\ExamTabFaq;
use Illuminate\Http\Request;

class ExamFc extends Controller
{
  public function index(Request $request)
  {
    $exams = Exam::where(['status' => 1])->get();
    $data = compact('exams');
    return view('front.exams')->with($data);
  }
  public function examDetailPage($exam_slug, $tab_slug, Request $request)
  {
    $countries = Country::orderBy('phonecode', 'asc')->where('phonecode', '!=', '0')->get();
    $exam = Exam::where(['status' => 1])->where('exam_slug', $exam_slug)->firstOrFail();

    $examtab = ExamTab::where(['exam_id' => $exam->id])->where('tab_slug', $tab_slug)->firstOrFail();

    $active_tab = $examtab->parent_id == null ? $tab_slug : $examtab->getParentTab->tab_slug;

    $exams = Exam::where(['status' => 1])->where('exam_slug', '!=', $exam_slug)->get();
    $faqs = ExamTabFaq::where(['tab_id' => $examtab->id])->get();
    $destinations = Destination::where(['status' => 1])->limit(10)->get();

    $page_url = url()->current();

    $wrdseo = ['url' => 'exam-single-page'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();
    $dogimg = DefaultOgImage::default()->first();
    $title = $examtab->heading;
    $site =  'britannicaoverseas.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site, 'examname' => $exam->exam_name, 'tabname' => $examtab->tab_name];

    $meta_title = $examtab->meta_title == '' ? $dseo->meta_title : $examtab->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $examtab->meta_keyword == '' ? $dseo->meta_keyword : $examtab->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $examtab->page_content == '' ? $dseo->page_content : $examtab->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $examtab->meta_description == '' ? $dseo->meta_description : $examtab->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $examtab->image_path ?? $dogimg->file_path;

    $question = generateMathQuestion();
    session(['captcha_answer' => $question['answer']]);

    $data = compact('exam', 'examtab', 'exams', 'page_url', 'dseo', 'title', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'faqs', 'destinations', 'tab_slug', 'active_tab', 'countries', 'question');
    return view('front.exam-detail')->with($data);
  }
}
