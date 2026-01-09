@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Detail Proyek</h2>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                                class="px-4 py-2 bg-yellow-600 text-white font-semibold rounded-md hover:bg-yellow-700 transition">Edit</a>
                            <a href="{{ route('admin.projects.index') }}"
                                class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700 transition">Kembali</a>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                @php $cover = $project->cover_image ? asset('storage/' . $project->cover_image) : ($project->images->count() ? asset('storage/' . $project->images->first()->path) : ''); @endphp
                                @if($cover)
                                    <img src="{{ $cover }}" alt="{{ $project->title }}"
                                        class="w-full h-auto rounded-lg shadow-md">
                                @else
                                    <div class="w-full h-48 bg-gray-100 rounded-lg"></div>
                                @endif
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">{{ $project->title }}</h3>
                                    <div class="mt-1 flex items-center">
                                        @foreach($project->tech_stack_array as $tech)
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 mr-2">{{ $tech }}</span>
                                        @endforeach
                                        @if($project->featured)
                                            <span
                                                class="ml-2 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Unggulan</span>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <h4 class="text-sm font-medium text-gray-700">Deskripsi:</h4>
                                    <div class="mt-1 text-sm text-gray-600">
                                        {!! nl2br(e($project->description)) !!}
                                    </div>
                                </div>

                                @if($project->project_url)
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-700">URL Proyek:</h4>
                                        <a href="{{ $project->project_url }}" target="_blank"
                                            class="mt-1 text-sm text-blue-600 hover:underline">{{ $project->project_url }}</a>
                                    </div>
                                @endif

                                <div class="pt-4 border-t border-gray-200">
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 transition">Hapus
                                            Proyek</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
