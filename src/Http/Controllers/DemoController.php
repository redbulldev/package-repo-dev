<?php

namespace Rebbull\Http\Controllers;

use App\Http\Controllers\Controller;
use Rebbull\Models\Demo;

class DemoController extends Controller
{
    public function getIndex()
    {
        return view('rebbull-demo::index');
    }
}
