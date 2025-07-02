<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewOnModal extends Component
{
  public $id;
  public $title;
  public $content;
  /**
   * Create a new component instance.
   */
  public function __construct($id, $title, $content = null)
  {
    $this->id = $id;
    $this->title = $title;
    $this->content = $content;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.view-on-modal');
  }
}
