<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'title'       => 'TaskFlow Pro',
                'category'    => 'Web Application',
                'description' => 'Platform manajemen tugas kolaboratif dengan timeline interaktif, notifikasi real-time, dan integrasi kalender.',
                'badge_color' => 'bg-blue-100 text-blue-800'
            ],
            [
                'title'       => 'FitTrack Mobile',
                'category'    => 'Mobile App',
                'description' => 'Aplikasi kebugaran dengan pelacakan aktivitas harian, rekomendasi latihan personal, dan tantangan komunitas.',
                'badge_color' => 'bg-green-100 text-green-800'
            ],
            [
                'title'       => 'Quest of Legends',
                'category'    => 'Game App',
                'description' => 'RPG petualangan 2D dengan grafis pixel-art, quest dinamis, dan sistem leveling strategis.',
                'badge_color' => 'bg-purple-100 text-purple-800'
            ],
            [
                'title'       => 'MarketMate',
                'category'    => 'Web Application',
                'description' => 'Marketplace B2B dengan fitur negosiasi harga otomatis, analitik penjualan, dan manajemen stok terintegrasi.',
                'badge_color' => 'bg-indigo-100 text-indigo-800'
            ],
            [
                'title'       => 'PhotoSnap',
                'category'    => 'Mobile App',
                'description' => 'Editor foto all-in-one dengan filter AI, penghilangan objek otomatis, dan kolase kreatif.',
                'badge_color' => 'bg-red-100 text-red-800'
            ],
            [
                'title'       => 'PuzzleCraft',
                'category'    => 'Game App',
                'description' => 'Puzzle game santai dengan ratusan level bertema seni dan teka-teki logika yang menantang.',
                'badge_color' => 'bg-orange-100 text-orange-800'
            ],
        ];


        return view('page.works', compact('projects'));
    }
}
