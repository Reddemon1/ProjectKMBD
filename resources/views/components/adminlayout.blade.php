<!DOCTYPE html >
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> 
    <title>Home</title>
</head>

<body class="h-full">

<div class="min-h-full">
  <x-adminnavbar> </x-navbar>

  {{-- <x-header> {{$title}} </x-header> --}}
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{$slot}}
    </div>
  </main>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const readButtons = document.querySelectorAll('.read-detail-btn');
      const closeButtons = document.querySelectorAll('.close-detail-btn');
      const allFronts = document.querySelectorAll('.front');
      const allDetails = document.querySelectorAll('.detail');

      readButtons.forEach((btn, index) => {
          btn.addEventListener('click', () => {
              allFronts[index].style.display = 'none';  // Hide the front
              allDetails[index].style.display = 'flex'; // Show the detail
          });
      });

      closeButtons.forEach((btn, index) => {
          btn.addEventListener('click', () => {
              allFronts[index].style.display = 'flex';  // Show the front
              allDetails[index].style.display = 'none'; // Hide the detail
          });
      });
  });
</script>
</body>
</html>
