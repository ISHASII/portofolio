<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\Certificate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $projects = Project::orderBy('created_at', 'desc')->get();
        $featuredProjects = Project::where('featured', true)->take(3)->get();
        $skills = Skill::orderBy('created_at', 'asc')->get();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $educations = Education::orderBy('start_date', 'desc')->get();
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        $certificates = Certificate::orderBy('created_at', 'desc')->get();

        return view('home', compact(
            'profile',
            'projects',
            'featuredProjects',
            'skills',
            'experiences',
            'educations',
            'testimonials',
            'certificates'
        ));
    }
}
