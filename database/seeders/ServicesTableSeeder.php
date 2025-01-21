<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => json_encode(['en' => 'Custom Software Development', 'ar' => 'تطوير البرمجيات المخصصة']),
                'icon' => 'fa-laptop-code',
                'description' => json_encode([
                    'en' => 'Build custom software solutions tailored to your business needs.',
                    'ar' => 'بناء حلول برمجية مخصصة تلبي احتياجات عملك.'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Mobile App Development', 'ar' => 'تطوير تطبيقات الهاتف المحمول']),
                'icon' => 'fa-mobile-alt',
                'description' => json_encode([
                    'en' => 'Develop high-quality mobile applications for Android and iOS.',
                    'ar' => 'تطوير تطبيقات عالية الجودة لأجهزة الأندرويد والآيفون.'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Web Application Development', 'ar' => 'تطوير تطبيقات الويب']),
                'icon' => 'fa-globe',
                'description' => json_encode([
                    'en' => 'Create robust and scalable web applications.',
                    'ar' => 'إنشاء تطبيقات ويب قوية وقابلة للتطوير.'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'UI/UX Design', 'ar' => 'تصميم واجهة المستخدم وتجربة المستخدم']),
                'icon' => 'fa-pencil-ruler',
                'description' => json_encode([
                    'en' => 'Design user-friendly interfaces and experiences.',
                    'ar' => 'تصميم واجهات وتجارب مستخدم سهلة الاستخدام.'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Cloud Solutions', 'ar' => 'حلول السحابة']),
                'icon' => 'fa-cloud',
                'description' => json_encode([
                    'en' => 'Implement and manage cloud-based infrastructure.',
                    'ar' => 'تنفيذ وإدارة البنية التحتية القائمة على السحابة.'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'IT Consulting', 'ar' => 'استشارات تقنية المعلومات']),
                'icon' => 'fa-headset',
                'description' => json_encode([
                    'en' => 'Provide expert advice on IT strategies and solutions.',
                    'ar' => 'تقديم المشورة المتخصصة بشأن استراتيجيات وحلول تقنية المعلومات.'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'E-commerce Development', 'ar' => 'تطوير التجارة الإلكترونية']),
                'icon' => 'fa-shopping-cart',
                'description' => json_encode([
                    'en' => 'Build secure and scalable e-commerce platforms.',
                    'ar' => 'بناء منصات تجارة إلكترونية آمنة وقابلة للتطوير.'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'AI and Machine Learning', 'ar' => 'الذكاء الاصطناعي وتعلم الآلة']),
                'icon' => 'fa-robot',
                'description' => json_encode([
                    'en' => 'Develop intelligent solutions using AI and machine learning.',
                    'ar' => 'تطوير حلول ذكية باستخدام الذكاء الاصطناعي وتعلم الآلة.'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
