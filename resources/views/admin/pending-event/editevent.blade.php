<x-adminlayout>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('description')) {
                var editor = new Quill('#quill-editor', {
                    theme: 'snow'
                });
                var quillEditor = document.getElementById('description');
                editor.on('text-change', function() {
                    quillEditor.value = editor.root.innerHTML;
                });
                quillEditor.addEventListener('input', function() {
                    editor.root.innerHTML = quillEditor.value;
                });
            }
        });
    </script>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class=" sm:mx-auto sm:w-full sm:max-w-2xl">
            <form class="space-y-3" action="{{ route('req-edit-pending-event',$event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input id="title" name="title" type="title" autocomplete="title" value="{{ $event->title }}" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('title')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                    <div class="mt-2">
                        <input id="image" name="image" type="file" accept="image/png, image/gif, image/jpeg"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('image')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div id="quill-editor" class="mb-3" style="height: 300px;">{!! $event->description !!}</div>
                    <textarea hidden rows="3" class="mb-3 d-none" name="description" id="description" >{{ $event->description }}</textarea>
                    @error('description')
                        <label class="text-red-500">{{ $message }}</label>
                    @enderror
                </div>

                <div>
                    <label for="Date" class="block text-sm font-medium leading-6 text-gray-900">date</label>
                    <div class="mt-2">
                        <input id="date" name="date" type="date" value="{{ $event->date }}" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('date')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="registration_link" class="block text-sm font-medium leading-6 text-gray-900">Registration Link</label>
                    <div class="mt-2">
                        <input id="registration_link" name="registration_link" type="text" value="{{ $event->registration_link }}" autocomplete="registration_link" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('registration_link')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="writer" class="block text-sm font-medium leading-6 text-gray-900">Uploader</label>
                    <div class="mt-2">
                        <input id="user_id" name="user_id" type="text" value="{{ $user_name->name }}" disabled required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('uploader')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">update
                        event</button>
                </div>
            </form>

        </div>
    </div>
</x-adminlayout>
