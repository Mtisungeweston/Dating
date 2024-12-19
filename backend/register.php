<?php
// Include the database configuration file
require_once 'config.php';

// Initialize variables to store errors and success messages
$errors = [];
$successMessage = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data and sanitize inputs
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);
    $gender = trim(mysqli_real_escape_string($conn, $_POST['gender']));
    $country = trim(mysqli_real_escape_string($conn, $_POST['country']));
    $interest = trim(mysqli_real_escape_string($conn, $_POST['interest']));
    $religion = trim(mysqli_real_escape_string($conn, $_POST['religion']));
    $relationshipType = trim(mysqli_real_escape_string($conn, $_POST['relationshipType']));
    $usedDatingSite = trim(mysqli_real_escape_string($conn, $_POST['usedDatingSite']));

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) || empty($gender) || empty($country) || empty($interest) || empty($religion) || empty($relationshipType) || empty($usedDatingSite)) {
        $errors[] = "All fields are required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    // Check if username or email already exists
    $query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Username or email already exists.";
    }

    // If no errors, insert data into the database
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
        $insertQuery = "INSERT INTO users (username, email, password, gender, country, interest, religion, relationship_type, used_dating_site, created_at) 
                        VALUES ('$username', '$email', '$hashedPassword', '$gender', '$country', '$interest', '$religion', '$relationshipType', '$usedDatingSite', NOW())";
        if (mysqli_query($conn, $insertQuery)) {
            $successMessage = "Registration successful. You can now <a href='login.php'>log in</a>.";
        } else {
            $errors[] = "Error registering user: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Friendizo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <?php if (!empty($errors)): ?>
            <div class="error-messages">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if ($successMessage): ?>
            <div class="success-message">
                <p><?php echo $successMessage; ?></p>
            </div>
        <?php endif; ?>

        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select id="country" name="country" required>
                    <!-- Dynamically populated countries -->
                </select>
            </div>
            <div class="form-group">
                <label for="interest">Interest</label>
                <select id="interest" name="interest" required>
                    <option value="">Select your interest</option>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                    <option value="Both">Both</option>
                </select>
            </div>
            <div class="form-group">
                <label for="religion">Religion</label>
                <select id="religion" name="religion" required>
                    <option value="">Select your religion</option>
                    <option value="Christianity">Christianity</option>
                    <option value="Islam">Islam</option>
                    <option value="Hinduism">Hinduism</option>
                    <option value="Buddhism">Buddhism</option>
                    <option value="Judaism">Judaism</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="relationshipType">Type of Relationship</label>
                <select id="relationshipType" name="relationshipType" required>
                    <option value="">Select relationship type</option>
                    <option value="Serious">Serious</option>
                    <option value="Casual">Casual</option>
                    <option value="Friendship">Friendship</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usedDatingSite">Used a dating site before?</label>
                <select id="usedDatingSite" name="usedDatingSite" required>
                    <option value="">Select an option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>
</body>
</html>
