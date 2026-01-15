<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function store(Event $event)
    {
        // Check if user is already registered
        $existingRegistration = Registration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->first();

        if ($existingRegistration) {
            return back()->with('error', 'You are already registered for this event!');
        }

        // Check if event has available capacity
        $registeredCount = Registration::where('event_id', $event->id)->count();
        
        if ($registeredCount >= $event->capacity) {
            return back()->with('error', 'Sorry, this event is fully booked!');
        }

        // Check if event hasn't started yet
        if ($event->start_date < now()) {
            return back()->with('error', 'Sorry, this event has already started!');
        }

        // Create registration
        Registration::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
        ]);

        return back()->with('success', 'Successfully registered for the event!');
    }

    public function destroy(Event $event)
    {
        $registration = Registration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->first();

        if (!$registration) {
            return back()->with('error', 'You are not registered for this event!');
        }

        $registration->delete();

        return back()->with('success', 'Registration cancelled successfully!');
    }

    public function myRegistrations()
    {
        $registrations = Registration::with(['event.category'])
            ->where('user_id', Auth::id())
            ->whereHas('event', function($query) {
                $query->where('status', true);
            })
            ->latest()
            ->paginate(10);

        return view('front.my-registrations', compact('registrations'));
    }
}
