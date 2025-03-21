<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('created_at', 'desc')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('certificate_logo')) {
            $logoPath = $request->file('certificate_logo')->store('certificates', 'public');
            $validatedData['certificate_logo'] = $logoPath;
        }

        Certificate::create($validatedData);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate created successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('certificate_logo')) {
            if ($certificate->certificate_logo) {
                Storage::disk('public')->delete($certificate->certificate_logo);
            }
            $logoPath = $request->file('certificate_logo')->store('certificates', 'public');
            $validatedData['certificate_logo'] = $logoPath;
        }

        $certificate->update($validatedData);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->certificate_logo) {
            Storage::disk('public')->delete($certificate->certificate_logo);
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }
}
