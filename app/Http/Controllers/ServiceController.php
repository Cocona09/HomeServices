<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(){
        $services = Service::all();
        return view('service.contentService' , compact('services'));
    }
    public function content($id)
    {
        $services = Service::query()->findOrFail($id);
        return view('service.booking', compact('services'));
    }

}
