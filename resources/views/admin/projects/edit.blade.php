@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Edit Proyek</h2>
                        <a href="{{ route('admin.projects.index') }}"
                            class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700 transition">Kembali</a>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.projects.update', $project) }}" method="POST"
                        enctype="multipart/form-data" novalidate class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>

                        <div>
                            <label for="tech_stack" class="block text-sm font-medium text-gray-700">Tech Stack</label>
                            <input type="text" name="tech_stack" id="tech_stack"
                                value="{{ old('tech_stack', $project->tech_stack) }}"
                                placeholder="HTML, CSS, JavaScript"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="5"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>{{ old('description', $project->description) }}</textarea>
                        </div>



                        <div>
                            <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                            <div class="mt-2">
                                @if($project->cover_image)
                                    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}"
                                        class="h-40 w-auto object-cover rounded mb-4">
                                @endif
                            </div>
                            <input type="file" name="cover_image" id="cover_image"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
                            <p class="mt-1 text-sm text-gray-500">Gambar utama (cover) untuk tampilan kartu.</p>
                        </div>

                        <fieldset class="border border-gray-100 rounded p-3">
                            <legend class="text-sm font-medium text-gray-700">Detail Images</legend>
                            <div class="mt-2 grid grid-cols-3 gap-4">
                                @foreach($project->images as $img)
                                    <div class="bg-gray-50 p-2 rounded">
                                        <img src="{{ asset('storage/' . $img->path) }}" alt=""
                                            class="w-full h-24 object-cover rounded">
                                        <div class="mt-2">
                                            <button type="button" class="w-full px-2 py-1 bg-red-500 text-white rounded project-image-delete-btn"
                                                data-action="{{ route('admin.projects.images.destroy', [$project, $img]) }}">Hapus</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="detail-images-container" class="space-y-2 mt-3">
                                <div class="flex items-center gap-3">
                                    <input type="file" name="detail_images[]"
                                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" />
                                    <button type="button" id="add-detail-image"
                                        class="px-3 py-1 bg-indigo-600 text-white rounded">Tambah</button>
                                </div>
                            </div>

                            <p class="mt-1 text-sm text-gray-500">Unggah beberapa gambar baru untuk detail proyek
                                (carousel). Gunakan tombol "Tambah" untuk menambahkan field upload baru, atau klik "Hapus"
                                pada field tambahan untuk menghapusnya.</p>
                        </fieldset>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const container = document.getElementById('detail-images-container');
                                if (!container) return;
                                const addBtn = document.getElementById('add-detail-image');
                                const form = container.closest('form');
                                if (!form) return;

                                let submitBtn = null;
                                try {
                                    submitBtn = form.querySelector('button[type="submit"]') || document.getElementById('project-submit-btn') || form.querySelector('input[type="submit"]');
                                } catch (e) { /* ignore */ }
                                if (!submitBtn) console.warn('Submit button not found in project edit form.');

                                const MAX_SIZE = 4 * 1024 * 1024; // 4MB
                                const ALLOWED = ['image/jpeg', 'image/png', 'image/jpg'];

                                function makeErrorSpan() {
                                    const span = document.createElement('p');
                                    span.className = 'detail-image-error text-sm text-red-600 mt-1';
                                    span.style.display = 'none';
                                    return span;
                                }

                                function validateInput(input) {
                                    const files = input.files;
                                    let errorSpan = input.parentElement.querySelector('.detail-image-error');
                                    if (!errorSpan) {
                                        errorSpan = makeErrorSpan();
                                        input.parentElement.appendChild(errorSpan);
                                    }
                                    if (!files || files.length === 0) {
                                        errorSpan.style.display = 'none';
                                        input.removeAttribute('data-invalid');
                                        updateSubmitState();
                                        return;
                                    }
                                    const file = files[0];
                                    if (!ALLOWED.includes(file.type)) {
                                        errorSpan.textContent = 'Tipe file tidak didukung. Gunakan JPG atau PNG.';
                                        errorSpan.style.display = 'block';
                                        input.setAttribute('data-invalid', '1');
                                        updateSubmitState();
                                        return;
                                    }
                                    if (file.size > MAX_SIZE) {
                                        errorSpan.textContent = 'Ukuran file terlalu besar. Maks 4MB.';
                                        errorSpan.style.display = 'block';
                                        input.setAttribute('data-invalid', '1');
                                        updateSubmitState();
                                        return;
                                    }
                                    // valid
                                    errorSpan.style.display = 'none';
                                    input.removeAttribute('data-invalid');
                                    updateSubmitState();
                                }

                                function updateSubmitState() {
                                    const invalid = container.querySelectorAll('input[name="detail_images[]"][data-invalid="1"]').length > 0;
                                    const warningEl = form.querySelector('#detail-image-warning');
                                    if (submitBtn) {
                                        if (invalid) {
                                            submitBtn.setAttribute('aria-disabled', 'true');
                                            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                                            if (warningEl) {
                                                warningEl.textContent = 'Terdapat gambar yang tidak valid. Periksa pesan merah di bawah input gambar.';
                                                warningEl.style.display = 'block';
                                            }
                                        } else {
                                            submitBtn.removeAttribute('aria-disabled');
                                            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                                            if (warningEl) {
                                                warningEl.style.display = 'none';
                                            }
                                        }
                                    }
                                }

                                function createRow() {
                                    const wrapper = document.createElement('div');
                                    wrapper.className = 'flex items-center gap-3';

                                    const input = document.createElement('input');
                                    input.type = 'file';
                                    input.name = 'detail_images[]';
                                    input.className = 'mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100';

                                    const remove = document.createElement('button');
                                    remove.type = 'button';
                                    remove.className = 'px-3 py-1 bg-red-500 text-white rounded';
                                    remove.textContent = 'Hapus';

                                    const errorSpan = makeErrorSpan();

                                    remove.addEventListener('click', function () { wrapper.remove(); updateSubmitState(); });
                                    input.addEventListener('change', function () { validateInput(input); });

                                    wrapper.appendChild(input);
                                    wrapper.appendChild(remove);
                                    wrapper.appendChild(errorSpan);
                                    return wrapper;
                                }

                                // initialize existing inputs
                                container.querySelectorAll('input[name="detail_images[]"]').forEach(function (input) {
                                    if (!input.parentElement.querySelector('.detail-image-error')) {
                                        input.parentElement.appendChild(makeErrorSpan());
                                    }
                                    input.addEventListener('change', function () { validateInput(input); });
                                });

                                // Run initial validation pass and update submit button state
                                container.querySelectorAll('input[name="detail_images[]"]').forEach(function (input) {
                                    validateInput(input);
                                });
                                updateSubmitState();

                                // Safety: ensure submit is enabled when no invalid inputs
                                const initialInvalid = container.querySelectorAll('input[name="detail_images[]"][data-invalid="1"]').length > 0;
                                if (!initialInvalid && submitBtn) {
                                    submitBtn.disabled = false;
                                    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                                    submitBtn.removeAttribute('aria-disabled');
                                }

                                // Debug helper
                                console.debug('Project edit: submitBtn:', submitBtn, 'initialInvalid:', initialInvalid);
                                // Ensure button is not programmatically disabled and logs clicks
                                if (submitBtn) {
                                    try {
                                        submitBtn.disabled = false;
                                        submitBtn.style.pointerEvents = 'auto';
                                    } catch (e) { }
                                    submitBtn.addEventListener('click', function (ev) {
                                        console.debug('project-submit-btn clicked', { ariaDisabled: submitBtn.getAttribute('aria-disabled'), disabled: submitBtn.disabled });
                                        // If not aria-disabled, ensure form submits (fallback if some other script blocks default submit)
                                        const aria = submitBtn.getAttribute('aria-disabled');
                                        if (aria !== 'true') {
                                            try {
                                                ev.preventDefault();
                                                console.debug('Forcing form.submit() fallback');
                                                form.submit();
                                            } catch (err) {
                                                console.warn('Fallback submit failed', err);
                                            }
                                        } else {
                                            ev.preventDefault();
                                        }
                                    });
                                }

                                // Intercept submit: prevent submission if there are invalid image inputs
                                form.addEventListener('submit', function (e) {
                                    const invalidInputs = container.querySelectorAll('input[name="detail_images[]"][data-invalid="1"]');
                                    if (invalidInputs.length > 0) {
                                        e.preventDefault();
                                        const warningEl = form.querySelector('#detail-image-warning');
                                        if (warningEl) {
                                            warningEl.textContent = 'Terdapat gambar yang tidak valid. Periksa pesan merah di bawah input gambar.';
                                            warningEl.style.display = 'block';
                                        }
                                        invalidInputs[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                                        try { invalidInputs[0].focus(); } catch (err) { }
                                        return false;
                                    }
                                    if (submitBtn) submitBtn.removeAttribute('aria-disabled');
                                });

                                if (addBtn) {
                                    addBtn.addEventListener('click', function () {
                                        const row = createRow();
                                        container.appendChild(row);
                                        // ensure newly added input is in view
                                        row.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                        console.debug('add-detail-image clicked, new row appended');
                                    });
                                }

                                // Handle image delete buttons (avoid nested forms in the DOM)
                                document.querySelectorAll('.project-image-delete-btn').forEach(function (btn) {
                                    btn.addEventListener('click', function () {
                                        const action = btn.getAttribute('data-action');
                                        if (!action) return;
                                        if (!confirm('Hapus gambar ini?')) return;
                                        // build a standalone form and submit it
                                        const delForm = document.createElement('form');
                                        delForm.method = 'POST';
                                        delForm.action = action;
                                        delForm.style.display = 'none';
                                        const token = document.createElement('input');
                                        token.type = 'hidden';
                                        token.name = '_token';
                                        token.value = '{{ csrf_token() }}';
                                        const method = document.createElement('input');
                                        method.type = 'hidden';
                                        method.name = '_method';
                                        method.value = 'DELETE';
                                        delForm.appendChild(token);
                                        delForm.appendChild(method);
                                        document.body.appendChild(delForm);
                                        delForm.submit();
                                    });
                                });

                                // URL fields: client-side validation (non-blocking)
                                const projectUrlInput = form.querySelector('#project_url');
                                const githubUrlInput = form.querySelector('#github_url');
                                const projectUrlError = form.querySelector('#project-url-error');
                                const githubUrlError = form.querySelector('#github-url-error');

                                function checkUrlField(input, errorEl) {
                                    const val = (input.value || '').trim();
                                    if (!val) { errorEl.style.display = 'none'; return true; }
                                    try { new URL(val); errorEl.style.display = 'none'; return true; } catch (e) { errorEl.textContent = 'URL tidak valid.'; errorEl.style.display = 'block'; return false; }
                                }

                                if (projectUrlInput) { projectUrlInput.addEventListener('change', function () { checkUrlField(projectUrlInput, projectUrlError); }); }
                                if (githubUrlInput) { githubUrlInput.addEventListener('change', function () { checkUrlField(githubUrlInput, githubUrlError); }); }
                            });
                        </script>

                        <div>
                            <label for="project_url" class="block text-sm font-medium text-gray-700">URL Proyek</label>
                            <div class="mt-1 relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500"
                                    aria-hidden="true">🌐</span>
                                <input type="url" name="project_url" id="project_url" placeholder="https://example.com"
                                    value="{{ old('project_url', $project->project_url) }}"
                                    class="pl-10 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Opsional. Link live demo / website (sertakan https://).
                            </p>
                            <p id="project-url-error" class="mt-1 text-sm text-red-600" style="display:none"></p>
                        </div>

                        <div>
                            <label for="github_url" class="block text-sm font-medium text-gray-700">URL GitHub</label>
                            <div class="mt-1 relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500"
                                    aria-hidden="true">🐙</span>
                                <input type="url" name="github_url" id="github_url"
                                    placeholder="https://github.com/username/repo"
                                    value="{{ old('github_url', $project->github_url) }}"
                                    class="pl-10 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">
                            </div>
                            <p id="github-url-error" class="mt-1 text-sm text-red-600" style="display:none"></p>
                            <p class="mt-1 text-sm text-gray-500">Opsional. Link repository GitHub (https://github.com/...).
                            </p>
                        </div>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}
                                    class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="featured" class="font-medium text-gray-700">Proyek Unggulan</label>
                                <p class="text-gray-500">Tandai proyek ini sebagai proyek unggulan</p>
                            </div>
                        </div>

                        <div class="mt-2 text-sm text-red-600 hidden" id="detail-image-warning"></div>

                        <div class="flex justify-end">
                            <button type="submit" id="project-submit-btn"
                                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">Perbarui
                                Proyek</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
