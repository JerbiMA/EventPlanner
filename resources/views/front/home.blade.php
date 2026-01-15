<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner - Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #ffffff;
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

        .header-buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 10px 24px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline {
            background: white;
            color: #7c3aed;
            border: 2px solid #7c3aed;
        }

        .btn-outline:hover {
            background: #f5f3ff;
        }

        .btn-primary {
            background: #7c3aed;
            color: white;
            border: 2px solid #7c3aed;
        }

        .btn-primary:hover {
            background: #6d28d9;
            border-color: #6d28d9;
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 480px;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                        url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border-radius: 16px;
            margin: 20px 60px 0;
            overflow: hidden;
        }

        .hero-content {
            text-align: center;
            max-width: 800px;
            padding: 0 20px;
            z-index: 2;
        }

        .hero h1 {
            font-size: 64px;
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .hero-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            font-size: 32px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            z-index: 3;
        }

        .hero-arrow:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .hero-arrow.left {
            left: 20px;
        }

        .hero-arrow.right {
            right: 20px;
        }

        /* Events Section */
        .events-section {
            padding: 60px 60px 80px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: #333;
        }

        .section-title .highlight {
            color: #7c3aed;
        }

        .filters {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .search-box {
            padding: 10px 16px 10px 40px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            width: 250px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="%23999" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>') no-repeat 12px center;
            background-color: white;
        }

        .filter-select {
            padding: 10px 36px 10px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            background: white url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="%23666" viewBox="0 0 16 16"><path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg>') no-repeat right 12px center;
            appearance: none;
            cursor: pointer;
        }

        /* Event Cards Grid */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 40px;
        }

        .event-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .event-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .event-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: #f0f0f0;
        }

        .event-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            color: #333;
            letter-spacing: 0.5px;
        }

        .event-content {
            padding: 24px;
        }

        .event-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-bottom: 16px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 50px;
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 6px;
            font-size: 14px;
            color: #666;
        }

        .event-date {
            color: #7c3aed;
            font-weight: 600;
        }

        .event-location {
            color: #999;
            font-size: 13px;
        }

        /* Load More Button */
        .load-more {
            text-align: center;
            margin-top: 40px;
        }

        .load-more-btn {
            padding: 16px 56px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .load-more-btn:hover {
            background: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
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

        .no-events {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .no-events h3 {
            font-size: 24px;
            margin-bottom: 12px;
            color: #333;
        }

        /* Footer */
        .footer {
            background: #1e1e5f;
            color: white;
            padding: 60px 60px 30px;
        }

        .footer-content {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .footer-logo {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .footer-logo .planner {
            color: #a78bfa;
        }

        .footer-subscribe {
            margin-bottom: 30px;
        }

        .subscribe-form {
            display: flex;
            gap: 12px;
            max-width: 500px;
            margin: 0 auto;
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
            color: rgba(255, 255, 255, 0.6);
        }

        .no-events {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        @media (max-width: 1024px) {
            .events-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .footer-links {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .events-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 36px;
            }

            .header, .events-section, .footer {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">Event <span class="planner">Planner</span></div>
        
        <div class="header-buttons">
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @else
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
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.events.index') }}">Dashboard</a>
                        @endif
                        <a href="{{ route('profile.edit') }}">Profile</a>
                        <a href="{{ route('my-registrations') }}">My Registrations</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <button class="hero-arrow left">‹</button>
        <div class="hero-content">
            <h1>MADE FOR THOSE<br>WHO DO</h1>
        </div>
        <button class="hero-arrow right">›</button>
    </section>

    <!-- Events Section -->
    <section class="events-section">
        <div class="section-header">
            <h2 class="section-title">Upcoming <span class="highlight">Events</span></h2>
            
            <form method="GET" action="{{ route('home') }}" class="filters">
                <input type="text" name="search" class="search-box" placeholder="Search" value="{{ request('search') }}">
                <select name="date_filter" class="filter-select" onchange="this.form.submit()">
                    <option value="">All Dates</option>
                    <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Today</option>
                    <option value="weekend" {{ request('date_filter') == 'weekend' ? 'selected' : '' }}>Weekend</option>
                    <option value="this_week" {{ request('date_filter') == 'this_week' ? 'selected' : '' }}>This Week</option>
                    <option value="this_month" {{ request('date_filter') == 'this_month' ? 'selected' : '' }}>This Month</option>
                </select>
                <select name="category" class="filter-select" onchange="this.form.submit()">
                    <option value="all">Any category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" style="display: none;">Search</button>
            </form>
        </div>

        @if($events->count() > 0)
            <div class="events-grid">
                @foreach($events as $event)
                    <a href="{{ route('events.show', $event) }}" class="event-card" style="text-decoration: none; color: inherit;">
                        <div style="position: relative;">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="event-image">
                            @else
                                <div class="event-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                            @endif
                            
                            @if($event->is_free)
                                <span class="event-badge">FREE</span>
                            @endif
                        </div>
                        
                        <div class="event-content">
                            <h3 class="event-title">{{ $event->title }}</h3>
                            
                            <div class="event-meta">
                                <span class="event-date">{{ $event->start_date->format('l, F d, g:iA') }}</span>
                                <span class="event-location">{{ $event->place }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{ $events->appends(request()->query())->links('pagination::custom') }}
        @else
            <div class="no-events">
                <h3>No upcoming events at the moment</h3>
                <p>Check back soon for new events!</p>
            </div>
        @endif
    </section>

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
        // Toggle user dropdown
        function toggleDropdown(event) {
            event.stopPropagation();
            const dropdown = document.getElementById('userDropdown');
            if (dropdown) {
                dropdown.classList.toggle('show');
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userInfo = document.querySelector('.user-info');
            const dropdown = document.getElementById('userDropdown');
            if (userInfo && dropdown && !userInfo.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        // Submit form when pressing Enter in search box
        document.querySelector('.search-box').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.closest('form').submit();
            }
        });
    </script>
</body>
</html>
