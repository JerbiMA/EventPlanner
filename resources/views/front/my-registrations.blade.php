<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Registrations - Event Planner</title>
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

        /* Header */
        .header {
            background: white;
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            text-decoration: none;
        }

        .logo .planner {
            color: #7c3aed;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
            position: relative;
            cursor: pointer;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e5e5e5;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            color: #333;
        }

        .user-email {
            font-size: 11px;
            color: #666;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            display: none;
            z-index: 100;
        }

        .user-dropdown.show {
            display: block;
        }

        .user-dropdown a {
            display: block;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.2s;
        }

        .user-dropdown a:first-child {
            border-radius: 8px 8px 0 0;
        }

        .user-dropdown a:last-child {
            border-radius: 0 0 8px 8px;
        }

        .user-dropdown a:hover {
            background: #f5f5f7;
        }

        .user-dropdown form {
            margin: 0;
        }

        .user-dropdown button {
            width: 100%;
            text-align: left;
            padding: 12px 20px;
            background: none;
            border: none;
            color: #333;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .user-dropdown button:hover {
            background: #f5f5f7;
        }

        /* Main Content */
        .main-content {
            padding: 60px 60px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 40px;
            text-align: center;
        }

        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .page-subtitle {
            font-size: 16px;
            color: #666;
        }

        .registrations-grid {
            display: grid;
            gap: 24px;
        }

        .registration-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: grid;
            grid-template-columns: 200px 1fr auto;
            gap: 24px;
            align-items: center;
            transition: all 0.3s ease;
        }

        .registration-card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .event-image-container {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            height: 140px;
        }

        .event-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .event-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: white;
            color: #7c3aed;
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 11px;
            font-weight: 700;
        }

        .event-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .event-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 4px;
        }

        .event-title a {
            color: #333;
            text-decoration: none;
            transition: color 0.2s;
        }

        .event-title a:hover {
            color: #7c3aed;
        }

        .event-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #666;
        }

        .event-meta-item svg {
            width: 16px;
            height: 16px;
        }

        .event-category {
            display: inline-block;
            padding: 4px 12px;
            background: #f3f4f6;
            color: #7c3aed;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 8px;
        }

        .event-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .view-btn {
            padding: 10px 24px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            text-align: center;
        }

        .view-btn:hover {
            background: #6d28d9;
        }

        .cancel-btn {
            padding: 10px 24px;
            background: white;
            color: #ef4444;
            border: 2px solid #ef4444;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .cancel-btn:hover {
            background: #ef4444;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-state-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.2;
        }

        .empty-state-icon svg {
            width: 60px;
            height: 60px;
            stroke: white;
        }

        .empty-state h3 {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 12px;
        }

        .empty-state p {
            font-size: 16px;
            color: #666;
            margin-bottom: 32px;
        }

        .browse-btn {
            padding: 14px 32px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .browse-btn:hover {
            background: #6d28d9;
            transform: translateY(-2px);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            padding: 10px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 14px;
            min-width: 44px;
            text-align: center;
        }

        .pagination a:hover {
            background: #7c3aed;
            color: white;
            border-color: #7c3aed;
        }

        .pagination .active span {
            background: #7c3aed;
            color: white;
            border-color: #7c3aed;
        }

        .pagination .disabled span {
            color: #ccc;
            cursor: not-allowed;
        }

        /* Footer */
        .footer {
            background: #1e1e5f;
            color: white;
            padding: 60px 60px 30px;
            margin-top: 60px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-logo {
            text-align: center;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .footer-logo .planner {
            color: #a78bfa;
        }

        .footer-subscribe {
            max-width: 500px;
            margin: 0 auto 40px;
        }

        .subscribe-form {
            display: flex;
            gap: 12px;
        }

        .subscribe-input {
            flex: 1;
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
        }

        .subscribe-btn {
            padding: 14px 32px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .subscribe-btn:hover {
            background: #6d28d9;
        }

        .footer-links {
            display: flex;
            gap: 32px;
            justify-content: center;
            margin-bottom: 30px;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #a78bfa;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            opacity: 0.7;
        }

        .alert {
            padding: 16px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 24px;
        }

        .alert-success {
            background: #10b981;
            color: white;
        }

        .alert-error {
            background: #ef4444;
            color: white;
        }

        @media (max-width: 768px) {
            .registration-card {
                grid-template-columns: 1fr;
            }

            .main-content {
                padding: 40px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <a href="{{ route('home') }}" class="logo">
            Event <span class="planner">Planner</span>
        </a>
        
        <div class="user-info" onclick="toggleDropdown(event)">
            <div class="user-avatar">
                @if(auth()->user()->profile_image)
                    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="{{ auth()->user()->name }}">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=7c3aed&color=fff" alt="{{ auth()->user()->name }}">
                @endif
            </div>
            <div class="user-details">
                <span class="user-name">{{ auth()->user()->name }}</span>
                <span class="user-email">{{ auth()->user()->email }}</span>
            </div>
            <div class="user-dropdown" id="userDropdown">
                <a href="{{ route('profile.edit') }}">Profile</a>
                <a href="{{ route('my-registrations') }}">My Registrations</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">My Registrations</h1>
            <p class="page-subtitle">Manage your upcoming events</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if($registrations->count() > 0)
            <div class="registrations-grid">
                @foreach($registrations as $registration)
                    <div class="registration-card">
                        <div class="event-image-container">
                            @if($registration->event->image)
                                <img src="{{ asset('storage/' . $registration->event->image) }}" alt="{{ $registration->event->title }}" class="event-image">
                            @else
                                <div class="event-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                            @endif
                            
                            @if($registration->event->is_free)
                                <span class="event-badge">FREE</span>
                            @endif
                        </div>

                        <div class="event-info">
                            <h3 class="event-title">
                                <a href="{{ route('events.show', $registration->event) }}">{{ $registration->event->title }}</a>
                            </h3>
                            
                            <div class="event-meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $registration->event->start_date->format('l, F d, Y - g:iA') }}
                            </div>

                            <div class="event-meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $registration->event->place }}
                            </div>

                            @if($registration->event->category)
                                <span class="event-category">{{ $registration->event->category->name }}</span>
                            @endif
                        </div>

                        <div class="event-actions">
                            <a href="{{ route('events.show', $registration->event) }}" class="view-btn">View Details</a>
                            <form method="POST" action="{{ route('events.unregister', $registration->event) }}" onsubmit="return confirm('Are you sure you want to cancel this registration?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cancel-btn">Cancel Registration</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $registrations->links('pagination::custom') }}
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3>No Registrations Yet</h3>
                <p>You haven't registered for any events. Start exploring and book your first event!</p>
                <a href="{{ route('home') }}" class="browse-btn">Browse Events</a>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                Event <span class="planner">Planner</span>
            </div>
            
            <div class="footer-subscribe">
                <form class="subscribe-form">
                    <input type="email" class="subscribe-input" placeholder="Enter your mail">
                    <button type="submit" class="subscribe-btn">Subscribe</button>
                </form>
            </div>
            
            <div class="footer-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('register') }}">Sign UP</a>
                <a href="{{ route('login') }}">Sign in</a>
            </div>
        </div>
        
        <div class="footer-bottom">
            Non Copyrighted © 2025 Event Planner
        </div>
    </footer>

    <script>
        function toggleDropdown(event) {
            event.stopPropagation();
            document.getElementById('userDropdown').classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userInfo = document.querySelector('.user-info');
            const dropdown = document.getElementById('userDropdown');
            
            if (userInfo && dropdown && !userInfo.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
    </script>
</body>
</html>
