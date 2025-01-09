<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'footer';

    protected $fillable = [
        'logo',
        'description',
        'title',
        'email',
        'phone',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'instagram_link',
        'pages', // تعديل الحقل إلى مصفوفة صفحات
        'location',
    ];

    protected $casts = [
        'description' => 'array',
        'title' => 'array',
        'pages' => 'array', // دعم مصفوفة الصفحات
        'location' => 'array',
    ];

    public function getPage($pageName, $lang = null)
    {
        $lang = $lang ?? app()->getLocale();

        // البحث عن الصفحة حسب الاسم
        $page = collect($this->pages)->firstWhere('name', $pageName);

        if (!$page) {
            return null;
        }

        return [
            'link' => $page['link'],
            'content' => $page['content'][$lang] ?? null,
        ];
    }
}
