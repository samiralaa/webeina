<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = Service::get(); // جلب جميع الخدمات المتاحة

        foreach ($services as $service) {
            DB::table('contents')->insert([
                [
                    'service_id' => $service->id, // تعيين ID للخدمة
                    'title' => json_encode([
                        'en' => 'Web Development', 
                        'ar' => 'تطوير الويب'
                    ]),
                    'description' => json_encode([
                        'en' => 'We build high-quality, scalable, and secure websites tailored to your business needs.',
                        'ar' => 'نقوم بإنشاء مواقع ويب عالية الجودة وقابلة للتطوير وآمنة لتناسب احتياجات عملك.'
                    ]),
                    'image' => 'web_development.jpg',
                    'status' => 1,
                    'type' => 'Service',
                    'sub_title' => json_encode([
                        'en' => 'Professional web solutions',
                        'ar' => 'حلول ويب احترافية'
                    ]),
                    'link' => 'https://example.com/web-development',
                    'questions' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'service_id' => $service->id, // تعيين ID للخدمة
                    'title' => json_encode([
                        'en' => 'Mobile App Development', 
                        'ar' => 'تطوير تطبيقات الجوال'
                    ]),
                    'description' => json_encode([
                        'en' => 'Creating user-friendly and feature-rich mobile applications for iOS and Android.',
                        'ar' => 'إنشاء تطبيقات جوال سهلة الاستخدام وغنية بالميزات لأنظمة iOS و Android.'
                    ]),
                    'image' => 'mobile_app.jpg',
                    'status' => 1,
                    'type' => 'Service',
                    'sub_title' => json_encode([
                        'en' => 'Innovative mobile solutions',
                        'ar' => 'حلول جوال مبتكرة'
                    ]),
                    'link' => 'https://example.com/mobile-app',
                    'questions' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'service_id' => $service->id, // تعيين ID للخدمة
                    'title' => json_encode([
                        'en' => 'UI/UX Design', 
                        'ar' => 'تصميم تجربة المستخدم وواجهة المستخدم'
                    ]),
                    'description' => json_encode([
                        'en' => 'Delivering visually appealing and highly functional UI/UX designs for your projects.',
                        'ar' => 'تقديم تصاميم تجربة مستخدم وواجهة مستخدم جذابة وعملية لمشاريعك.'
                    ]),
                    'image' => 'ui_ux_design.jpg',
                    'status' => 1,
                    'type' => 'Service',
                    'sub_title' => json_encode([
                        'en' => 'User-centric design approach',
                        'ar' => 'نهج تصميم يركز على المستخدم'
                    ]),
                    'link' => 'https://example.com/ui-ux-design',
                    'questions' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
