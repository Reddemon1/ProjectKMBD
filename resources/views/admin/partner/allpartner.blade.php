<x-adminlayout>
    <div class="flex justify-between">
        <h1 class="my-3 text-5xl font-bold">Partners</h1>
        <button onclick="location.href = '{{ route('add-new-partner') }}'"
            class="rounded-md bg-red-600 px-20 py-1.5 text-xl my-3 font-semibold leading-6 text-white">Add New
            Partner</button>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <td scope="col" class="px-6 py-3">ID</td>
                <td scope="col" class="px-6 py-3">Name</td>
                <td scope="col" class="px-6 py-3">image</td>
                <td scope="col" class="px-6 py-3">Benefit</td>
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
                    <td class="px-6 py-4">{{ $data->name }}</td>
                    <td class="px-6 py-4"><img src="{{ asset($data->image) }}" alt="" width="50px"
                            height="50px"></td>
                    <td class="px-6 py-4">{!! $data->benefit !!}</td>
                    <td class="px-6 py-4">{{ $data->category }}</td>
                    <td class="px-6 py-4 flex">
                        <form action="{{ route('req-delete-partner', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white">Delete</button>
                        </form>
                        <button class="rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white"
                            onclick="location.href = '{{ route('edit-partner', $data->id) }}'">Edit</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-adminlayout>
