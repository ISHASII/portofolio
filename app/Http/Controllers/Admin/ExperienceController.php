<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'current' => 'nullable|boolean',
            'description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedData['current'] = $request->has('current');

        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('companies', 'public');
            $validatedData['company_logo'] = $logoPath;
        }

        Experience::create($validatedData);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience created successfully.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validatedData = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'current' => 'nullable|boolean',
            'description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedData['current'] = $request->has('current');

        if ($request->hasFile('company_logo')) {
            if ($experience->company_logo) {
                Storage::disk('public')->delete($experience->company_logo);
            }
            $logoPath = $request->file('company_logo')->store('companies', 'public');
            $validatedData['company_logo'] = $logoPath;
        }

        $experience->update($validatedData);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        if ($experience->company_logo) {
            Storage::disk('public')->delete($experience->company_logo);
        }

        $experience->delete();

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience deleted successfully.');
    }
}
