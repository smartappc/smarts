<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cause;

class MainController extends Controller
{


    public  function main() {
        $cause = cause::where('status', 1)->orderBy( 'number',  'DESC')->get();
        return view('cause')->with('cause', $cause);
    }
 }
