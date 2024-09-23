<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Config::insert([
            [
                'name' => 'logo',
                'value' => 'logo.png'
            ],
            [
                'name' => 'blog_name',
                'value' => 'Laravel Blog'
            ],
            [
                'name' => 'title',
                'value' => 'Welcome to Blog Home!'
            ],
            [
                'name' => 'caption',
                'value' => 'A Bootstrap 5 starter layout for your next blog homepage'
            ],
            [
                'name' => 'ads_widget',
                'value' => 'ads 1'
            ],
            [
                'name' => 'ads_header',
                'value' => 'ads 2',
            ],
            [
                'name' => 'ads_footer',
                'value' => 'ads 3'
            ],
            [
                'name' => 'phone',
                'value' => '(+62)822-6182-4259'
            ],
            [
                'name' => 'email',
                'value' => 'ekiakmarullah.id@gmail.com'
            ],
            [
                'name' => 'github', 
                'value' => 'https://github.com/ekiakmarullah22'
            ],
            [
                'name' => 'twitter',
                'value' => 'https://x.com/watabe_id'
            ],
            [
                'name' => 'youtube',
                'value' => 'https://www.youtube.com/@watabeorenji5867'
            ],
            [
                'name' => 'footer',
                'value' => 'Watabe Orenji'
            ]
        ]);
    }
}
