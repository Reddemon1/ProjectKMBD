<x-layout>
    {{-- <x-slot:title>
      {{ $title  }}
    </x-slot:title> --}}

    <div class="min-h-full">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('RequestRegister') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full Name</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" autocomplete="name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('name')
                                <label class="text-red-500">{{ $message }}</label>
                            @enderror
                              </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            address</label>
                        <div class="mt-2">

                            <input id="email" name="email" type="email" autocomplete="email" required
                                class=" block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('email')
                                <label class="text-red-500">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('password')
                                <label class="text-red-500">{{ $message }}</label>
                            @enderror
                              </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-[#00ABFB] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd]  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-layout>
