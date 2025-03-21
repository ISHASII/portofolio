@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Detail Skill</h2>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="px-4 py-2 bg-yellow-600 text-white font-semibold rounded-md hover:bg-yellow-700 transition">Edit</a>
                        <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700 transition">Kembali</a>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-700">Nama Skill</h3>
                                <p class="text-xl font-semibold text-gray-900">{{ $skill->name }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-700">Kategori</h3>
                                <p class="text-xl font-semibold text-gray-900">{{ $skill->category ?? 'Tidak ada kategori' }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-700">Icon</h3>
                                <div class="flex items-center space-x-2">
                                    @if($skill->icon)
                                        <i class="{{ $skill->icon }} text-3xl"></i>
                                        <p class="text-gray-600">{{ $skill->icon }}</p>
                                    @else
                                        <p class="text-gray-600">Tidak ada icon</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-700">Tingkat Kemampuan</h3>
                                <div class="mt-2">
                                    <div class="w-full bg-gray-200 rounded-full h-4">
                                        <div class="bg-blue-600 h-4 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                                    </div>
                                    <p class="mt-1 text-xl font-semibold text-gray-900">{{ $skill->proficiency }}%</p>
                                </div>
                            </div>

                            <div class="pt-4 mt-4 border-t border-gray-200">
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus skill ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 transition">Hapus Skill</button>
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
