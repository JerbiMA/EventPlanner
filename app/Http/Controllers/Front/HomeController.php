<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::with('category')
            ->where('status', true)
            ->where('start_date', '>=', now());
        
        // Search by title or description
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Filter by category
        if ($request->filled('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }
        
        // Filter by date range
        if ($request->filled('date_filter')) {
            $now = now();
            switch ($request->date_filter) {
                case 'today':
                    $query->whereDate('start_date', $now->toDateString());
                    break;
                case 'weekend':
                    $startOfWeekend = $now->next('Saturday');
                    $endOfWeekend = $now->next('Sunday')->endOfDay();
                    $query->whereBetween('start_date', [$startOfWeekend, $endOfWeekend]);
                    break;
                case 'this_week':
                    $query->whereBetween('start_date', [$now->startOfWeek(), $now->endOfWeek()]);
                    break;
                case 'this_month':
                    $query->whereMonth('start_date', $now->month)
                          ->whereYear('start_date', $now->year);
                    break;
            }
        }
        
        $events = $query->orderBy('start_date', 'asc')->paginate(6);
        $categories = Category::all();
        
        return view('front.home', compact('events', 'categories'));
    }
    
    public function show(Event $event)
    {
        // Check if current user is registered for this event
        $isRegistered = false;
        if (auth()->check()) {
            $isRegistered = \App\Models\Registration::where('user_id', auth()->id())
                ->where('event_id', $event->id)
                ->exists();
        }
        
        // Get count of registered users
        $registeredCount = \App\Models\Registration::where('event_id', $event->id)->count();
        
        // Get other upcoming events (exclude current event)
        $otherEvents = Event::with('category')
            ->where('status', true)
            ->where('start_date', '>=', now())
            ->where('id', '!=', $event->id)
            ->orderBy('start_date', 'asc')
            ->take(6)
            ->get();
        
        return view('front.event-details', compact('event', 'otherEvents', 'isRegistered', 'registeredCount'));
    }
}
