<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('category', 'creator')
            ->where('status', true)
            ->latest()
            ->get();
        
        return view('backoffice.events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backoffice.events.create', compact('categories'));
    }

    public function store(StoreEventRequest $request)
    {
        $data = $request->except('image');
        $data['created_by'] = Auth::id();
        $data['is_free'] = $request->input('is_free', 0) == '1';
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $data['image'] = $imagePath;
            \Log::info('Image uploaded: ' . $imagePath);
        } else {
            \Log::info('No image file found');
            \Log::info('Request has files: ' . ($request->hasFile('image') ? 'yes' : 'no'));
        }
        
        \Log::info('Data before create:', $data);
        
        Event::create($data);
        
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('backoffice.events.edit', compact('event', 'categories'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->except('image');
        $data['is_free'] = $request->input('is_free', 0) == '1';
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }
        
        $event->update($data);
        
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        // Soft delete by setting status to false
        $event->update(['status' => false]);
        
        return redirect()->route('admin.events.index')->with('success', 'Event archived successfully!');
    }

    public function registrations()
    {
        $registrations = \App\Models\Registration::with(['event', 'user'])
            ->latest()
            ->get();
        
        // Debug: Log the first registration to verify data
        if ($registrations->isNotEmpty()) {
            \Log::info('Sample registration data:', [
                'event_title' => $registrations->first()->event->title ?? 'No event',
                'user_email' => $registrations->first()->user->email ?? 'No user',
                'user_id' => $registrations->first()->user_id,
            ]);
        }
        
        return view('backoffice.registrations.index', compact('registrations'));
    }
}
