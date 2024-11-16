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
            <form class="space-y-3" action="{{ route('req-edit-production',$production->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input id="title" name="title" type="title" autocomplete="title" value="{{ $production->title }}" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('title')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div id="quill-editor" class="mb-3" style="height: 300px;">{!! $production->title !!}</div>
                    <textarea hidden rows="3" class="mb-3 d-none" name="description" id="description">{{ $production->title }}</textarea>
                    @error('description')
                        <label class="text-red-500">{{ $message }}</label>
                    @enderror
                </div>
                <div>
                    <label for="embedded_link" class="block text-sm font-medium leading-6 text-gray-900">Embedded link</label>
                    <div class="mt-2">
                        <input id="embeded_link" name="embeded_link" value="{{ $production->embeded_link }}" type="text" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('embeded_link')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                    <div class="mt-2">
                        <select id="category" name="category" type="category" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="Video" @selected($production->category == "Video")>Video</option>
                            <option value="Podcast" @selected($production->category == "Podcast")>Podcast</option>
                        </select>
                            @error('category')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit
                        Production</button>
                </div>
            </form>

        </div>
    </div>
</x-adminlayout>
