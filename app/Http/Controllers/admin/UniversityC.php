<?php

namespace App\Http\Controllers\admin;

use App\Exports\UniversityListExport;
use App\Http\Controllers\Controller;
use App\Imports\UniversityImport;
use App\Imports\UniversityListBulkUpdateImport;
use App\Models\Country;
use App\Models\CourseCategory;
use App\Models\CourseSpecialization;
use App\Models\Destination;
use App\Models\InstituteType;
use App\Models\State;
use App\Models\University;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UniversityC extends Controller
{
  public function index(Request $request, $id = null)
  {
    $limit_per_page = $request->limit_per_page ?? 10;
    $order_by = $request->order_by ?? 'name';
    $order_in = $request->order_in ?? 'ASC';
    $rows = University::orderBy($order_by, $order_in);
    $filterApplied = false;
    if ($request->has('search') && $request->search != '') {
      $rows = $rows->where('name', 'like', '%' . $request->search . '%')->orWhere('country', 'like', '%' . $request->search . '%')->orWhere('city', 'like', '%' . $request->search . '%')->orWhere('state', 'like', '%' . $request->search . '%');
    } else {
      if ($request->has('country') && $request->country != '') {
        $rows = $rows->Where('country', $request->country);
        $filterApplied = true;
      }
      if ($request->has('state') && $request->state != '') {
        $rows = $rows->Where('state', $request->state);
        $filterApplied = true;
      }
      if ($request->has('city') && $request->city != '') {
        $rows = $rows->Where('city', $request->city);
        $filterApplied = true;
      }
    }
    $rows = $rows->paginate($limit_per_page)->withQueryString();

    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $instType = InstituteType::all();
    $destinations = Destination::all();
    $countries = Country::all();
    $states = State::all();

    $lpp = ['10', '20', '50'];
    $orderColumns = ['Name' => 'name', 'Date' => 'created_at', 'City' => 'city', 'State' => 'state', 'Country' => 'country'];

    $filterCountries = University::select('country')->groupBy('country')->orderBy('country')->get();

    $filterStates = University::select('state')->groupBy('state')->orderBy('state')->where('state', '!=', '');
    if ($request->has('country') && $request->country != '') {
      $filterStates = $filterStates->where('country', $request->country);
    }
    $filterStates = $filterStates->get();

    $filterCities = University::select('city')->groupBy('city')->orderBy('city')->where('city', '!=', '');
    if ($request->has('country') && $request->country != '') {
      $filterCities = $filterCities->where('country', $request->country);
    }
    if ($request->has('state') && $request->state != '') {
      $filterCities = $filterCities->where('state', $request->state);
    }
    $filterCities = $filterCities->get();

    //printArray($filterStates->toArray());
    //die;

    if ($id != null) {
      $sd = University::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/university/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/university');
      }
    } else {
      $ft = 'add';
      $url = url('admin/university/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "University";
    $page_route = "university";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'instType', 'countries', 'states', 'i', 'destinations', 'limit_per_page', 'order_by', 'order_in', 'lpp', 'orderColumns', 'filterCountries', 'filterApplied', 'filterStates', 'filterCities');
    return view('admin.university')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'name' => 'required|unique:universities,name',
        'destination_id' => 'required',
        'seo_rating' => 'nullable|numeric',
        'logo' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp',
        'banner' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp'
      ]
    );
    $field = new University;
    if ($request->hasFile('logo')) {
      $fileOriginalName = $request->file('logo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('logo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('logo')->move('university/', $file_name);
      if ($move) {
        $field->logo_name = $file_name;
        $field->logo_path = 'university/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    if ($request->hasFile('banner')) {
      $fileOriginalName = $request->file('banner')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('banner')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('banner')->move('university/', $file_name);
      if ($move) {
        $field->banner_name = $file_name;
        $field->banner_path = 'university/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->name = $request['name'];
    $field->slug = slugify($request['name']);
    $field->destination_id = $request['destination_id'];
    $field->address = $request['address'];
    $field->city = $request['city'];
    $field->city_slug = slugify($request['city']);
    $field->state = $request['state'];
    $field->state_slug = slugify($request['state']);
    $field->country = $request['country'];
    $field->institute_type_id = $request['institute_type_id'];
    $field->founded = $request['founded'];
    $field->university_rank = $request['university_rank'];
    $field->qs_rank = $request['qs_rank'];
    $field->us_world_rank = $request['us_world_rank'];
    $field->parent_university_id = $request['parent_university_id'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/university/add');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = University::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'name' => 'required|unique:universities,name,' . $id,
        'destination_id' => 'required',
        'logo' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp',
        'banner' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp'
      ]
    );

    $field = University::find($id);
    if ($request->hasFile('logo')) {
      $fileOriginalName = $request->file('logo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('logo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('logo')->move('uploads/university/', $file_name);
      if ($move) {
        $field->logo_name = $file_name;
        $field->logo_path = 'uploads/university/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    if ($request->hasFile('banner')) {
      $fileOriginalName = $request->file('banner')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('banner')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('banner')->move('uploads/university/', $file_name);
      if ($move) {
        $field->banner_name = $file_name;
        $field->banner_path = 'uploads/university/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->name = $request['name'];
    $field->slug = slugify($request['name']);
    $field->destination_id = $request['destination_id'];
    $field->address = $request['address'];
    $field->city = $request['city'];
    $field->city_slug = slugify($request['city']);
    $field->state = $request['state'];
    $field->state_slug = slugify($request['state']);
    $field->country = $request['country'];
    $field->institute_type_id = $request['institute_type_id'];
    $field->founded = $request['founded'];
    $field->university_rank = $request['university_rank'];
    $field->qs_rank = $request['qs_rank'];
    $field->us_world_rank = $request['us_world_rank'];
    $field->parent_university_id = $request['parent_university_id'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/university');
  }
  public function import(Request $request)
  {
    $request->validate([
      'file' => 'required|mimes:xlsx,csv,xls'
    ]);
    $filePath = $request->file;

    $import = new UniversityImport();
    $importedData = Excel::toCollection($import, $filePath)->first();

    $totalRows = $importedData->count();
    $totalInsertedRows = 0;

    foreach ($importedData as $row) {
      $university = University::where('name', $row['name'])->first();
      $status = isset($row['status']) ? $row['status'] : '0';
      if (!$university) {
        University::create([
          'name' => $row['name'],
          'slug' => slugify($row['name']),
          'address' => $row['address'],
          'city' => $row['city'],
          'city_slug' => slugify($row['city']),
          'state' => $row['state'],
          'state_slug' => slugify($row['state']),
          'country' => $row['country'],
          'founded' => $row['founded'],
          'university_rank' => $row['university_rank'],
          'qs_rank' => $row['qs_rank'],
          'us_world_rank' => $row['us_world_rank'],
          'institute_type_id' => $row['institute_type_id'],
          'destination_id' => $row['destination_id'],
          'parent_university_id' => $row['parent_university_id'],
          'status' => $status,
        ]);
        $totalInsertedRows++;
      }
    }

    //return "Total rows: $totalRows, Total inserted rows: $totalInsertedRows";
    if ($totalRows > 0) {
      if ($totalInsertedRows > 0) {
        session()->flash('smsg', $totalInsertedRows . ' out of ' . $totalRows . ' rows imported successfully.');
      } else {
        session()->flash('emsg', 'No new data imported. All rows already exist or duplicate rows found.');
      }
    } else {
      session()->flash('emsg', 'No data found for import.');
    }
    return redirect('admin/university/add');
  }
  public function export()
  {
    return Excel::download(new UniversityListExport, 'university-list-' . date('Ymd-his') . '.xlsx');
  }
  public function bulkUpdateImport(Request $request)
  {
    // printArray($data->all());
    // die;
    $request->validate([
      'file' => 'required|mimes:xlsx,csv,xls'
    ]);
    $file = $request->file;
    if ($file) {
      try {
        $result = Excel::import(new UniversityListBulkUpdateImport, $file);
        // session()->flash('smsg', 'Data has been imported succesfully.');
        return redirect('admin/university');
      } catch (\Exception $ex) {
        dd($ex);
      }
    }
  }
  public function add(Request $request, $id = null)
  {
    $instType = InstituteType::all();
    $destinations = Destination::all();
    $countries = Country::all();
    $states = State::all();

    $headUniversities = University::head()->get();

    if ($id != null) {
      $sd = University::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/university/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/university');
      }
    } else {
      $ft = 'add';
      $url = url('admin/university/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Add University";
    $page_route = "university";
    $data = compact('sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'instType', 'countries', 'states', 'destinations', 'headUniversities');
    return view('admin.add-university')->with($data);
  }

  public function getStateByCountry(Request $request)
  {
    //echo $id;
    $field = University::select('state')->groupBy('state')->orderBy('state')->where('country', $request->country)->where('state', '!=', '')->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->state . '">' . $row->state . '</option>';
    }
    echo $output;
  }
  public function getCityByState(Request $request)
  {
    //echo $id;
    $field = University::select('city')->groupBy('city')->orderBy('city')->where('state', $request->state)->where('city', '!=', '');
    if ($request->has('country') && $request->country != '') {
      $field = $field->where('country', $request->country);
    }
    if ($request->has('state') && $request->state != '') {
      $field = $field->where('state', $request->state);
    }
    $field = $field->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->city . '">' . $row->city . '</option>';
    }
    echo $output;
  }
}
