<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\DefaultOgImage;
use App\Models\Destination;
use App\Models\DynamicPageSeo;
use App\Models\FeesAndDeadline;
use App\Models\University;
use App\Models\UniversityGallery;
use App\Models\UniversityOverview;
use App\Models\UniversityProgram;
use App\Models\UniversityVideoGallery;
use Illuminate\Http\Request;

class UniversityProfileFc extends Controller
{
  public function index($destination_slug, $university_slug, Request $request)
  {
    $slug = $university_slug;
    $checkDestination = Destination::where(['destination_slug' => $destination_slug])->where('status', '1')->firstOrFail();
    $university = University::where('destination_id', $checkDestination->id)->where(['slug' => $slug])->where('status', '1')->firstOrFail();
    $overview = UniversityOverview::where(['university_id' => $university->id])->get();
    // if ($overview->count() == 0) {
    //   abort(404);
    // }
    $schema = UniversityOverview::where(['university_id' => $university->id])->get()->last();
    // printArray($overview);
    // die;
    $gallery = UniversityGallery::where(['university_id' => $university->id])->get();
    $video = UniversityVideoGallery::where(['university_id' => $university->id])->get();
    $feesandapp = FeesAndDeadline::where(['university_id' => $university->id])->get();

    $trendingUniversity = University::trending($university->destination_id)->get();
    $categories = UniversityProgram::groupBy('course_category_id')->where('university_id', $university->id)->get();

    $page_url = url()->current();
    $wrdseo = ['url' => 'university-overview'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();
    $dogimg = DefaultOgImage::default()->first();

    $title = $university->name;
    $destination = $university->getDestination->destination_name;
    $site =  'britannicaoverseas.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site, 'destination' => $destination];
    $meta_title = $university->meta_title == '' ? $dseo->meta_title : $university->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);
    $meta_keyword = $university->meta_keyword == '' ? $dseo->meta_keyword : $university->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);
    $page_content = $university->page_content == '' ? $dseo->page_content : $university->page_content;
    $page_content = replaceTag($page_content, $tagArray);
    $meta_description = $university->meta_description == '' ? $dseo->meta_description : $university->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);
    $og_image_path = $dogimg->file_path;

    $data = compact('university', 'overview', 'gallery', 'video', 'trendingUniversity', 'feesandapp', 'page_url', 'dseo', 'title', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'categories', 'schema');
    return view('front.university-overview')->with($data);
  }
}
