<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faq = new \App\Models\Faq();
        $faq->judul = 'Pertanyaan 1';
        $faq->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $faq->save();

        $faqq = new \App\Models\Faq();
        $faqq->judul = 'Pertanyaan 2';
        $faqq->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $faqq->save();

        $faqqq = new \App\Models\Faq();
        $faqqq->judul = 'Pertanyaan 3';
        $faqqq->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $faqqq->save();
    }
}
