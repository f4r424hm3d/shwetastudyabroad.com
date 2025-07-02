<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\DefaultOgImage;
use App\Models\Destination;
use App\Models\DynamicPageSeo;
use App\Models\Service;
use App\Models\ServiceContent;
use Illuminate\Http\Request;

class ServiceFc extends Controller
{
  public function index(Request $request)
  {
    $destinations = Destination::where(['status' => 1])->limit(10)->get();
    $services = Service::where(['status' => 1])->get();
    $data = compact('services', 'destinations');
    return view('front.services')->with($data);
  }
  public function serviceDetail(Request $request, $service_slug)
  {
    $slug = $service_slug;
    $row = Service::where('slug', $slug)->firstOrFail();
    $services = Service::where(['status' => 1])->where('slug', '!=', $slug)->get();
    $servicecontent = ServiceContent::where(['service_id' => $row->id])->get();
    $destinations = Destination::where(['status' => 1])->limit(10)->get();

    $page_url = url()->current();

    $wrdseo = ['url' => 'service-single-page'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();
    $dogimg = DefaultOgImage::default()->first();
    $title = $row->title;
    $site =  'britannicaoverseas.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $row->meta_title == '' ? $dseo->meta_title : $row->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $row->meta_keyword == '' ? $dseo->meta_keyword : $row->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $row->page_content == '' ? $dseo->page_content : $row->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $row->meta_description == '' ? $dseo->meta_description : $row->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $row->thumbnail_path ?? $dogimg->file_path;

    $data = compact('services', 'servicecontent', 'row', 'page_url', 'dseo', 'title', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'destinations');
    return view('front.service-detail')->with($data);
  }
}
