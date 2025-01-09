<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('sections')->insert([
            [
                'id' => 1,
                'title' => json_encode([
                    'ar' => 'الحلول الرقمية',
                    'en' => 'Digital'
                ]),
                'description' => json_encode([
                    'ar' => 'الحلول الرقمية التي تحول أعمالك من تحسين محتوى الويب إلى حلول تخطيط موارد المؤسسات (ERP) المتكاملة. نحن شريكك للنجاح رقمياً.',
                    'en' => 'Digital Solutions that transform your business From web content optimization to integrated ERP solutions. We are your partner to succeed digitally.'
                ]),
                'link' => null,
                'status' => 0,
                'type' => 'banner',
                'link_text' => null,
                'bottom_text' => null,
                'subtitle' => json_encode([
                    'ar' => 'التميز',
                    'en' => 'Excellence'
                ]),
                'slider_name' => json_encode(['ar' => [], 'en' => []]),
                'slider_link' => json_encode(['ar' => [], 'en' => []]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => json_encode([
                    'ar' => 'أحدث الحلول الرقمية المصممة خصيصاً لتلبية احتياجات عملك',
                    'en' => 'State-of-the-art digital solutions tailored to your business needs'
                ]),
                'description' => json_encode([
                    'ar' => 'بيت رقمي رائد...',
                    'en' => 'A leading digital house, providing a comprehensive range of professional...'
                ]),
                'link' => 'http://127.0.0.1:8000/admin/sections',
                'status' => 0,
                'type' => 'agency',
                'link_text' => null,
                'bottom_text' => null,
                'subtitle' => null,
                'slider_name' => json_encode(['ar' => [], 'en' => []]),
                'slider_link' => json_encode(['ar' => [], 'en' => []]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => null,
                'description' => null,
                'link' => null,
                'status' => 0,
                'type' => 'swipers',
                'link_text' => null,
                'bottom_text' => null,
                'subtitle' => null,
                'slider_name' => json_encode([
                    'ar' => ['المبدعين', 'المبدعين', 'المبدعين', 'المبدعين'],
                    'en' => ['Creative People', 'Creative People', 'Creative People', 'Creative People']
                ]),
                'slider_link' => json_encode([
                    'ar' => ['http://127.0.0.1:8000/admin/sections', 'http://127.0.0.1:8000/admin/sections', 'http://127.0.0.1:8000/admin/sections', 'http://127.0.0.1:8000/admin/sections'],
                    'en' => ['http://127.0.0.1:8000/admin/sections', 'http://127.0.0.1:8000/admin/sections', 'http://127.0.0.1:8000/admin/sections', 'http://127.0.0.1:8000/admin/sections']
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'title' => json_encode([
                    'ar' => 'أفكار عظيمة لعملك',
                    'en' => 'Great Ideas for your business'
                ]),
                'description' => json_encode([
                    'ar' => 'نحن نساعدك...',
                    'en' => 'We help you...'
                ]),
                'link' => null,
                'status' => 0,
                'type' => null,
                'link_text' => null,
                'bottom_text' => null,
                'subtitle' => null,
                'slider_name' => json_encode(['ar' => [], 'en' => []]),
                'slider_link' => json_encode(['ar' => [], 'en' => []]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
