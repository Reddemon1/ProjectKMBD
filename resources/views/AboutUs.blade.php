<x-layout>
  <div class=" text-white py-8">
    <div class="container mx-auto text-center">
        <h1 class="text-[black] text-4xl font-bold">About Us</h1>
    </div>
</div>

<div class="container mx-auto my-10 px-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">What is KMBD?</h2>
        {!! $about->organization_desc !!}
    </div>

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-2">Our Vision</h3>
            {!! $about->vision !!}
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-2">Our Mission</h3>
            {!! $about->mission !!}
        </div>
    </div>
</div>
   <!-- Logo and Makna Logo Section -->
   <div class="my-12 bg-white shadow-lg rounded-lg p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
            <!-- Logo -->
            <div class="text-center">
                <div class="bg-gray-50 rounded-lg shadow-lg p-8 inline-block">
                    <img src="{{ asset($about->logo) }}" alt="KMBD Logo" class="w-48 mx-auto">
                </div>
            </div>

            <!-- Makna Logo -->
            <div>
                <h3 class="text-3xl font-bold mb-4 text-center lg:text-left">Makna Logo</h3>
                {!! $about->logo_desc !!}
            </div>
        </div>
    </div>

    <!-- Quick Facts Section -->
    <div class="bg-white shadow-lg rounded-lg p-6 my-12">
        <h3 class="text-2xl font-bold text-center mb-4">Our Organization</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <!-- Fact 1 -->
            <div class="bg-gray-50 rounded-lg shadow-lg p-6">
                <h4 class="text-xl font-bold text-[#00ABFB]">{{ $about->period}}</h4>
                <p class="text-gray-600">Period since 1989</p>
            </div>
            <!-- Fact 2 -->
            <div class="bg-gray-50 rounded-lg shadow-lg p-6">
                <h4 class="text-xl font-bold text-[#00ABFB]">{{ $about->alumni_count }}</h4>
                <p class="text-gray-600">Alumni since 1989</p>
            </div>
            <!-- Fact 3 -->
            <div class="bg-gray-50 rounded-lg shadow-lg p-6">
                <h4 class="text-xl font-bold text-[#00ABFB]">{{ $about->active_members }}</h4>
                <p class="text-gray-600">Active Members</p>
                <p class="text-gray-500 text-sm">From BINUS {{  $about->area }}</p>
            </div>
        </div>
    </div>
</div>
</x-layout>
