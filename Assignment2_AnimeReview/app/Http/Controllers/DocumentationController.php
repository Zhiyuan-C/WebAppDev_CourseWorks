<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    /**
    ||  Display documentation page
    **/
    public function show(){
        $nav_class = 'documentation';
        return view('documentation')->withNavclass($nav_class);
    }
}
