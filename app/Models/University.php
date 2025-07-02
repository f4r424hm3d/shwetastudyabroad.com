<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
  use HasFactory;
  protected $guarded = [];
  //HAS ONE RELATION
  public function getInstType()
  {
    return $this->hasOne(InstituteType::class, 'id', 'institute_type_id');
  }
  public function getDestination()
  {
    return $this->hasOne(Destination::class, 'id', 'destination_id');
  }
  public function headUniversity()
  {
    return $this->hasOne(University::class, 'id', 'parent_university_id');
  }

  //HAS MANY RELATION
  public function getAllTabContent()
  {
    return $this->hasMany(UniversityOtherContent::class, 'university_id', 'id');
  }
  public function getScholarships()
  {
    return $this->hasMany(UniversityScholarship::class, 'university_id', 'id');
  }
  public function getReviews()
  {
    return $this->hasMany(UniversityReviews::class, 'university_id', 'id')->where(['status' => 1]);
  }
  public function getPrograms()
  {
    return $this->hasMany(UniversityProgram::class, 'university_id', 'id');
  }
  public function activePrograms()
  {
    return $this->hasMany(UniversityProgram::class, 'university_id', 'id')->where('status', 1);
  }
  public function getPhotos()
  {
    return $this->hasMany(UniversityGallery::class, 'university_id', 'id');
  }
  public function overviews()
  {
    return $this->hasMany(UniversityOverview::class, 'university_id', 'id');
  }

  // SCOPES
  public function scopeActive($query)
  {
    return $query->where('status', 1);
  }
  public function scopeHead($query)
  {
    return $query->where('parent_university_id', null);
  }
  public function scopeTrending($query, $destinationId)
  {
    return $query->whereHas('activePrograms')->where('status', 1)->where('destination_id', $destinationId)->limit(10);
  }
}
