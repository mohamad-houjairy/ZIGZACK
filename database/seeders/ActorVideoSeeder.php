<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;
use App\Models\Video;

class ActorVideoSeeder extends Seeder
{
    public function run()
    {
        // $actors = Actor::all();
        // $videos = Video::all();

        // foreach ($videos as $video) {
        //     // Attach 2-5 random actors to each video
        //     $randomActors = $actors->random(rand(2, 5))->pluck('id')->toArray();

        //     // Attach actors to video
        //     $video->actors()->syncWithoutDetaching($randomActors);
        // }
    }
}
