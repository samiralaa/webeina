<?php

namespace App\Http\Controllers\Web\Setting;

use Illuminate\Support\Facades\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //
    public function changeLanguage($locale)
    {

        $lang = $locale;

        if (!in_array($lang, ['en', 'ar'])) {
            abort(400);
        }

        Session::put('locale', $lang);

        return redirect()->back();
    }
}
