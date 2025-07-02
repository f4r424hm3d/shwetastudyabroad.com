<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  use HasFactory;
  public function getCategory()
  {
    return $this->hasOne(BlogCategory::class, 'id', 'category_id');
  }
  public function getUser()
  {
    return $this->hasOne(User::class, 'id', 'user_id');
  }
  public function contents()
  {
    return $this->hasMany(BlogContent::class, 'blog_id')->orderBy('position', 'asc');
  }
  public function parentContents()
  {
    return $this->hasMany(BlogContent::class, 'blog_id', 'id')->orderBy('position', 'asc')->where('parent_id', null);
  }
  public function faqs()
  {
    return $this->hasMany(BlogFaq::class, 'blog_id', 'id');
  }
}
