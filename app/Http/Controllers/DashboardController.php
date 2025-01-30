<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $today = Carbon::today();
        $search = $request->input('search');
    
        $domains = Domain::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('host', 'like', "%{$search}%");
            })
            ->orderByRaw("CASE WHEN expire_in < ? THEN 0 ELSE 1 END, expire_in ASC", [$today]) // Expirados primeiro
            ->get();
    
        // Contagens para os cards
        $registeredCount = $domains->count();
        $expiredCount = $domains->where('expire_in', '<', $today)->count();
        $expiringThisWeekCount = $domains->whereBetween('expire_in', [$today, $today->copy()->addWeek()])->count();
    
        return view('dashboard', [
            'domains' => $domains,
            'search' => $search,
            'registeredCount' => $registeredCount,
            'expiredCount' => $expiredCount,
            'expiringThisWeekCount' => $expiringThisWeekCount,
        ]);
    }

    
}
