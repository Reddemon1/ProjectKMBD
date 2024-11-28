
<x-layout>
  <h1 class="text-3xl font-bold my-10">Partner</h1>
  <div class="partner">

  <div class="flex flex-wrap gap-1 grid-cols-4 ">
            <!-- Card 1 -->
            @foreach ($partner as $data)
                <div class="front bg-white border border-transparent rounded-lg shadow dark:bg-white dark:border-transparent mx-0 mb-3"
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
                                {!! Str::limit($data->benefit, 100) !!}
                            </p>
                        </div>
                        <button type="button"
                            class="read-detail-btn mt-auto flex w-full justify-center rounded-md bg-[#00ABFB] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
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
                            class="close-detail-btn mt-auto flex w-full justify-center rounded-md bg-[#00ABFB] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:text-[#dddddd] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Close Detail
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
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
</x-layout>