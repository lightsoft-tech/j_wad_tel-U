<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new \App\Models\Menu();
        $menu->gambar = 'menu.jpg';
        $menu->judul = 'Menu 1';
        $menu->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $menu->harga = 100000;
        $menu->save();

        $menuu = new \App\Models\Menu();
        $menuu->gambar = 'menu.jpg';
        $menuu->judul = 'Menu 2';
        $menuu->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $menuu->harga = 150000;
        $menuu->save();

        $menuuu = new \App\Models\Menu();
        $menuuu->gambar = 'menu.jpg';
        $menuuu->judul = 'Menu 3';
        $menuuu->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $menuuu->harga = 50000;
        $menuuu->save();
    }
}
