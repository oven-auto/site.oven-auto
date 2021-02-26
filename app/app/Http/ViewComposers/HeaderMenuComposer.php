<?php

namespace App\Http\ViewComposers;


use Illuminate\View\View;
use App\Models\Mark;

class HeaderMenuComposer
{
    public function compose(View $view)
    {
        return $view->with('models', Mark::orderBy('sort')->pluck('name','slug'));
    }
}