<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPoster;
use Illuminate\Support\Facades\Lang;
use Illuminate\View\View;

class ScreeningPlanController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param  JobPoster $job The job to create a screen plan for.
     * @return View
     */
    public function createForJob(JobPoster $jobPoster): View
    {
        $jobPoster->load('criteria');
        debugbar()->debug($jobPoster->toArray());
        return view(
            'manager/screening-plan',
            [
                'screening' => Lang::get('manager/screening-plan'),
                'job' => $jobPoster,
            ]
        );
    }
}
