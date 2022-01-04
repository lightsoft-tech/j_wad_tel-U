<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $berita = new \App\Models\Berita();
        $berita->gambar = 'berita.jpg';
        $berita->judul = 'Berita 1';
        $berita->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $berita->save();

        $beritaa = new \App\Models\Berita();
        $beritaa->gambar = 'berita.jpg';
        $beritaa->judul = 'Berita 2';
        $beritaa->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $beritaa->save();
        
        
        $beritaaa = new \App\Models\Berita();
        $beritaaa->gambar = 'berita.jpg';
        $beritaaa->judul = 'Berita 3';
        $beritaaa->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $beritaaa->save();
    }
}
