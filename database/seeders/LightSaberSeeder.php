<?php

namespace Database\Seeders;

use App\Models\LightSaber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LightSaberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sabers = [
            [
                'name' => 'ACOLYTE',
                'description' => 'The Acolyte features an angled emitter with a cutout center. Together, they provide aggressive visuals.',
                'cover_image' => 'https://saberforge.com/cdn/shop/products/z1_b8efeb36-0e59-4e56-86e6-e4024549a093_1728x.jpg?v=1620161525',
                'price' => 56.95
            ],
            [
                'name' => 'ACOLYTE2',
                'description' => 'The Acolyte features an angled emitter with a cutout center. Together, they provide aggressive visuals.',
                'cover_image' => 'https://saberforge.com/cdn/shop/products/z1_b8efeb36-0e59-4e56-86e6-e4024549a093_1728x.jpg?v=1620161525',
                'price' => 56.95
            ],
            [
                'name' => 'ACOLYTE3',
                'description' => 'The Acolyte features an angled emitter with a cutout center. Together, they provide aggressive visuals.',
                'cover_image' => 'https://saberforge.com/cdn/shop/products/z1_b8efeb36-0e59-4e56-86e6-e4024549a093_1728x.jpg?v=1620161525',
                'price' => 56.95
            ], [
                'name' => 'ACOLYTE4',
                'description' => 'The Acolyte features an angled emitter with a cutout center. Together, they provide aggressive visuals.',
                'cover_image' => 'https://saberforge.com/cdn/shop/products/z1_b8efeb36-0e59-4e56-86e6-e4024549a093_1728x.jpg?v=1620161525',
                'price' => 56.95
            ]
        ];



        foreach ($sabers as $saber) {
            $lightsaber = new LightSaber();
            $lightsaber->name = $saber['name'];
            $lightsaber->description = $saber['description'];
            $lightsaber->cover_image = $saber['cover_image'];
            $lightsaber->price = $saber['price'];
            $lightsaber->save();
        }
    }
}
