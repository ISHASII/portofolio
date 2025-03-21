@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Edit Skill</h2>
                    <a href="{{ route('admin.skills.index') }}" class="mt-2 inline-block text-blue-600 hover:underline">
                        &larr; Back to Skills
                    </a>
                </div>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.skills.update', $skill) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $skill->name) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                        @if ($skill->icon)
                            <div class="mb-3">
                                <p class="text-sm text-gray-600 mb-2">Current Icon:</p>
                                <img src="{{ Storage::url($skill->icon) }}" alt="{{ $skill->name }}" class="h-20 w-20 object-cover border rounded">
                            </div>
                        @endif
                        <div class="mt-1 flex items-center">
                            <input type="file" name="icon" id="icon"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   accept="image/*">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Allowed file types: jpeg, png, jpg, gif, svg (max 2MB)</p>
                        <p class="mt-1 text-sm text-gray-500">Leave blank to keep the current icon</p>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            Update Skill
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
