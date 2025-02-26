<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
    * Display the Domain's dashboard.
    */
    public function index(Request $request, Domain $domain)
    {
        
        $today = Carbon::today();
        $search = $request->input('search');
    
        $domains = Domain::orderByRaw("CASE WHEN expires_at < ? THEN 0 ELSE 1 END, expires_at ASC", [$today])->get();
    
        $registeredCount = $domains->count();
        $expiredCount = $domains->where('expires_at', '<', $today)->count();
        $expiringThisWeekCount = $domains->whereBetween('expires_at', [$today, $today->copy()->addWeek()])->count();

        $domains = Domain::when($search, function ($query, $search) {
            return $query->where('domain', 'like', "%{$search}%")
                         ->orWhere('host', 'like', "%{$search}%");
        })
        ->orderByRaw("CASE WHEN expires_at < ? THEN 0 ELSE 1 END, expires_at ASC", [$today])->get();
    
        return view('dashboard', [
            'domains' => $domains,
            'search' => $search,
            'registeredCount' => $registeredCount,
            'expiredCount' => $expiredCount,
            'expiringThisWeekCount' => $expiringThisWeekCount,
        ]);
    }

    
}
