<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $stats = $this->cardStats();
        return view('pages.index', compact('stats'));
    }

    private function cardStats()
    {
        $stats = [
            'users' => \App\Models\User::count(),
            'partners' => \App\Models\Admin::where('is_partner', 1)->count(),
            'occupations' => \App\Models\Occupations::count(),
            'applicants' => \App\Models\Applicant::count(),
        ];
        return $stats;
    }
}
