<?php

use Illuminate\Database\Seeder;

class BandsAlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Band::class, 20)
           ->create()
           ->each(function ($band) {
                $band->albums()->saveMany(factory(App\Album::class, mt_rand(1, 5)))->create([
                    'band_id' => $band->id,
                ]);
            });
    }
}