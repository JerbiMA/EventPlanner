<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner - Sign In</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
            min-height: 550px;
        }

        .left-side {
            flex: 1;
            background: linear-gradient(135deg, rgba(16, 78, 139, 0.95), rgba(0, 139, 139, 0.9)), 
                        url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=2070') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 50px 40px;
            position: relative;
        }

        .left-content {
            text-align: center;
            z-index: 1;
        }

        .left-side h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .left-side p {
            font-size: 14px;
            margin-bottom: 30px;
            line-height: 1.6;
            opacity: 0.95;
        }

        .signup-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid white;
            color: white;
            padding: 12px 50px;
            font-size: 15px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            text-decoration: none;
            display: inline-block;
        }

        .signup-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .right-side {
            flex: 1;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 40px;
        }

        .form-container {
            width: 100%;
            max-width: 380px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h2 {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        .logo .planner {
            color: #7c3aed;
        }

        .form-title {
            font-size: 26px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 35px;
            color: #1a1a1a;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .password-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .forgot-link {
            font-size: 11px;
            color: #999;
            text-decoration: none;
            text-transform: none;
            font-weight: 400;
            letter-spacing: 0;
        }

        .forgot-link:hover {
            color: #7c3aed;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #e0e0e0;
            background: #f8f9fa;
            border-radius: 8px;
            font-size: 14px;
            color: #333;
            transition: all 0.3s ease;
        }

        .form-group input::placeholder {
            color: #999;
        }

        .form-group input:focus {
            outline: none;
            border-color: #7c3aed;
            background: white;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }

        .signin-btn {
            width: 100%;
            padding: 14px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
            transition: all 0.3s ease;
        }

        .signin-btn:hover {
            background: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 10px 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
                max-width: 450px;
            }

            .left-side {
                padding: 40px 30px;
            }

            .left-side h1 {
                font-size: 28px;
            }

            .right-side {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="card-container">
        <!-- Left Side -->
        <div class="left-side">
            <div class="left-content">
                <h1>Hello Friend</h1>
                <p>To keep connected with us provide us with your information</p>
                <a href="{{ route('register') }}" class="signup-btn">Signup</a>
            </div>
        </div>

        <!-- Right Side -->
        <div class="right-side">
            <div class="form-container">
                <div class="logo">
                    <h2>Event <span class="planner">Planner</span></h2>
                </div>

                <h1 class="form-title">Sign In</h1>

                @if ($errors->any())
                    <div class="error-message">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @if (session('status'))
                    <div class="error-message" style="background: #efe; color: #484;">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email">YOUR EMAIL</label>
                        <input type="email" id="email" name="email" placeholder="Enter your mail" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <div class="password-label">
                            <label for="password">PASSWORD</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                            @endif
                        </div>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" class="signin-btn">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
