<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Panggil fungsi global
        $projects = get_all_projects();

        return view('page.home', compact('projects'));
    }
}
