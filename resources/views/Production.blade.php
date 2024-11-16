
<x-layout>
  
  <h1 class="text-3xl font-bold my-10">Production</h1>
  <div class="production">

    <div class="">
        <!-- Card 1 -->
        @foreach ($production as $data)
            <div class="w-full bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-3 mb-3"
                style="height:390px;display: flex; flex-direction: row;">
                <iframe class="rounded-l-lg w-5/12 h-auto" src="{{ $data->embeded_link }}">
                </iframe <div class="p-2 flex-1 flex flex-col justify-between">
                <div class="content w-10/12 mx-10 my-10 overflow-y-auto">
                    <a href="#">
                        <h5 class="mb-2 text-xl font-extrabold tracking-tight text-black dark:text-black">
                            {{ $data->title }}
                        </h5>
                    </a>
                    <p class="mb-2 text-xs font-normal text-gray-700 dark:text-gray-400">
                        {!! $data->description !!}
                    </p>
                </div>

            </div>
    </div>
    @endforeach
</div>
</x-layout>