<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KebijakanPrivasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kebijakan = new \App\Models\KebijakanPrivasi();
        $kebijakan->deskripsi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem officiis fuga nemo, perferendis explicabo veritatis amet harum molestias facilis odio saepe repellendus qui illum a culpa consequatur ipsum voluptatem.';
        $kebijakan->save();
    }
}
