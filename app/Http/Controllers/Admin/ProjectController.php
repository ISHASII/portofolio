<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('featured', true)->take(6)->get();
        $allProjects = Project::latest()->paginate(5);
        return view('admin.projects.index', compact('featuredProjects', 'allProjects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'detail_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'tech_stack' => 'required|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'featured' => 'nullable|boolean',
        ]);

        $validatedData['featured'] = $request->has('featured');

        // Handle cover image
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('projects/covers', 'public');
            $validatedData['cover_image'] = $coverPath;
        }

        $project = Project::create($validatedData);

        // Handle detail images (multiple)
        if ($request->hasFile('detail_images')) {
            $position = 0;
            foreach ($request->file('detail_images') as $file) {
                $path = $file->store('projects/details', 'public');
                $project->images()->create([
                    'path' => $path,
                    'position' => $position++,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load('images');
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'detail_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'tech_stack' => 'required|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'featured' => 'nullable|boolean',
        ]);

        $validatedData['featured'] = $request->has('featured');

        // Handle cover image
        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $coverPath = $request->file('cover_image')->store('projects/covers', 'public');
            $validatedData['cover_image'] = $coverPath;
        }

        // Handle new detail images
        if ($request->hasFile('detail_images')) {
            $position = $project->images()->count();
            foreach ($request->file('detail_images') as $file) {
                $path = $file->store('projects/details', 'public');
                $project->images()->create([
                    'path' => $path,
                    'position' => $position++,
                ]);
            }
        }

        $project->update($validatedData);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // delete cover image
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        // delete detail images files
        foreach ($project->images as $img) {
            Storage::disk('public')->delete($img->path);
            $img->delete();
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    // Delete a single project image
    public function destroyImage(Project $project, \App\Models\ProjectImage $image)
    {
        if ($image->project_id !== $project->id) {
            abort(404);
        }

        Storage::disk('public')->delete($image->path);
        $image->delete();

        return redirect()->back()->with('success', 'Project image deleted.');
    }
}
