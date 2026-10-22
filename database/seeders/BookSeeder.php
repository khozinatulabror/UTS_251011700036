<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'id' => 1,
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'description' => 'Novel yang menceritakan perjuangan sepuluh anak di Belitung dalam memperoleh pendidikan di tengah keterbatasan. Kisah ini mengangkat persahabatan, semangat belajar, pengorbanan guru, dan keberanian mengejar cita-cita.',
                'image' => 'buku-1-laskar-pelangi.jpg',
                'price' => 85000,
            ],
            [
                'id' => 2,
                'title' => 'Sapiens',
                'author' => 'Yuval Noah Harari',
                'description' => 'Buku nonfiksi yang membahas perjalanan sejarah manusia, mulai dari perkembangan awal Homo sapiens hingga terbentuknya masyarakat modern. Pembahasannya mencakup revolusi kognitif, pertanian, uang, dan perkembangan peradaban.',
                'image' => 'buku-2-sapiens.jpg',
                'price' => 150000,
            ],
            [
                'id' => 3,
                'title' => 'Filosofi Teras',
                'author' => 'Henry Manampiring',
                'description' => 'Buku pengantar filsafat Stoisisme yang menjelaskan cara menghadapi tekanan kehidupan dengan lebih rasional. Pembaca diajak membedakan hal-hal yang dapat dikendalikan dan yang tidak, serta mengelola respons terhadap masalah sehari-hari.',
                'image' => 'buku-3-filosofi-teras.jpg',
                'price' => 98000,
            ],
            [
                'id' => 4,
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'description' => 'Buku pengembangan diri tentang cara membangun kebiasaan baik dan mengurangi kebiasaan buruk melalui perubahan kecil yang dilakukan secara konsisten. Isinya membahas sistem kebiasaan, lingkungan, dan langkah praktis untuk mendukung perubahan jangka panjang.',
                'image' => 'buku-4-atomic-habits.jpg',
                'price' => 120000,
            ],
            [
                'id' => 5,
                'title' => 'Bumi',
                'author' => 'Tere Liye',
                'description' => 'Novel fantasi yang mengikuti petualangan Raib bersama kedua temannya ketika mereka mengenal dunia paralel dan menghadapi berbagai peristiwa yang tidak biasa. Ceritanya memadukan persahabatan, misteri, keberanian, dan petualangan.',
                'image' => 'buku-5-bumi.jpg',
                'price' => 95000,
            ],
        ];

        foreach ($books as $book) {
            DB::table('books')->updateOrInsert(
                ['id' => $book['id']],
                array_merge($book, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
