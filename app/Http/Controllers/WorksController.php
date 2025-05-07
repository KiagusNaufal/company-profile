<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'title' => 'Dana Siap Pakai BNPB',
                'category' => 'Web Application',
                'description' => 'Sistem aplikasi berbasis web untuk manajemen dana siap pakai...'
            ],
            [
                'title' => 'E-Kineria Sripanggung',
                'category' => 'Mobile App',
                'description' => 'Aplikasi pelaporan data tim pendamping keluarga...'
            ],
            // Tambahkan data dummy lainnya
        ];

        return view('works.index', compact('projects'));
    }
}
