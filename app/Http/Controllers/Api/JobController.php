<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobCollection;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index(Request $request, $user_id)
    {

        $user = auth()->user();

        $userJobs =  new JobCollection($user->jobs);

        return $userJobs;

    }
}
