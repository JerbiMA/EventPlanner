<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }} - Event Planner</title>
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

        /* Hero Section */
        .hero {
            position: relative;
            height: 500px;
            background-size: cover;
            background-position: center;
            background-color: #1e1e5f;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6));
        }

        .hero-content {
            position: relative;
            z-index: 1;
            padding: 60px 60px 40px;
            color: white;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            margin-bottom: 40px;
        }

        .back-btn:hover {
            background: #6d28d9;
        }

        .event-hero-title {
            font-size: 56px;
            font-weight: 700;
            margin-bottom: 16px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .event-hero-place {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 24px;
            opacity: 0.95;
        }

        .event-hero-description {
            font-size: 15px;
            line-height: 1.6;
            max-width: 700px;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .book-btn {
            padding: 16px 48px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .book-btn:hover {
            background: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
        }

        /* Main Content */
        .main-content {
            padding: 60px 60px;
        }

        .details-card {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 80px;
            max-width: 1200px;
        }

        .description-section h2 {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .description-text {
            font-size: 15px;
            line-height: 1.8;
            color: #666;
            margin-bottom: 24px;
        }

        .info-section h2 {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 24px;
        }

        .info-group {
            margin-bottom: 32px;
        }

        .info-group h3 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 12px;
        }

        .info-item {
            font-size: 15px;
            color: #666;
            margin-bottom: 8px;
        }

        .info-item strong {
            color: #7c3aed;
            font-weight: 600;
        }

        /* Other Events Section */
        .other-events {
            padding: 0 60px 60px;
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 40px;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .event-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .event-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: white;
            color: #7c3aed;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .event-content {
            padding: 20px;
        }

        .event-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .event-date {
            font-size: 13px;
            color: #7c3aed;
            font-weight: 600;
        }

        .event-location {
            font-size: 13px;
            color: #666;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            padding: 40px;
            max-width: 500px;
            width: 90%;
            text-align: center;
        }

        .modal-title {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 32px;
        }

        .modal-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
        }

        .modal-btn {
            padding: 14px 40px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }

        .modal-btn-cancel {
            background: white;
            color: #7c3aed;
            border: 2px solid #7c3aed;
        }

        .modal-btn-cancel:hover {
            background: #f5f3ff;
        }

        .modal-btn-confirm {
            background: #7c3aed;
            color: white;
        }

        .modal-btn-confirm:hover {
            background: #6d28d9;
        }

        /* Footer */
        .footer {
            background: #1e1e5f;
            color: white;
            padding: 60px 60px 30px;
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

        @media (max-width: 768px) {
            .details-card {
                grid-template-columns: 1fr;
            }
            
            .events-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            Event <span class="planner">Planner</span>
        </div>
        
        @auth
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
        @else
            <div class="user-info">
                <a href="{{ route('login') }}" style="color: #7c3aed; text-decoration: none; font-weight: 600;">Login</a>
            </div>
        @endauth
    </header>

    <!-- Hero Section -->
    <section class="hero" style="background-image: url('{{ $event->image ? asset('storage/' . $event->image) : '' }}');">
        <div class="hero-content">
            <a href="{{ route('home') }}" class="back-btn">
                <span>←</span> Back
            </a>
            
            <h1 class="event-hero-title">{{ $event->title }}</h1>
            <p class="event-hero-place">{{ $event->place }}</p>
            <p class="event-hero-description">{{ Str::limit($event->description, 300) }}</p>
            
            @auth
                @if($isRegistered)
                    <form method="POST" action="{{ route('events.unregister', $event) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="book-btn" style="background: #ef4444;">Cancel Registration</button>
                    </form>
                @else
                    @if($registeredCount >= $event->capacity)
                        <button class="book-btn" disabled style="opacity: 0.5; cursor: not-allowed;">Fully Booked</button>
                    @elseif($event->start_date < now())
                        <button class="book-btn" disabled style="opacity: 0.5; cursor: not-allowed;">Event Started</button>
                    @else
                        <button class="book-btn" onclick="openModal()">Book now</button>
                    @endif
                @endif
            @else
                <a href="{{ route('login') }}" class="book-btn" style="display: inline-block; text-decoration: none;">Book now</a>
            @endauth
        </div>
    </section>

    @if(session('success'))
        <div style="padding: 20px 60px 0;">
            <div style="background: #10b981; color: white; padding: 16px 24px; border-radius: 8px; font-size: 14px; font-weight: 500; max-width: 1200px;">
                {{ session('success') }}
            </div>
        </div>
    @endif
    
    @if(session('error'))
        <div style="padding: 20px 60px 0;">
            <div style="background: #ef4444; color: white; padding: 16px 24px; border-radius: 8px; font-size: 14px; font-weight: 500; max-width: 1200px;">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <div class="main-content">
        <div class="details-card">
            <div class="description-section">
                <h2>Description</h2>
                <div class="description-text">
                    {{ $event->description }}
                </div>
            </div>
            
            <div class="info-section">
                <div class="info-group">
                    <h3>Hours</h3>
                    <div class="info-item">
                        Starts: <strong>{{ $event->start_date->format('l, F d, Y - g:iA') }}</strong>
                    </div>
                    <div class="info-item">
                        Ends: <strong>{{ $event->end_date->format('l, F d, Y - g:iA') }}</strong>
                    </div>
                </div>
                
                <div class="info-group">
                    <h3>Capacity</h3>
                    <div class="info-item">
                        Seats available: <strong>{{ $event->capacity - $registeredCount }} / {{ $event->capacity }} persons</strong>
                    </div>
                    <div class="info-item" style="margin-top: 8px; color: #7c3aed;">
                        <strong>{{ $registeredCount }}</strong> people registered
                    </div>
                </div>
                
                @if(!$event->is_free)
                    <div class="info-group">
                        <h3>Price</h3>
                        <div class="info-item">
                            <strong>${{ number_format($event->price, 2) }}</strong>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Other Events Section -->
    @if($otherEvents->count() > 0)
        <section class="other-events">
            <h2 class="section-title">Other events you may like</h2>
            
            <div class="events-grid">
                @foreach($otherEvents as $otherEvent)
                    <a href="{{ route('events.show', $otherEvent) }}" class="event-card">
                        <div style="position: relative;">
                            @if($otherEvent->image)
                                <img src="{{ asset('storage/' . $otherEvent->image) }}" alt="{{ $otherEvent->title }}" class="event-image">
                            @else
                                <div class="event-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                            @endif
                            
                            @if($otherEvent->is_free)
                                <span class="event-badge">FREE</span>
                            @endif
                        </div>
                        
                        <div class="event-content">
                            <h3 class="event-title">{{ $otherEvent->title }}</h3>
                            
                            <div class="event-meta">
                                <span class="event-date">{{ $otherEvent->start_date->format('l, F d, g:iA') }}</span>
                                <span class="event-location">{{ $otherEvent->place }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

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

    <!-- Booking Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <h2 class="modal-title">Book Event</h2>
            <form method="POST" action="{{ route('events.register', $event) }}" id="bookingForm">
                @csrf
                <div class="modal-buttons">
                    <button type="button" class="modal-btn modal-btn-cancel" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="modal-btn modal-btn-confirm">Book now</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            document.getElementById('userDropdown').classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userInfo = document.querySelector('.user-info');
            const dropdown = document.getElementById('userDropdown');
            
            if (dropdown && !userInfo.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        function openModal() {
            document.getElementById('bookingModal').classList.add('show');
        }

        function closeModal() {
            document.getElementById('bookingModal').classList.remove('show');
        }

        // Close modal when clicking outside
        document.getElementById('bookingModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>
