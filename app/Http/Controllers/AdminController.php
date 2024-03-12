<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function Jobs(){
        return view('admin.add-jobs');
    }

    public function Account(){
        return view('admin.account');
    }

    public function Pages(){
        return view('admin.pages');
    }

    public function ControlPanel(){
        return view('admin.dashboard');
    }

    public function Suggestions(){
        return view('admin.suggestions');
    }

}
