<?php


use Illuminate\Support\Str;

$factory->define(\App\Models\Article::class,function(\Faker\Generator $faker){
    return [
        'title' => $faker->sentence(mt_rand(3, 10)),
        'content_html' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'content_raw' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        'is_draft' => false,
        'slug'=>STR::random('10'),
        'subtitle' => $faker->sentence(mt_rand(3, 10)),
        'page_image'=>STR::random('10'),
        'meta_description'=>STR::random('10'),
    ];
});