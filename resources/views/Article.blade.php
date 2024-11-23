<x-layout>
    <h1 class="text-3xl font-bold my-10">Article</h1>

    <div class="flex flex-wrap gap-1 grid-cols-4 justify-between">
        <!-- Card 1 -->
        @foreach ($datas as $data)
                <div class="bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-0 mb-3"
                    style="width: 290px; display: flex; flex-direction: column;">
                    {{-- <img class="rounded-t-lg" src="{{ asset($data->image) }}" alt="" /> --}}
                    <img class="rounded-t-lg w-[300px] h-[200px]" src="{{ asset($data->image) }}"
                        alt="{{ $data->title }}" />

                    <div class="p-2 flex-1 flex flex-col justify-between">
                        <div class="content">
                            <p href="#">
                                <h5 class="mb-2 text-xl font-extrabold tracking-tight text-black dark:text-black">
                                    {{ $data->title }}
                                </h5>
                            </p>
                            <p class="mb-2 text-xs font-normal text-gray-700 dark:text-gray-400">
                                {!! Str::limit(strip_tags($data->content, 100)) !!}
                            </p>
                        </div>
                        <a href="{{ route('article-detail',$data->id)}}'"
                            class="mt-auto flex w-full justify-center rounded-md bg-[#00ABFB] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd]  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Read Detail
                        </a>
                    </div>
                </div>
            @endforeach
    </div>
</x-layout>
