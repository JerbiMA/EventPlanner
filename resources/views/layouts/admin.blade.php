<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Planner')</title>
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
            border-bottom: 1px solid #e0e0e0;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .logo .planner {
            color: #7c3aed;
        }

        .header-nav {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: #666;
            font-size: 15px;
            font-weight: 500;
            padding: 8px 0;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .nav-link.active {
            color: #7c3aed;
            border-bottom-color: #7c3aed;
        }

        .nav-link:hover {
            color: #7c3aed;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: 30px;
            position: relative;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .user-info:hover {
            background: #f8f9fa;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        .user-email {
            font-size: 12px;
            color: #666;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            display: none;
            z-index: 100;
        }

        .user-dropdown.show {
            display: block;
        }

        .user-dropdown a,
        .user-dropdown button {
            display: block;
            width: 100%;
            padding: 12px 16px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .user-dropdown a:hover,
        .user-dropdown button:hover {
            background: #f8f9fa;
            color: #7c3aed;
        }

        .user-dropdown a:first-child {
            border-radius: 8px 8px 0 0;
        }

        .user-dropdown a:not(:first-child) {
            border-top: 1px solid #f0f0f0;
        }

        .user-dropdown button {
            border-radius: 0 0 8px 8px;
            border-top: 1px solid #f0f0f0;
        }

        @media (max-width: 768px) {
            .header {
                padding: 20px;
            }

            .user-details {
                display: none;
            }
        }

        @yield('styles')
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">Event <span class="planner">Planner</span></div>
        
        <div class="header-nav">
            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Categories</a>
            <a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">Events</a>
            
            <div class="user-info" onclick="toggleUserMenu(event)">
                <div class="user-avatar">
                    @if(Auth::user()->profile_image)
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }}" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
                    @else
                        {{ substr(Auth::user()->name, 0, 1) }}
                    @endif
                </div>
                <div class="user-details">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <span class="user-email">{{ Auth::user()->email }}</span>
                </div>
                
                <div class="user-dropdown">
                    <a href="{{ route('profile.edit') }}">View profile</a>
                    <a href="{{ route('admin.registrations.index') }}">Registrations</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    @yield('content')

    <script>
        function toggleUserMenu(event) {
            event.stopPropagation();
            const dropdown = event.currentTarget.querySelector('.user-dropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.user-info')) {
                document.querySelectorAll('.user-dropdown').forEach(menu => {
                    menu.classList.remove('show');
                });
            }
        });

        @yield('scripts')
    </script>
</body>
</html>
