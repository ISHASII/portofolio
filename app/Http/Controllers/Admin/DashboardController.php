<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan jumlah data untuk masing-masing entitas
        $projectsCount = Project::count();
        $skillsCount = Skill::count();
        $experiencesCount = Experience::count();
        $educationCount = Education::count();
        $testimonialsCount = Testimonial::count();

        // Mengambil data terbaru
        $latestProjects = Project::latest()->take(5)->get();
        $latestTestimonials = Testimonial::latest()->take(5)->get();

        // Mengirimkan data ke view
        return view('admin.dashboard', compact(
            'projectsCount',
            'skillsCount',
            'experiencesCount',
            'educationCount',
            'testimonialsCount',
            'latestProjects',
            'latestTestimonials'
        ));
    }
}
