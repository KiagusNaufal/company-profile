<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
public function setLocale($lang)
{
    if (!in_array($lang, ['id', 'en'])) {
        abort(404);
    }

    session()->put('locale', $lang);
    app()->setLocale($lang);
    
    // Redirect kembali ke halaman sebelumnya dengan URL yang benar
    $previousUrl = str_replace(
        ['/locale/id', '/locale/en'],
        '',
        url()->previous()
    );
    
    return redirect($previousUrl);
}
}
