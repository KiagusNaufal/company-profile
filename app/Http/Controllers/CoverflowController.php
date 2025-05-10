<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoverflowController extends Controller
{
    // Di controller
public function index()
{
    $slides = [
        [
            'image' => asset('images/slides/slide1.jpg'),
            'title' => 'Web Development',
            'description' => 'Enterprise web application development'
        ],
        [
            'image' => asset('images/slides/slide2.jpg'),
            'title' => 'Mobile Apps',
            'description' => 'Cross-platform mobile solutions'
        ],
        // Tambahkan slide lainnya
    ];

    return view('your-view', compact('slides'));
}
}
