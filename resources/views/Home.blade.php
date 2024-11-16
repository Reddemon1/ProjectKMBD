<x-layout>
<div>
    <!-- Hero Section -->
    <section class="shadow-lg rounded-lg p-6 bg-[#00ABFB] text-white py-20">
        <div class="container mx-auto text-center px-4">
            <h1 class="text-5xl font-bold mb-4">Welcome to KMBD</h1>
            <p class="text-lg mb-6">Keluarga Mahasiswa Buddhis
            Dhammavaddhana</p>
            <a href="/AboutUs" class="bg-white text-[#00ABFB] font-semibold px-6 py-3 rounded-full hover:bg-gray-100">
                Learn More
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-[#F3F4F6]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Our Features</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <div class="text-[#00ABFB] text-5xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="font-semibold text-xl">Production</h3>
                    <p class="text-gray-600 mt-2">nonton karya kita </p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <div class="text-[#00ABFB] text-5xl mb-4">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="font-semibold text-xl">Events</h3>
                    <p class="text-gray-600 mt-2">bisa daftar event bos</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <div class="text-[#00ABFB] text-5xl mb-4">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="font-semibold text-xl">Article</h3>
                    <p class="text-gray-600 mt-2">bisa baca artikel bos</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call-to-Action -->
    <section class="shadow-lg rounded-lg p-6 bg-[#00ABFB] bg-[#00ABFB] text-white py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Join Our Community Today!</h2>
            <p class="text-lg mb-6">Be part of something bigger. Connect, grow, and thrive with KMBD.</p>
            <a href="/Register" class="bg-white text-[#00ABFB] font-semibold px-6 py-3 rounded-full hover:bg-gray-100">
                Get Started
            </a>
        </div>
    </section>
</div>

<div class="production">
        <div class="card flex m-10 justify-between">
            <h1 class="text-2xl font-bold">All Production</h1>
            <button onclick="location.href='/Production'"
                class="mt-auto flex justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">See
                All Productions</button>
        </div>

        <div class="flex flex-col gap-1">
            <!-- Card 1 -->
            @foreach ($production as $data)
                <div class="w-full bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-3 mb-3"
                    style="height:390px;display: flex; flex-direction: row;">
                    <iframe class="rounded-l-lg w-5/12 h-auto" src="{{ $data->embeded_link }}">
                    </iframe>
                    <div class="p-2 flex-1 flex flex-col justify-between">
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
    </div>

    <div class="article">
        <div class="card flex m-10 justify-between">
            <h1 class="text-2xl font-bold">Article</h1>
            <button onclick="location.href='/Article'"
                class="mt-auto flex justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">See
                All Article</button>
        </div>

        <div class="flex flex-wrap gap-1 grid-cols-4 ">
            <!-- Card 1 -->
            @foreach ($article as $data)
                <div  onclick="location.href='{{ route('article-detail',$data->id)}}'" class="bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-0 mb-3"
                    style="width: 290px; display: flex; flex-direction: column;">
                    {{-- <img class="rounded-t-lg" src="{{ asset($data->image) }}" alt="" /> --}}
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
                                {!! Str::limit(strip_tags($data->content, 100)) !!}
                            </p>
                        </div>
                        <button onclick="location.href='{{ route('article-detail',$data->id)}}'"
                            class="mt-auto flex w-full justify-center rounded-md bg-[#00ABFB] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd]  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Read Detail
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="partner">
        <div class="card flex m-10 justify-between">
            <h1 class="text-2xl font-bold">All Partner</h1>
            <button onclick="location.href='/Partner'"
                class="mt-auto flex justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">See
                All Partner</button>
        </div>

        <div class="flex flex-wrap gap-1 grid-cols-4 justify-between">
            <!-- Card 1 -->
            @foreach ($partner as $data)
                <div class="front bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-3 mb-3"
                    style="width: 290px; height:310px;display: flex; flex-direction: column;">
                    <img class="rounded-t-lg w-[300px] h-[200px]" src="{{ asset($data->image) }}"
                        alt="{{ $data->name }}" />

                    <div class="p-2 flex-1 flex flex-col justify-between">
                        <div class="content">
                            <a href="#">
                                <h5 class="mb-2 text-xl font-extrabold tracking-tight text-black dark:text-black">
                                    {{ $data->name }}
                                </h5>
                            </a>
                            <p class="mb-2 text-xs font-normal text-gray-700 dark:text-gray-400">
                                {!! Str::limit(strip_tags($data->benefit, 100)) !!}
                            </p>
                        </div>
                        <button type="button"
                            class="read-detail-btn mt-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Read Detail
                        </button>
                    </div>
                </div>

                <div class="detail bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-3 mb-3"
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
                            class="close-detail-btn mt-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Close Detail
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="event">
        <div class="card flex m-10 justify-between">
            <h1 class="text-2xl font-bold">Our Event</h1>
            <button onclick="location.href='/Events'"
                class="mt-auto flex justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">See
                All Events</button>
        </div>

        <div class="flex flex-wrap gap-4 grid-cols-4 flex-row">
            <!-- Card 1 -->
            @foreach ($event as $data)
                <div onclick="location.href='{{ route('event-detail',$data->id)}}'" class="bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-0 mb-3"
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
                        @if ($data->date < date('Yyyy-mm-dd'))
                            <button onclick="location.href='{{ $data->registration_link }}'"
                                class="mt-auto flex w-full justify-center rounded-md bg-[#00ABFB] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd]">
                                Register
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- </div> --}}



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



</x-layout>
