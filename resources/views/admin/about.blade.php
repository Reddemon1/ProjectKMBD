<x-adminlayout>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill for 'logo_desc'
            if (document.getElementById('logo_desc')) {
                var editorLogoDesc = new Quill('#quill-editor-logo_desc', {
                    theme: 'snow'
                });
                var quillEditorLogoDesc = document.getElementById('logo_desc');
                editorLogoDesc.on('text-change', function() {
                    quillEditorLogoDesc.value = editorLogoDesc.root.innerHTML;
                });
                quillEditorLogoDesc.addEventListener('input', function() {
                    editorLogoDesc.root.innerHTML = quillEditorLogoDesc.value;
                });
            }
            if (document.getElementById('organization_desc')) {
                var editorLogoDesc = new Quill('#quill-editor-organization_desc', {
                    theme: 'snow'
                });
                var quillEditorLogoDesc = document.getElementById('organization_desc');
                editorLogoDesc.on('text-change', function() {
                    quillEditorLogoDesc.value = editorLogoDesc.root.innerHTML;
                });
                quillEditorLogoDesc.addEventListener('input', function() {
                    editorLogoDesc.root.innerHTML = quillEditorLogoDesc.value;
                });
            }
            // Initialize Quill for 'vision'
            if (document.getElementById('vision')) {
                var editorVision = new Quill('#quill-editor-vision', {
                    theme: 'snow'
                });
                var quillEditorVision = document.getElementById('vision');
                editorVision.on('text-change', function() {
                    quillEditorVision.value = editorVision.root.innerHTML;
                });
                quillEditorVision.addEventListener('input', function() {
                    editorVision.root.innerHTML = quillEditorVision.value;
                });
            }

            // Initialize Quill for 'mission'
            if (document.getElementById('mission')) {
                var editorMission = new Quill('#quill-editor-mission', {
                    theme: 'snow'
                });
                var quillEditorMission = document.getElementById('mission');
                editorMission.on('text-change', function() {
                    quillEditorMission.value = editorMission.root.innerHTML;
                });
                quillEditorMission.addEventListener('input', function() {
                    editorMission.root.innerHTML = quillEditorMission.value;
                });
            }
        });
    </script>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class=" sm:mx-auto sm:w-full sm:max-w-2xl">
            <form class="space-y-3" action="{{ route('req-edit-about') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="structure" class="block text-sm font-medium leading-6 text-gray-900">Structure</label>
                    <img src="{{asset($data->structure)}}" width="100" alt="">
                    <div class="mt-2">
                        <input id="structure" name="structure" type="file" accept="image/png, image/gif, image/jpeg"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('structure')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="logo" class="block text-sm font-medium leading-6 text-gray-900">logo</label>
                    <img src="{{asset($data->logo)}}" width="100" alt="">
                    
                    <div class="mt-2">
                        <input id="logo" name="logo" type="file" accept="image/png, image/gif, image/jpeg"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('logo')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>


                <div>
                    <label for="logo_desc" class="block text-sm font-medium leading-6 text-gray-900">Logo Desc</label>
                    <div id="quill-editor-logo_desc" class="mb-3" style="height: 300px;">{!!$data->logo_desc!!}</div>
                    <textarea hidden name="logo_desc" id="logo_desc">{{$data->logo_desc}}</textarea>
                    @error('logo_desc')
                        <label class="text-red-500">{{ $message }}</label>
                    @enderror
                </div>
                <div>
                    <label for="organization_desc" class="block text-sm font-medium leading-6 text-gray-900">Organization Desc</label>
                    <div id="quill-editor-organization_desc" class="mb-3" style="height: 300px;">{!!$data->organization_desc!!}</div>
                    <textarea hidden name="organization_desc" id="organization_desc">{{$data->organization_desc}}</textarea>
                    @error('organization_desc')
                        <label class="text-red-500">{{ $message }}</label>
                    @enderror
                </div>
                <div>
                    <label for="vision" class="block text-sm font-medium leading-6 text-gray-900">vision</label>
                    <div id="quill-editor-vision" class="mb-3" style="height: 300px;">{!!$data->vision!!}</div>
                    <textarea hidden name="vision" id="vision">{{$data->vision}}</textarea>
                    @error('vision')
                        <label class="text-red-500">{{ $message }}</label>
                    @enderror
                </div>
                <div>
                    <label for="mission" class="block text-sm font-medium leading-6 text-gray-900">mission</label>
                    <div id="quill-editor-mission" class="mb-3" style="height: 300px;">{!!$data->mission !!}</div>
                    <textarea hidden name="mission" id="mission">{{$data->mission}}</textarea>
                    @error('mission')
                        <label class="text-red-500">{{ $message }}</label>
                    @enderror
                </div>
                <div>
                    <label for="period" class="block text-sm font-medium leading-6 text-gray-900">Period</label>
                    <div class="mt-2">
                        <input id="period" name="period" type="number" value="{{$data->period}}" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('period')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="active_members" class="block text-sm font-medium leading-6 text-gray-900">Active Members</label>
                    <div class="mt-2">
                        <input id="active_members" name="active_members" type="number" value="{{$data->active_members}}" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('active_members')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="area" class="block text-sm font-medium leading-6 text-gray-900">Area</label>
                    <div class="mt-2">
                        <input id="area" name="area" type="text" value="{{$data->area}}" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('area')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="alumni_count" class="block text-sm font-medium leading-6 text-gray-900">Almuni Count</label>
                    <div class="mt-2">
                        <input id="alumni_count" name="alumni_count" type="text" value="{{$data->alumni_count}}" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('alumni_count')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update About Us</button>
                </div>
            </form>

        </div>
    </div>
</x-adminlayout>
