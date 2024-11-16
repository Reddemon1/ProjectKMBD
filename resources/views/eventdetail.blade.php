<x-layout>
    <div class="flex items-center flex-col">
    <img class="rounded-lg w-[400px] h-[200px]" src="{{ asset($data->image) }}" alt="{{ $data->title }}" />

    <h5 class="mb-2 my-10 text-4xl font-extrabold tracking-tight text-black dark:text-black">
        {{ $data->title }}
    </h5>

    <div class="font-xl my-10">
    {!! $data->description !!}
    </div>

    <div class="my-10 text-center">
        <h1 class="font-bold">Event Date : {{ $data->date }}</h1>
        <h1 class="font-bold">Uploader: {{ $data->user->name }}</h1>
    </div>
</div>

</x-layout>
