<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function login(){
        $title = 'MapBiomas Landy - Login';
        return view('backends.login', compact('title'));
    }

    public function index(){
        $title = 'MapBiomas Landy - Dashboard';
        $nav = 'dashboard';

        $stats = [
            'news' => \Illuminate\Support\Facades\DB::table('news')->count(),
            'faqs' => \Illuminate\Support\Facades\DB::table('faq')->count(),
            'infographics' => \Illuminate\Support\Facades\DB::table('infographic')->count(),
            'murals' => \Illuminate\Support\Facades\DB::table('murals')->count(),
        ];
        $recentNews = \Illuminate\Support\Facades\DB::table('news')
            ->select('id', 'titleID', 'publishdate', 'category', 'status')
            ->orderByDesc('publishdate')
            ->limit(5)
            ->get();
        $recentFaqs = \Illuminate\Support\Facades\DB::table('faq')
            ->select('id', 'questionID')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        return view('backends.dashboard', compact('title', 'nav', 'stats', 'recentNews', 'recentFaqs'));
    }
}
