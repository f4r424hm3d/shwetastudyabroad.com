<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Destination;
use App\Models\FaqCategory;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeFc extends Controller
{
  public function index(Request $request)
  {
    $blogs = Blog::limit(10)->get();
    $destinations = Destination::where(['status' => 1])->inRandomOrder()->limit(14)->get();
    // $destinations = University::whereHas('getPrograms', function ($query) {
    //   $query->whereExists(function ($subQuery) {
    //     $subQuery->select('id')->from('university_programs')->whereColumn('university_id', 'universities.id');
    //   });
    // })->where('status', 1)->select('destination_id')->groupBy('destination_id')->get();
    $data = compact('destinations', 'blogs');
    return view('front.index')->with($data);
  }
  public function privacyPolicy(Request $request)
  {
    return view('front.privacy-policy');
  }
  public function termsConditions(Request $request)
  {
    return view('front.terms-conditions');
  }
  public function faqs(Request $request)
  {
    $categories = FaqCategory::whereHas('faqs')->get();
    $data = compact('categories');
    return view('front.faqs')->with($data);
  }
  public function searchUniversity(Request $request)
  {
    $keyword = $request->keyword;
    $field = DB::table('universities')->where('status', 1)->where('name', 'LIKE', '%' . $keyword . '%')->get();
    if ($field->count()) {
      $output = '<ul class="sItemsUl"><li class="active">UNIVERSITIES</li>';
      foreach ($field as $row) {
        $output .= '<li><a href="' . $row->slug . '">' . $row->name . '</a></li>';
      }
      $output .= '</ul>';
    } else {
      $output = '<center>No Data Found</center>';
    }
    echo $output;
  }
  public function newPage(Request $request)
  {
    return view('front.new-page');
  }
}
