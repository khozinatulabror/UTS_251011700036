<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'book_id' => 1,
                'reviewer' => 'Arief Alkhoir',
                'rating' => 5,
                'review_text' => 'Buku ini memiliki cerita yang menarik, bahasa yang mudah dipahami, dan memberikan banyak pelajaran positif.',
                'created_at' => now(),
            ],
            [
                'book_id' => 2,
                'reviewer' => 'Dina Putri',
                'rating' => 4,
                'review_text' => 'Isi buku cukup menarik dan informatif. Beberapa bagian memberikan sudut pandang baru bagi pembaca.',
                'created_at' => now(),
            ],
            [
                'book_id' => 3,
                'reviewer' => 'Rizky Ramadhan',
                'rating' => 5,
                'review_text' => 'Buku ini sangat bagus dan layak dibaca karena memiliki pesan yang bermanfaat.',
                'created_at' => now(),
            ],
            [
                'book_id' => 4,
                'reviewer' => 'Siti Aulia',
                'rating' => 4,
                'review_text' => 'Penyampaian materi cukup jelas dan alur ceritanya mudah diikuti.',
                'created_at' => now(),
            ],
            [
                'book_id' => 5,
                'reviewer' => 'Budi Santoso',
                'rating' => 5,
                'review_text' => 'Buku yang inspiratif dengan isi yang menarik dan memberikan motivasi kepada pembaca.',
                'created_at' => now(),
            ],
        ]);
    }
}
