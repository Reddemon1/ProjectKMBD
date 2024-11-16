<x-layout>
<x-slot:title>
    {{ $title  }}
  </x-slot:title>
  <div class=" text-white py-8">
    <div class="container mx-auto text-center">
        <h1 class="text-[black] text-4xl font-bold">About Us</h1>
    </div>
</div>

<div class="container mx-auto my-10 px-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">What is KMBD?</h2>
        <p class="text-gray-700 leading-relaxed">
        KMB Dhammavaddhana berdiri pada tanggal 25 Juni 1989, ditandai dengan hadirnya 30 orang mahasiswa buddhis. Pada saat itu pula dibentuk struktur organisasi, proposal pembentukan organisasi, dan pemberian nama Keluarga Mahasiswa Buddhis Dhammavaddhana. Peresmian kepengurusan KMBD dilaksanakan pada tanggal 2 Juli 1989 secara sederhana dengan kebaktian dan pemberkahan oleh Bhikkhu Cittasanto dan Bhikkhu Andhanavira.
        </p>
    </div>

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-2">Our Vision</h3>
            <p class="text-gray-600">
            Menjadi Unit Kegiatan Mahasiswa Buddhis Universitas Bina Nusantara yang mempunyai komitmen terhadap kelestarian agama Buddha, menjunjung tinggi HAM, dan memanfaatkan Teknologi Informasi demi kesejahteraan dan kebahagiaan semua makhluk.
            </p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-2">Our Mission</h3>
            <p class="text-gray-600">
            Mengembangkan kreativitas bercorak buddhis dalam berkarya dan berbudaya. Mewujudkan wadah pematangan Buddhis dalam berpikir dan berpandangan. Meningkatkan pengetahuan agama Buddha baik teori maupun praktek. Menyokong pembabaran dhamma demi kelestarian Agama Buddha. Menegakkan kemoralan (sila) dan nilai-nilai kemanusiaan.
            </p>
        </div>
    </div>
</div>
   <!-- Logo and Makna Logo Section -->
   <div class="my-12 bg-white shadow-lg rounded-lg p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
            <!-- Logo -->
            <div class="text-center">
                <div class="bg-gray-50 rounded-lg shadow-lg p-8 inline-block">
                    <img src="{{ asset('img/kmbd-logo-main.png') }}" alt="KMBD Logo" class="w-48 mx-auto">
                </div>
            </div>

            <!-- Makna Logo -->
            <div>
                <h3 class="text-3xl font-bold mb-4 text-center lg:text-left">Makna Logo</h3>
                <ul class="list-disc text-gray-700">
                    <li>
                        <span class="font-bold">Stupa:</span> Seperti stupa Borobudur melambangkan ciri khas Buddhis Indonesia dan meditasi yang kuat.
                    </li>
                    <li>
                        <span class="font-bold">Lima Kelopak Teratai:</span> Melambangkan Pancasila RI, Pancasila Buddhis, dan kebijaksanaan yang berkembang harum dan indah.
                    </li>
                    <li>
                        <span class="font-bold">Dua Wajah Abstrak:</span> Mencerminkan intelektualitas mahasiswa Buddhis.
                    </li>
                    <li>
                        <span class="font-bold">Lingkaran:</span> Menggambarkan kekeluargaan KMBD.
                    </li>
                    <li>
                        <span class="font-bold">Tulisan:</span> “Unit Kegiatan Mahasiswa KMBD BINUS UNIVERSITY” adalah nama organisasi mahasiswa Buddhis di BINUS.
                    </li>
                    <li>
                        <span class="font-bold">Warna Biru:</span> Melambangkan semangat mahasiswa Buddhis di BINUS untuk berbakti kepada Triratna.
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Quick Facts Section -->
    <div class="bg-white shadow-lg rounded-lg p-6 my-12">
        <h3 class="text-2xl font-bold text-center mb-4">Our Organization</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <!-- Fact 1 -->
            <div class="bg-gray-50 rounded-lg shadow-lg p-6">
                <h4 class="text-xl font-bold text-[#00ABFB]">35</h4>
                <p class="text-gray-600">Period since 1989</p>
            </div>
            <!-- Fact 2 -->
            <div class="bg-gray-50 rounded-lg shadow-lg p-6">
                <h4 class="text-xl font-bold text-[#00ABFB]">3000+</h4>
                <p class="text-gray-600">Alumni since 1989</p>
            </div>
            <!-- Fact 3 -->
            <div class="bg-gray-50 rounded-lg shadow-lg p-6">
                <h4 class="text-xl font-bold text-[#00ABFB]">385</h4>
                <p class="text-gray-600">Active Members</p>
                <p class="text-gray-500 text-sm">From BINUS Kemanggisan, Alam Sutera, Bekasi, Bandung, and Malang</p>
            </div>
        </div>
    </div>
</div>
</x-layout>