<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeServiceController extends Controller
{
    public function serviceMain() {
        $services = Service::all();
        return view('main-content.content', compact('services'));
    }

    public function contentMain($id) {
        $service = Service::findOrFail($id);
        return view('service.booking', compact('service'));
    }

    public function apply(){
        return view('servicePro.apply');
    }
}
