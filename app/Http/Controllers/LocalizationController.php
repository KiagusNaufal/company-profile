<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    function setLocale($lang)
    {
        // Validate the language code
        $availableLocales = ['en', 'id'];
        if (in_array($lang, $availableLocales)) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }

        return redirect()->back();
    }
}
