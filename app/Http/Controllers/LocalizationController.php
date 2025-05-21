<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
public function setLocale($lang)
{
    if (!in_array($lang, ['en', 'id'])) {
        abort(404);
    }

    session()->put('locale', $lang);
    app()->setLocale($lang);
    
    // Redirect kembali ke halaman sebelumnya dengan URL yang benar
    $previousUrl = str_replace(
        ['/locale/en', '/locale/id'],
        '',
        url()->previous()
    );
    
    return redirect($previousUrl);
}
}
