<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Event Planner</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f5f7;
            min-height: 100vh;
            padding-bottom: 60px;
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

        .main-content {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 16px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .profile-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .card-header {
            margin-bottom: 25px;
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .card-description {
            color: #6b7280;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #7c3aed;
            color: white;
        }

        .btn-primary:hover {
            background: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .footer {
            background: white;
            color: #6b7280;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.05);
        }

        .image-preview-container {
            margin-top: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-image-preview {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e5e7eb;
        }

        .profile-image-placeholder {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-size: 32px;
            font-weight: 600;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(4px);
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        }

        .modal-header {
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .modal-description {
            color: #6b7280;
            font-size: 14px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }
            
            .profile-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <a href="/" class="logo">Event<span class="planner">Planner</span></a>
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
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">My Profile</h1>
            <p class="page-subtitle">Manage your account settings and preferences</p>
        </div>

        <!-- Success Messages -->
        @if (session('status') === 'profile-updated')
            <div class="alert alert-success">
                ✓ Profile updated successfully!
            </div>
        @endif

        @if (session('status') === 'password-updated')
            <div class="alert alert-success">
                ✓ Password updated successfully!
            </div>
        @endif

        @if (session('status') === 'verification-link-sent')
            <div class="alert alert-success">
                ✓ A new verification link has been sent to your email address.
            </div>
        @endif

        <!-- Profile Information -->
        <div class="profile-card">
            <div class="card-header">
                <h2 class="card-title">Profile Information</h2>
                <p class="card-description">Update your account's profile information and email address.</p>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $user->name) }}" required autofocus>
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <p style="color: #f59e0b; font-size: 13px; margin-top: 8px;">
                            Your email address is unverified.
                            <form method="POST" action="{{ route('verification.send') }}" style="display: inline;">
                                @csrf
                                <button type="submit" style="color: #7c3aed; text-decoration: underline; background: none; border: none; cursor: pointer; font-size: 13px;">
                                    Click here to re-send the verification email.
                                </button>
                            </form>
                        </p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label" for="phone">Phone (optional)</label>
                    <input type="text" id="phone" name="phone" class="form-input" value="{{ old('phone', $user->phone ?? '') }}">
                    @error('phone')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="profile_image">Profile Image (optional)</label>
                    <input type="file" id="profile_image" name="profile_image" class="form-input" accept="image/*" onchange="previewProfileImage(event)">
                    @error('profile_image')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    
                    <div class="image-preview-container">
                        @if($user->profile_image ?? false)
                            <img id="profileImagePreview" src="{{ asset('storage/' . ($user->profile_image ?? '')) }}" alt="Profile" class="profile-image-preview">
                        @else
                            <div id="profileImagePlaceholder" class="profile-image-placeholder">
                                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                            </div>
                            <img id="profileImagePreview" src="" alt="Profile" class="profile-image-preview" style="display: none;">
                        @endif
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Update Password -->
        <div class="profile-card">
            <div class="card-header">
                <h2 class="card-title">Update Password</h2>
                <p class="card-description">Ensure your account is using a long, random password to stay secure.</p>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-input" autocomplete="current-password">
                    @error('current_password', 'updatePassword')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">New Password</label>
                    <input type="password" id="password" name="password" class="form-input" autocomplete="new-password">
                    @error('password', 'updatePassword')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" autocomplete="new-password">
                    @error('password_confirmation', 'updatePassword')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>

        <!-- Delete Account -->
        <div class="profile-card">
            <div class="card-header">
                <h2 class="card-title">Delete Account</h2>
                <p class="card-description">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
            </div>

            <button type="button" class="btn btn-danger" onclick="openDeleteModal()">Delete Account</button>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Are you sure you want to delete your account?</h3>
                <p class="modal-description">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
            </div>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <div class="form-group">
                    <label class="form-label" for="delete_password">Password</label>
                    <input type="password" id="delete_password" name="password" class="form-input" placeholder="Enter your password">
                    @error('password', 'userDeletion')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 EventPlanner. All rights reserved.</p>
    </div>

    <script>userDropdown').classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userInfo = document.querySelector('.user-info');
            const dropdown = document.getElementById('userDropdown');
            
            if (!userInfo.contains(event.target)) {
                dropdown.classList.remove('show
            if (!userMenu.contains(event.target)) {
                dropdown.classList.remove('active');
            }
        });

        function previewProfileImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('profileImagePreview');
            const placeholder = document.getElementById('profileImagePlaceholder');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    if (placeholder) {
                        placeholder.style.display = 'none';
                    }
                };
                reader.readAsDataURL(file);
            }
        }

        function openDeleteModal() {
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
        }

        // Show delete modal if there are validation errors
        @if($errors->userDeletion->isNotEmpty())
            openDeleteModal();
        @endif
    </script>
</body>
</html>
