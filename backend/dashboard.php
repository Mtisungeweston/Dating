-- Active: 1735031682346@@localhost@3307@mysql
-- Active: 1735031682346@@localhost@3307@friendizotive: 1735031682346@@localhost@3307@information_schema
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
    // Redirect to the login page if not logged in
    header("Location: login-form.html");
    exit();
}

// Get user details from the session
$user_email = $_SESSION['user_email'];
?>

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
            opacity: 50%;
            color: white;
            position: relative;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: #ffd000;
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

        @media (max-width: 768px) {
            header {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section with Logo -->
    <header>
        <div class="logo">FRIENDIZO</div>
        <div>Welcome, <?php echo htmlspecialchars($user_email); ?>!</div>
    </header>

    <!-- Link to External CSS for Member Area -->
    <link rel="stylesheet" href="css/Member area.css">

    <!-- Side Panel -->
    <div id="side-panel" class="side-panel">
        <ul>
            <li><a href="#profile">Profile</a></li>
            <li><a href="#settings">Settings</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>

    <!-- Main Content (Member Area) -->
    <div id="member-area">
        <!-- Menu Button -->
        <button id="menu-btn" class="menu-btn">☰</button>

        <!-- Navigation Section -->
        <div id="navigation" class="navigation">
            <button id="discover-btn">Discover <span class="bubble">3</span></button>
            <button id="message-btn" data-paid="false" onclick="handlePaidFeature('message')">Messages <span class="bubble">1</span></button>
            <button id="likes-btn">Likes <span class="bubble">5</span></button>
            <button id="loves-btn">Loves <span class="bubble">2</span></button>
        </div>
        
        <!-- Discover Section -->
        <div id="discover" class="discover-area">
            <h2>Discover Nearby</h2>
            <div id="member-cards">
                <div class="member-card">
                    <img src="uploads/weston1.jpg" alt="Member 1" class="member-photo">
                    <div class="member-info">
                        <h3>Weston Mtisunge</h3>
                        <p>Location: Nearby</p>
                        <div class="member-actions">
                            <button class="like-btn">❤️ Like</button>
                            <button class="message-btn" data-paid="true">💬 Message</button>
                            <button class="love-btn">😍 Love</button>
                            <button class="photo-btn" data-paid="true">📷 Photos</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="member-cards">
                <div class="member-card">
                    <img src="uploads/Racheal.jpg" alt="Member 1" class="member-photo">
                    <div class="member-info">
                        <h3>Racheal Gondwe</h3>
                        <p>Location: Nearby</p>
                        <div class="member-actions">
                            <button class="like-btn">❤️ Like</button>
                            <button class="message-btn" data-paid="true">💬 Message</button>
                            <button class="love-btn">😍 Love</button>
                            <button class="photo-btn" data-paid="true">📷 Photos</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Subscription Pop-Up -->
        <div id="subscription-popup" class="subscription-popup">
            <div class="popup-content">
                <h3>Choose Your Subscription</h3>
                <button class="subscribe-btn" data-package="daily">Daily - $3</button>
                <button class="subscribe-btn" data-package="weekly">Weekly - $15</button>
                <button class="subscribe-btn" data-package="monthly">Monthly - $55</button>
            </div>
        </div>
    </div>

    <script src="Java/Member area.js"></script>
</body>
</html>
