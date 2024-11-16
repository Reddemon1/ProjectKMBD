<x-adminlayout>
    <div class="flex justify-between">
        <h1 class="my-3 text-5xl font-bold">Production</h1>
        <button onclick="location.href = '{{ route('add-new-production') }}'"
            class="rounded-md bg-red-600 px-20 py-1.5 text-xl my-3 font-semibold leading-6 text-white">Add New
            Production</button>
    </div>
    <div class="overflow-x-scroll">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <td scope="col" class="px-6 py-3">ID</td>
                <td scope="col" class="px-6 py-3">Title</td>
                <td scope="col" class="px-6 py-3">Vidio</td>
                <td scope="col" class="px-6 py-3">Description</td>
                <td scope="col" class="px-6 py-3">Embedded Link</td>
                <td scope="col" class="px-6 py-3">Category</td>
                <td scope="col" class="px-6 py-3">Action</td>
            </tr>
        </thead>
        <tbody>
            {{-- {{ var_dump($datas) }} --}}
            @foreach ($datas as $data)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data->id }}</td>
                    <td class="px-6 py-4">{{ $data->title }}</td>
                    <td class="px-6 py-4"><iframe width="420" height="315"
                        src="{{ $data->embeded_link}}">
                        </iframe></td>
                    <td class="px-6 py-4">{!! $data->description !!}</td>
                    <td class="px-6 py-4">{{ $data->embeded_link }}</td>
                    <td class="px-6 py-4">{{ $data->category }}</td>
                    <td class="px-6 py-4 flex">
                        <form action="{{ route('req-delete-production', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white">Delete</button>
                        </form>
                        <button
                            class="rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white" onclick="location.href = '{{ route('edit-production',$data->id) }}'">Edit</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
</x-adminlayout>
