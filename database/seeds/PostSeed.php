<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $faker = Faker::create();

        $userIds = \App\User::lists('id')->all();
        $categoryIds = \App\Category::lists('id')->all();
        $cityIds = \App\City::lists('id')->all();

        foreach (range(1, 50) as $index) {
            $post = \App\Post::create([
                'slug' => $faker->unique()->slug,
                'title' => implode(" ", $faker->sentences()),
                'content' => $faker->paragraph(20),
                'excerpt' => $faker->paragraph(5),
                'status' => 'publish',
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'city' => $faker->randomElement($cityIds),
                'is_featured' => rand(0, 1),
                'condition' => rand(1, 5),
                'is_negotiable' => rand(0, 1),
                'price' => $faker->randomNumber(5),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => $faker->dateTimeThisYear($max = 'now'),
                'deleted_at' => $faker->optional(0.1)->dateTimeThisYear($max = 'now'),
            ]);

            $date = ['year', 'month', 'days'];
            $fileName = str_random(6) . "_" . $faker->unique()->slug . '.jpg';
            $file = 'uploads/dummy/'.rand(1,14).'.jpg';
            Image::make($file)->insert('uploads/watermark.png', 'center')->save('uploads/' . $fileName);

            $metaArr = array(
                '_featured_image' => $fileName,
                '_post_unique_id' => 'SLN' . $post->id,
                '_is_used_for' => rand(1, 9) . ' ' . $date[mt_rand(0, count($date) - 1)],
                '_is_home_delivary' => rand(0, 1),
                '_delivary_area' => rand(0, 2),
                '_delivary_charges' => 'Rs. ' . $faker->randomNumber(5),
                '_warranty_type' => rand(0, 2),
                '_warrenty_period' => rand(1, 9) . ' ' . $date[mt_rand(0, count($date) - 1)],
                '_warranty_includes' => $faker->text()
            );

            \App\PostMeta::initPostMeta($post->id, $metaArr);
            foreach (range(1, 5) as $index) {
                $fileName = str_random(6) . "_" . $faker->unique()->slug . '.jpg';
                $file = 'uploads/dummy/'.rand(1,14).'.jpg';
                Image::make($file)->insert('uploads/watermark.png', 'center')->save('uploads/' . $fileName);
                \App\Gallery::create([
                    'filename' => $fileName,
                    'post_id' => $post->id,
                ]);
            }

        }
    }
}
