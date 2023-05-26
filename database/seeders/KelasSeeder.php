<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Path to the image file
       $imagePath = 'public/img/90x90.jpg';

       // Generate a unique name for the image
       $imageName = uniqid() . '.jpg';

       // Store the image file
       $storedPath = 'public/storage/kelas' . $imageName;

        Kelas::Create([
            'judul' => 'sistem saraf pada manusia',
            'user_id' =>'1',
            'gambar' => $storedPath ,
            'deskripsi' => 'lorem ipsum',
            'status' => 'pending',
        ]);
    }
}
