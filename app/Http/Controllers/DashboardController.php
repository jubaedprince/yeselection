<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Flag;

class DashboardController extends Controller
{
    public function home(){
        $flag = Flag::get()->first();
        return view('dashboard.home')->with('flag', $flag);
    }

}
