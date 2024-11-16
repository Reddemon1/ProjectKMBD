<x-adminlayout>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('benefit')) {
                var editor = new Quill('#quill-editor', {
                    theme: 'snow'
                });
                var quillEditor = document.getElementById('benefit');
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
            <form class="space-y-3" action="{{ route('req-edit-partner',$partner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="name" autocomplete="name" value="{{ $partner->name }}" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('name')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">image</label>
                    <div class="mt-2">
                        <input id="image" name="image" type="file" accept="image/png, image/gif, image/jpeg" 
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('image')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="benefit" class="block text-sm font-medium leading-6 text-gray-900">Benefit</label>
                    <div id="quill-editor" class="mb-3" style="height: 300px;">{!! $partner->benefit !!}</div>
                    <textarea hidden rows="3" class="mb-3 d-none" name="benefit" id="benefit">{{ $partner->benefit}}</textarea>
                    @error('benefit')
                        <label class="text-red-500">{{ $message }}</label>
                    @enderror
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                    <div class="mt-2">
                        <select id="category" name="category" type="category" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="Card">Card</option>
                            <option value="Sponsor">Sponsor</option>
                            <option value="MediaPartner">MediaPartner</option>
                        </select>
                            @error('category')
                            <label class="text-red-500">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit
                        Partner</button>
                </div>
            </form>

        </div>
    </div>
</x-adminlayout>
