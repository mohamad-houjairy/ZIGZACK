<?php

namespace Database\Seeders;

use App\Models\ContentCreator;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Video;
use App\Models\Review;
use App\Models\FestivalVideo;
use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    //             User::factory()->count(20)->create();
    //             Actor::factory()->count(20)->create();
    //             Category::factory()->count(20)->create();
    //             ContentCreator::factory()->count(20)->create();
    //             Video::factory()->count(20)->create();
    //             Review::factory()->count(20)->create();
    //             FestivalVideo::factory()->count(20)->create();


//  $actors = [
//             [
//                 'name' => 'Leonardo DiCaprio',
//                 'bio' => 'An American actor and producer.',
//                 'birth_date' => '1974-11-11',
//                 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Leonardo_DiCaprio_66%C3%A8me_Festival_de_Venise.jpg/440px-Leonardo_DiCaprio_66%C3%A8me_Festival_de_Venise.jpg',
//             ],
//             [
//                 'name' => 'Scarlett Johansson',
//                 'bio' => 'An American actress and singer.',
//                 'birth_date' => '1984-11-22',
//                 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Scarlett_Johansson_by_Gage_Skidmore_2.jpg/440px-Scarlett_Johansson_by_Gage_Skidmore_2.jpg',
//             ],
//             // Add more actors...
//         ];

//         foreach ($actors as $actor) {
//             try {
//                 // Download the image with SSL verification disabled
//                 $response = Http::withOptions([
//                     'verify' => false,
//                     'headers' => ['User-Agent' => 'Mozilla/5.0'],
//                 ])->get($actor['image_url']);

//                 if ($response->successful()) {
//                     $imageName = 'actor_' . preg_replace('/\s+/', '_', strtolower($actor['name'])) . '.jpg';
//                     File::put(public_path('images/' . $imageName), $response->body());

//                     Actor::create([
//                         'name' => $actor['name'],
//                         'bio' => $actor['bio'],
//                         'birth_date' => $actor['birth_date'],
//                         'profile_image' => $imageName,
//                     ]);

//                     $this->command->info("Created actor: {$actor['name']}");
//                 } else {
//                     $this->command->error("Failed to download image for {$actor['name']}");
//                 }
//             } catch (\Exception $e) {
//                 $this->command->error("Error for {$actor['name']}: " . $e->getMessage());
//             }
//         }

}
}
