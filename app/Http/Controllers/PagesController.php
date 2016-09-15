<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getIndex()
    {
        return view('welcome');
    }

    public function getAbout()
    {   
        $companyName = "Auto Hrvatska";
        $bool = false;
        return view('pages.about')
        ->with("companyName", $companyName)
        ->with("bool", $bool)
        ;
    }
}