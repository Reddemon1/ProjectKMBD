<x-layout>
    <div class="flex items-center flex-col">
    <img class="rounded-lg w-[400px] h-[200px]" src="{{ asset($data->image) }}" alt="{{ $data->title }}" />

    <h5 class="mb-2 my-10 text-4xl font-extrabold tracking-tight text-black dark:text-black">
        {{ $data->title }}
    </h5>

    <div class="font-xl my-10">
    {!! $data->content !!}
    </div>

    <div class="font-xl my-10">
        <h1>Writer: {{ $data->writer }}</h1>
    </div>
</div>

</x-layout>
