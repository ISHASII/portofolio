<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('start_date', 'desc')->get();

        return view('admin.education.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'current' => 'nullable|boolean',
            'description' => 'nullable|string',
            'institution_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedData['current'] = $request->has('current');

        if ($request->hasFile('institution_logo')) {
            $logoPath = $request->file('institution_logo')->store('institutions', 'public');
            $validatedData['institution_logo'] = $logoPath;
        }

        Education::create($validatedData);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education created successfully.');
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validatedData = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'current' => 'nullable|boolean',
            'description' => 'nullable|string',
            'institution_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedData['current'] = $request->has('current');

        if ($request->hasFile('institution_logo')) {
            if ($education->institution_logo) {
                Storage::disk('public')->delete($education->institution_logo);
            }
            $logoPath = $request->file('institution_logo')->store('institutions', 'public');
            $validatedData['institution_logo'] = $logoPath;
        }

        $education->update($validatedData);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        if ($education->institution_logo) {
            Storage::disk('public')->delete($education->institution_logo);
        }

        $education->delete();

        return redirect()->route('admin.education.index')
            ->with('success', 'Education deleted successfully.');
    }
}