@extends('layouts.admin')

@section('title', 'Event Planner - Events')

@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f5f7;
            min-height: 100vh;
        }

        .main-content {
            padding: 40px 40px 60px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: #7c3aed;
            margin-bottom: 40px;
        }

        .events-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .events-header {
            padding: 24px 28px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .events-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .create-btn {
            background: #7c3aed;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .create-btn:hover {
            background: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
        }

        .events-table {
            width: 100%;
            border-collapse: collapse;
        }

        .events-table thead {
            background: #f8f9fa;
        }

        .events-table th {
            padding: 16px 20px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .events-table td {
            padding: 20px 20px;
            border-top: 1px solid #f0f0f0;
            font-size: 14px;
            color: #333;
        }

        .events-table tbody tr:hover {
            background: #fafafa;
        }

        .event-name {
            font-weight: 500;
            color: #1a1a1a;
        }

        .actions-cell {
            position: relative;
        }

        .actions-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: #666;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .actions-btn:hover {
            background: #f0f0f0;
            color: #7c3aed;
        }

        .actions-menu {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 120px;
            display: none;
            z-index: 10;
        }

        .actions-menu.show {
            display: block;
        }

        .actions-menu a {
            display: block;
            padding: 10px 16px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .actions-menu a:hover {
            background: #f8f9fa;
            color: #7c3aed;
        }

        .actions-menu a:first-child {
            border-radius: 8px 8px 0 0;
        }

        .actions-menu a:last-child {
            border-radius: 0 0 8px 8px;
            color: #dc3545;
        }

        .actions-menu a:last-child:hover {
            background: #fee;
            color: #c82333;
        }

        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #10b981;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #ef4444;
        }

        .alert-error ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .alert-error li {
            margin-top: 4px;
        }

        .alert-error li:first-child {
            margin-top: 0;
        }

        .badge-free {
            background: #d1fae5;
            color: #065f46;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        @media (max-width: 1024px) {
            .main-content {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <main class="main-content">
        <h1 class="page-title">List of Events</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="events-card">
            <div class="events-header">
                <h2 class="events-title">Events</h2>
                <a href="{{ route('admin.events.create') }}" class="create-btn">Create event</a>
            </div>

            <table class="events-table">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Price</th>
                        <th>Capacity</th>
                        <th>Place</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td class="event-name">{{ $event->title }}</td>
                            <td>{{ $event->start_date->format('M d, Y, g:ia') }}</td>
                            <td>{{ $event->end_date->format('M d, Y, g:ia') }}</td>
                            <td>
                                @if($event->is_free)
                                    <span class="badge-free">Free</span>
                                @else
                                    ${{ number_format($event->price, 2) }}
                                @endif
                            </td>
                            <td>{{ $event->capacity }}</td>
                            <td>{{ $event->place }}</td>
                            <td>{{ $event->category->name }}</td>
                            <td class="actions-cell">
                                <button class="actions-btn" onclick="toggleMenu(this)">⋮</button>
                                <div class="actions-menu">
                                    <a href="{{ route('admin.events.edit', $event) }}">Edit</a>
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to archive this event?')) document.getElementById('delete-form-{{ $event->id }}').submit();">Archive</a>
                                </div>
                                <form id="delete-form-{{ $event->id }}" action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; color: #999; padding: 40px 20px;">
                                No events yet. Create one to get started!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection

@section('scripts')
    function toggleMenu(button) {
        // Close all other menus
        document.querySelectorAll('.actions-menu').forEach(menu => {
            if (menu !== button.nextElementSibling) {
                menu.classList.remove('show');
            }
        });
        
        // Toggle current menu
        button.nextElementSibling.classList.toggle('show');
    }

    // Close action menus when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.actions-cell')) {
            document.querySelectorAll('.actions-menu').forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });
@endsection
