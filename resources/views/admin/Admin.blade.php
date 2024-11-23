<x-adminlayout>

    @if (Auth::user()->role == 'admin')
    <div class="article">
        <div class="card flex m-10 justify-between">
            <h1 class="text-2xl font-bold">Article</h1>
            <a href="{{ route('all-articles') }}"
                class="mt-auto flex justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">See
                All Article</a>
        </div>

        <div class="flex flex-wrap gap-1 grid-cols-4  ">
            <!-- Card 1 -->
            @foreach ($article as $data)
                <div class="bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-0 mb-3"
                    style="width: 290px; display: flex; flex-direction: column;">
                    {{-- <img class="rounded-t-lg" src="{{ asset($data->image) }}" alt="" /> --}}
                    <img class="rounded-t-lg w-[300px] h-[200px]" src="{{ asset($data->image) }}"
                        alt="{{ $data->title }}" />

                    <div class="p-2 flex-1 flex flex-col justify-between">
                        <div class="content">
                            <p>
                                <h5 class="mb-2 text-xl font-extrabold tracking-tight text-black dark:text-black">
                                    {{ $data->title }}
                                </h5>
                            </p>
                            <p class="mb-2 text-xs font-normal text-gray-700 dark:text-gray-400">
                                {!! Str::limit(strip_tags($data->content, 100)) !!}
                            </p>
                        </div>
                        <a href="{{ route('article-detail',$data->id)}}'"
                            class="mt-auto flex w-full justify-center rounded-md bg-[#991B1B] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd]  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Read Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="partner">
        <div class="card flex m-10 justify-between">
            <h1 class="text-2xl font-bold">All Partner</h1>
            <a href="{{ route('all-partners') }}"
                class="mt-auto flex justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">See
                All Partner</a>
        </div>

        <div class="flex flex-wrap gap-1 grid-cols-4 ">
            <!-- Card 1 -->
            @foreach ($partner as $data)
                <div class="front bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-0 mb-3"
                    style="width: 290px; height:310px;display: flex; flex-direction: column;">
                    <img class="rounded-t-lg w-[300px] h-[200px]" src="{{ asset($data->image) }}"
                        alt="{{ $data->name }}" />

                    <div class="p-2 flex-1 flex flex-col justify-between">
                        <div class="content">
                            <a >
                                <h5 class="mb-2 text-xl font-extrabold tracking-tight text-black dark:text-black">
                                    {{ $data->name }}
                                </h5>
                            </a>
                            <p class="mb-2 text-xs font-normal text-gray-700 dark:text-gray-400">
                                {!! Str::limit($data->benefit, 100) !!}
                            </p>
                        </div>
                        <button type="button"
                        class="read-detail-btn mt-auto flex w-full justify-center rounded-md bg-[#991B1B] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Read Detail
                        </button>
                    </div>
                </div>

                <div class="detail bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-0 mb-3"
                    style="width: 290px; height:310px; display: none; flex-direction: column;">
                    <div class="p-2 flex-1 flex flex-col justify-between">
                        <div class="content mx-5 my-5">
                            <a href="#">
                                <h5 class="mb-2 text-xl font-extrabold tracking-tight text-black dark:text-black">
                                    {{ $data->name }}
                                </h5>
                            </a>
                            <p class="mb-2 text-xs font-normal text-gray-700 dark:text-gray-400">
                                {!! $data->benefit !!}
                            </p>
                        </div>
                        <button type="button"
                        class="close-detail-btn mt-auto flex w-full justify-center rounded-md bg-[#991B1B] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Close Detail
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="production">
        <div class="card flex m-10 justify-between">
            <h1 class="text-2xl font-bold">All Production</h1>
            <a href="{{ route('all-productions') }}"
                class="mt-auto flex justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">See
                All Productions</a>
        </div>

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
            @endforeach
        </div>
    </div>
    @endif
    
    <div class="event">
        <div class="card flex m-10 justify-between">
            <h1 class="text-2xl font-bold">Our Event</h1>
            <a href="{{ route('all-events') }}"
                class="mt-auto flex justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">See
                All Events</a>
        </div>

        <div class="flex flex-wrap gap-4 grid-cols-4 flex-row">
            <!-- Card 1 -->
            @foreach ($event as $data)
            
                <div class="bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-0 mb-3"
                    style="width: 290px; display: flex; flex-direction: column;">
                    <img class="rounded-t-lg w-[300px] h-[200px]" src="{{ asset($data->image) }}"
                        alt="{{ $data->title }}" />
                    <div class="p-2 flex-1 flex flex-col justify-between w-auto">
                        <div class="content">
                            <h5 class="mb-2 text-xl font-extrabold tracking-tight text-black dark:text-black">
                                {{ $data->title }}
                            </h5>
                            <p class="mb-2 text-xs font-normal text-gray-700 dark:text-gray-400">
                                {!! Str::limit(strip_tags($data->description, 100)) !!}
                            </p>
                            <p class="mb-2 text-m font-normal text-black my-3">
                                <span class="font-bold">Date:</span> {{ $data->date }}
                            </p>
                        </div>
                        @if ($data->date >= date('Y-m-d'))
                            <a href="{{ $data->registration_link }}""
                                class="mt-auto flex w-full justify-center rounded-md bg-[#991B1B] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd]">
                                Register
                            </a>
                            @else
                                 <p>Registration not available</p>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const readButtons = document.querySelectorAll('.read-detail-btn');
            const closeButtons = document.querySelectorAll('.close-detail-btn');
            const allFronts = document.querySelectorAll('.front');
            const allDetails = document.querySelectorAll('.detail');

            readButtons.forEach((btn, index) => {
                btn.addEventListener('click', () => {
                    allFronts[index].style.display = 'none'; // Hide the front
                    allDetails[index].style.display = 'flex'; // Show the detail
                });
            });

            closeButtons.forEach((btn, index) => {
                btn.addEventListener('click', () => {
                    allFronts[index].style.display = 'flex'; // Show the front
                    allDetails[index].style.display = 'none'; // Hide the detail
                });
            });
        });
    </script>




</x-adminlayout>
