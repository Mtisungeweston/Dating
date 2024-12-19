-- Create the database
CREATE DATABASE friendizo;
USE friendizo;

-- Create the members table
CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    subscription_status ENUM('free', 'paid') DEFAULT 'free',
    profile_picture VARCHAR(255) DEFAULT NULL,
    bio TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create the likes table
CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    liker_id INT NOT NULL,
    liked_id INT NOT NULL,
    liked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (liker_id) REFERENCES members(id) ON DELETE CASCADE,
    FOREIGN KEY (liked_id) REFERENCES members(id) ON DELETE CASCADE
);

-- Create the loves table
CREATE TABLE loves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lover_id INT NOT NULL,
    loved_id INT NOT NULL,
    loved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lover_id) REFERENCES members(id) ON DELETE CASCADE,
    FOREIGN KEY (loved_id) REFERENCES members(id) ON DELETE CASCADE
);

-- Create the messages table
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    recipient_id INT NOT NULL,
    message_content TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES members(id) ON DELETE CASCADE,
    FOREIGN KEY (recipient_id) REFERENCES members(id) ON DELETE CASCADE
);

-- Create the subscriptions table
CREATE TABLE subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT NOT NULL,
    subscription_type ENUM('daily', 'weekly', 'monthly') NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    end_date TIMESTAMP,
    FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE
);

-- Create the notifications table
CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT NOT NULL,
    notification_content TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE
);

-- Insert sample members
INSERT INTO members (username, email, password_hash, subscription_status, profile_picture, bio)
VALUES
('weston', 'mtisungeweston@gmail.com', SHA2('91972355', 256), 'paid', 'uploads/weston1.jpg', 'Love to meet new people!'),
('racheal', 'racheal@example.com', SHA2('password123', 256), 'free', 'uploads/racheal.jpg', 'Here for good vibes.');

-- Insert sample likes
INSERT INTO likes (liker_id, liked_id)
VALUES
(1, 2), -- Weston likes Racheal
(2, 1); -- Racheal likes Weston back

-- Insert sample loves
INSERT INTO loves (lover_id, loved_id)
VALUES
(1, 2); -- Weston loves Racheal

-- Insert sample messages
INSERT INTO messages (sender_id, recipient_id, message_content)
VALUES
(1, 2, 'Hi Racheal!'),
(2, 1, 'Hello Weston!');

-- Insert sample subscriptions
INSERT INTO subscriptions (member_id, subscription_type, amount, start_date, end_date)
VALUES
(1, 'monthly', 55.00, CURRENT_TIMESTAMP, DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 1 MONTH)),
(2, 'free', 0.00, CURRENT_TIMESTAMP, NULL);

-- Insert sample notifications
INSERT INTO notifications (member_id, notification_content, is_read)
VALUES
(1, 'You have a new message from Racheal.', FALSE),
(2, 'Weston liked your profile!', FALSE);
