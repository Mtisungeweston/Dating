
<link rel="stylesheet" id="theme-css" href="/css/theme-friendizo.css" media="all">
<link rel="stylesheet" id="header" href="slide images/" media="all">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="shortcut icon" href="images/favicon.svg" type="image/svg+xml">
		<meta name="application-name" content="friendizo">
		<meta name="theme-color" content="#32825a">
				<link rel="alternate" href="https://www.friendizo.com" hreflang="en-US">           
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FRIENDIZO</title>
        <style>
            body {
                margin: 0;
                font-family: Arial, sans-serif;
            }
    
            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
                background-color: #333;
                color: white;
                position: relative;
            }
    
            .logo {
                font-size: 2rem;
                font-weight: bold;
                color: #00b7ff;
                animation: pulse 2s infinite;
            }
    
            @keyframes pulse {
                0%, 100% {
                    transform: scale(1);
                }
                50% {
                    transform: scale(1.1);
                }
            }
    
            .toggle-button {
                background: none;
                border: none;
                color: white;
                font-size: 1.5rem;
                cursor: pointer;
                padding: 5px 10px;
            }
    
            .menu-container {
                position: absolute;
                top: 50px;
                right: 10px;
                background-color: #444;
                color: white;
                width: 200px;
                display: none;
                border-radius: 5px;
                overflow: hidden;
                z-index: 10;
            }
    
            .menu-container a {
                color: white;
                text-decoration: none;
                display: block;
                padding: 10px;
                transition: background-color 0.3s ease, color 0.3s ease;
            }
    
            .menu-container a:hover {
                background-color: #ff6f61;
                color: white;
            }
    
            @keyframes slideDown {
                from {
                    transform: translateY(-20px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
    
            @keyframes slideUp {
                from {
                    transform: translateY(0);
                    opacity: 1;
                }
                to {
                    transform: translateY(-20px);
                    opacity: 0;
                }
            }
    
            .menu-container.show {
                display: block;
                animation: slideDown 0.3s ease;
            }
    
            .menu-container.hide {
                animation: slideUp 0.3s ease;
                animation-fill-mode: forwards;
            }
    
            @media (max-width: 768px) {
                header {
                    flex-wrap: wrap;
                }
    
                .menu-container {
                    width: 100%;
                    right: 0;
                }
            }
        </style>
</head>
<body>
    <header>
        <div class="logo"><a href="index.html">FRIENDIZO</a></div>
		
        <button class="toggle-button" onclick="toggleMenu()">☰</button>
    </header>
        <div id="menu" class="menu-container">
            <a href="#">Home</a>
            <a href="/Pages/Log-in-form.html">Log In</a>
            <a href="/Pages/Registration-form.html">Sign Up</a>
        </div>
        <script>
            const menu = document.getElementById('menu');
            let isMenuOpen = false;
    
            function toggleMenu() {
                if (isMenuOpen) {
                    menu.classList.remove('show');
                    menu.classList.add('hide');
                    setTimeout(() => menu.style.display = 'none', 300);
                } else {
                    menu.style.display = 'block';
                    menu.classList.remove('hide');
                    menu.classList.add('show');
                }
                isMenuOpen = !isMenuOpen;
            }
        </script>
    </body>
    </html>
         
    <section class="lp-header has-transition has-mobile-gradient has-main-100-background-color alignleft" style="cursor: ;">
    
        <div class="image-container active" style="background-color: transparent"><picture>
                        <source media="(min-width: 768px)" srcset="/images/homepage-uk-female-2023-02.jpg">
                        <source srcset="/images/homepage-uk-female-2023-02-828x600.jpg">
                        <img decoding="async" width="828" height="600" src="/images/homepage-uk-female-2023-02-828x600.jpg" alt="" loading="eager" fetchpriority="high">
                    </picture></div><div class="image-container" style="background-color: transparent"><picture>
                        <source media="(min-width: 768px)" srcset="/images/homepage-uk-male-2023-02.jpg">
                        <source srcset="/images/homepage-uk-male-2023-02-828x600.jpg">
                        <img decoding="async" width="828" height="600" src="/images/homepage-uk-male-2023-02-828x600.jpg" alt="" loading="lazy" fetchpriority="low">
                    </picture></div>
        <div class="block-content">
            <div class="inner-blocks">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .google-btn {
            width: 100%;
            background-color: #4285F4;
            color: #fff;
            border: none;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .google-btn img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .google-btn:hover {
            background-color: #357AE8;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Log In</h2>
        <form id="loginForm" onsubmit="return validateLoginForm()">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <span id="emailError" class="error"></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <span id="passwordError" class="error"></span>
            </div>
            <div class="forgot-password">
                <a href="#" onclick="openResetPasswordModal()">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Log In</button>
        </form>
    </div>

    <!-- Password Reset Modal -->
    <div id="resetPasswordModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeResetPasswordModal()">&times;</span>
            <h3>Reset Password</h3>
            <form id="resetPasswordForm" onsubmit="return sendResetEmail()">
                <div class="form-group">
                    <label for="resetEmail">Enter your email</label>
                    <input type="email" id="resetEmail" name="resetEmail" placeholder="Enter your email" required>
                    <span id="resetEmailError" class="error"></span>
                </div>
                <button type="submit" class="btn">Send Reset Link</button>
            </form>
        </div>
    </div>

    <style>
        .forgot-password {
            text-align: right;
            margin-top: 5px;
        }

        .forgot-password a {
            text-decoration: none;
            color: #007bff;
            cursor: pointer;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .modal-content .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
        }
    </style>

    <script>
        function validateLoginForm() {
            let isValid = true;

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');

            emailError.textContent = '';
            passwordError.textContent = '';

            if (!email.includes('@')) {
                emailError.textContent = 'Please enter a valid email.';
                isValid = false;
            }

            if (password.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters.';
                isValid = false;
            }

            return isValid;
        }

        function openResetPasswordModal() {
            document.getElementById('resetPasswordModal').style.display = 'flex';
        }

        function closeResetPasswordModal() {
            document.getElementById('resetPasswordModal').style.display = 'none';
        }

        function sendResetEmail() {
            const resetEmail = document.getElementById('resetEmail').value;
            const resetEmailError = document.getElementById('resetEmailError');

            resetEmailError.textContent = '';

            if (!resetEmail.includes('@')) {
                resetEmailError.textContent = 'Please enter a valid email.';
                return false;
            }

            alert(`Password reset link sent to ${resetEmail}`);
            closeResetPasswordModal();
            return false; // Prevent actual form submission for demo purposes
        }
    </script>
</body>
</html>
