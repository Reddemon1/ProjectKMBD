<x-layout>

  <h1 class="text-3xl font-bold my-10">Event</h1>
    <div class="event">

        <div class="flex flex-wrap gap-1 grid-cols-4 justify-between">
            <!-- Card 1 -->
            @foreach ($event as $data)
                <div class="bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-3 mb-3"
                    style="width: 290px; height:410px;display: flex; flex-direction: column;">
                    <img class="rounded-t-lg w-[300px] h-[200px]" src="{{ asset($data->image) }}"
                        alt="{{ $data->title }}" />

                    <div class="p-2 flex-1 flex flex-col justify-between">
                        <div class="content">
                            <a href="#">
                                <h5 class="mb-2 text-xl font-extrabold tracking-tight text-black dark:text-black">
                                    {{ $data->title }}
                                </h5>
                            </a>
                            <p class="mb-2 text-xs font-normal text-gray-700 dark:text-gray-400">
                                {!! Str::limit($data->description, 100) !!}
                            </p>
                            <p class="mb-2 text-m font-normal text-black my-3">
                                <span class="font-bold">Date : </span>{{ $data->date }}
                            </p>
                        </div>
                        @if ($data->date < date('yyyy-mm-dd'))
                            <button onclick="location.href='{{ $data->registration_link }}'"
                                class="mt-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Register
                            </button>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
