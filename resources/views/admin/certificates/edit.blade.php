@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Edit Certificate</h2>
                    <p class="text-gray-600 mt-1">Update certificate information.</p>
                </div>

                <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Certificate Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $certificate->name) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="organization" class="block text-sm font-medium text-gray-700 mb-1">Organization</label>
                            <input type="text" name="organization" id="organization" value="{{ old('organization', $certificate->organization) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                required>
                            @error('organization')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="issue_date" class="block text-sm font-medium text-gray-700 mb-1">Issue Date</label>
                            <input type="date" name="issue_date" id="issue_date" value="{{ old('issue_date', $certificate->issue_date->format('Y-m-d')) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                required>
                            @error('issue_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="valid_until" class="block text-sm font-medium text-gray-700 mb-1">Valid Until (optional)</label>
                            <input type="date" name="valid_until" id="valid_until"
                                value="{{ old('valid_until', $certificate->valid_until ? $certificate->valid_until->format('Y-m-d') : '') }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            @error('valid_until')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description (optional)</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{ old('description', $certificate->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="certificate_logo" class="block text-sm font-medium text-gray-700 mb-1">Certificate Logo (optional)</label>

                        @if ($certificate->certificate_logo)
                            <div class="mb-3">
                                <div class="flex items-center">
                                    <img src="{{ Storage::url($certificate->certificate_logo) }}" alt="Current Logo" class="h-20 w-20 object-contain border rounded p-1">
                                    <span class="ml-3 text-sm text-gray-600">Current logo</span>
                                </div>
                            </div>
                        @endif

                        <input type="file" name="certificate_logo" id="certificate_logo"
                            class="w-full block text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100">
                        <p class="text-xs text-gray-500 mt-1">Accepted formats: JPG, JPEG, PNG. Max size: 2MB</p>
                        @error('certificate_logo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('admin.certificates.index') }}" class="mr-3 text-gray-600 hover:text-gray-800">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Update Certificate
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
