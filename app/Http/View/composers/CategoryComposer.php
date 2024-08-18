<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class CategoryComposer
{
  public function compose(View $view)
  {
    $view->with('categories', $this->categories);
  }
}