<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Footer::create([
            'description' => json_encode([
                'en' => 'English description here.',
                'ar' => 'الوصف باللغة العربية هنا.'
            ]),
            'title' => json_encode([
                'en' => 'English title here.',
                'ar' => 'العنوان باللغة العربية هنا.'
            ]),
            'location' => json_encode([
                'en' => 'English location here.',
                'ar' => 'الموقع باللغة العربية هنا.'
            ]),
            'email' => 'email@example.com',
            'phone' => '123-456-7890',
            'facebook_link' => 'https://facebook.com',
            'twitter_link' => 'https://twitter.com',
            'linkedin_link' => 'https://linkedin.com',
            'instagram_link' => 'https://instagram.com',
            'page' => json_encode([
                [
                    'name' => 'Page 1',
                    'link' => 'https://page1.com',
                    'content' => [
                        'en' => 'Content in English for page 1',
                        'ar' => 'المحتوى باللغة العربية للصفحة 1'
                    ]
                ],
                [
                    'name' => 'Page 2',
                    'link' => 'https://page2.com',
                    'content' => [
                        'en' => 'Content in English for page 2',
                        'ar' => 'المحتوى باللغة العربية للصفحة 2'
                    ]
                ]
            ]),
        ]);
        
    }
}
