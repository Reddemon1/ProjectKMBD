<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Organization;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // $this->call([
        //     ArticleSeeder::class,
        // ]);

        // $article = Article::factory()->count(10)->create();

        // Article::create($article);
        Organization::factory()->create([
            'structure' => 'img\kmbd-logo-main.png',
            'logo' => 'img\kmbd-logo-main.png',
            'logo_desc' => '<ul class="list-disc text-gray-700">
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
                </ul>',
            'vision' => '<p class="text-gray-600">
            Menjadi Unit Kegiatan Mahasiswa Buddhis Universitas Bina Nusantara yang mempunyai komitmen terhadap kelestarian agama Buddha, menjunjung tinggi HAM, dan memanfaatkan Teknologi Informasi demi kesejahteraan dan kebahagiaan semua makhluk.
            </p>',
            'mission' => '<p class="text-gray-600">
            Mengembangkan kreativitas bercorak buddhis dalam berkarya dan berbudaya. Mewujudkan wadah pematangan Buddhis dalam berpikir dan berpandangan. Meningkatkan pengetahuan agama Buddha baik teori maupun praktek. Menyokong pembabaran dhamma demi kelestarian Agama Buddha. Menegakkan kemoralan (sila) dan nilai-nilai kemanusiaan.
            </p>',
            'organization_desc' => '<p class="text-gray-700 leading-relaxed">
            KMB Dhammavaddhana berdiri pada tanggal 25 Juni 1989, ditandai dengan hadirnya 30 orang mahasiswa buddhis. Pada saat itu pula dibentuk struktur organisasi, proposal pembentukan organisasi, dan pemberian nama Keluarga Mahasiswa Buddhis Dhammavaddhana. Peresmian kepengurusan KMBD dilaksanakan pada tanggal 2 Juli 1989 secara sederhana dengan kebaktian dan pemberkahan oleh Bhikkhu Cittasanto dan Bhikkhu Andhanavira.
            </p>',
            'period' => '35',
            'active_members' => '350',
            'area' => 'Kemanggisan, Alam Sutera, Bekasi, Bandung, and Malang',
            'alumni_count' => '3000+',
        ]);

        User::factory()->create([
            'name' => 'Rionaldo Tio',
            'email' => 'rionaldo0567@gmail.com',
            'password' => bcrypt('rionaldo1'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Fedrick Pembunuh',
            'email' => 'fedrick@gmail.com',
            'password' => bcrypt('fedrick1'),
            'role' => 'aktivis'
        ]);

        User::factory()->create([
            'name' => 'Raymond Pencabut',
            'email' => 'raymond@gmail.com',
            'password' => bcrypt('raymond1')
        ]);
    }
}
