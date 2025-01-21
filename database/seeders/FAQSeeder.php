<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    public function run()
    {
        FAQ::create([
            'question' => json_encode([
                'en' => 'What services does your software company offer?',
                'ar' => 'ما هي الخدمات التي تقدمها شركتكم البرمجية؟'
            ]),
            'answer' => json_encode([
                'en' => 'We offer a wide range of software development services, including custom software solutions, mobile app development, web development, and IT consulting.',
                'ar' => 'نحن نقدم مجموعة واسعة من خدمات تطوير البرمجيات، بما في ذلك الحلول البرمجية المخصصة، تطوير التطبيقات المحمولة، تطوير الويب، واستشارات تكنولوجيا المعلومات.'
            ]),
        ]);

        FAQ::create([
            'question' => json_encode([
                'en' => 'How long does it take to develop a software product?',
                'ar' => 'كم من الوقت يستغرق تطوير منتج برمجي؟'
            ]),
            'answer' => json_encode([
                'en' => 'The timeline for developing a software product depends on its complexity and the specific requirements. Typically, it can take anywhere from a few months to a year.',
                'ar' => 'يختلف الوقت المستغرق لتطوير منتج برمجي بناءً على تعقيده والمتطلبات المحددة. عادةً ما يستغرق الأمر من عدة أشهر إلى سنة.'
            ]),
        ]);

        FAQ::create([
            'question' => json_encode([
                'en' => 'Do you offer support after the product is developed?',
                'ar' => 'هل تقدمون الدعم بعد تطوير المنتج؟'
            ]),
            'answer' => json_encode([
                'en' => 'Yes, we provide post-launch support and maintenance services to ensure your product stays up-to-date and runs smoothly.',
                'ar' => 'نعم، نحن نقدم خدمات الدعم والصيانة بعد الإطلاق لضمان بقاء منتجك محدثًا ويعمل بسلاسة.'
            ]),
        ]);

        FAQ::create([
            'question' => json_encode([
                'en' => 'How much does software development cost?',
                'ar' => 'كم تكلف عملية تطوير البرمجيات؟'
            ]),
            'answer' => json_encode([
                'en' => 'The cost of software development varies based on the scope, complexity, and features required for the project. We offer custom quotes based on your specific needs.',
                'ar' => 'تختلف تكلفة تطوير البرمجيات بناءً على نطاق المشروع وتعقيده والميزات المطلوبة. نحن نقدم عروض أسعار مخصصة بناءً على احتياجاتك المحددة.'
            ]),
        ]);

        FAQ::create([
            'question' => json_encode([
                'en' => 'What technologies do you use for development?',
                'ar' => 'ما هي التقنيات التي تستخدمها في التطوير؟'
            ]),
            'answer' => json_encode([
                'en' => 'We use a variety of modern technologies including Python, JavaScript (React, Node.js), PHP (Laravel), and mobile app frameworks like Flutter and React Native.',
                'ar' => 'نحن نستخدم مجموعة متنوعة من التقنيات الحديثة بما في ذلك Python و JavaScript (React و Node.js) و PHP (Laravel)، بالإضافة إلى أطر تطوير التطبيقات المحمولة مثل Flutter و React Native.'
            ]),
        ]);

        FAQ::create([
            'question' => json_encode([
                'en' => 'Can you help with digital transformation for my company?',
                'ar' => 'هل يمكنكم مساعدتي في التحول الرقمي لشركتي؟'
            ]),
            'answer' => json_encode([
                'en' => 'Absolutely! We specialize in helping businesses undergo digital transformation by implementing innovative technology solutions that streamline processes and improve efficiency.',
                'ar' => 'بالطبع! نحن متخصصون في مساعدة الشركات على التحول الرقمي من خلال تنفيذ حلول تكنولوجية مبتكرة تعمل على تبسيط العمليات وتحسين الكفاءة.'
            ]),
        ]);

        FAQ::create([
            'question' => json_encode([
                'en' => 'Do you offer custom software development?',
                'ar' => 'هل تقدمون تطوير البرمجيات المخصصة؟'
            ]),
            'answer' => json_encode([
                'en' => 'Yes, we specialize in building custom software tailored to your specific business needs, ensuring the solution fits perfectly into your operations.',
                'ar' => 'نعم، نحن متخصصون في بناء البرمجيات المخصصة التي تلبي احتياجات عملك المحددة، مما يضمن أن الحل يتناسب تمامًا مع عملياتك.'
            ]),
        ]);

        FAQ::create([
            'question' => json_encode([
                'en' => 'What is your approach to software development?',
                'ar' => 'ما هو نهجكم في تطوير البرمجيات؟'
            ]),
            'answer' => json_encode([
                'en' => 'We follow an agile development methodology that ensures continuous feedback, iterative improvements, and close collaboration with our clients throughout the project.',
                'ar' => 'نحن نتبع منهجية تطوير مرنة (Agile) تضمن الحصول على تعليقات مستمرة، وتحسينات تدريجية، وتعاون وثيق مع عملائنا طوال المشروع.'
            ]),
        ]);
    }
}
