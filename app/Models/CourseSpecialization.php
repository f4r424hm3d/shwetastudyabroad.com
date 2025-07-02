<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSpecialization extends Model
{
  use HasFactory;
  protected $guarded = [];
  public function getCategory()
  {
    return $this->hasOne(CourseCategory::class, 'id', 'course_category_id');
  }
}
