const express = require('express');
const mysql = require('mysql2');
const app = express();
app.use(express.json());  // to parse JSON data from requests

// Connect to MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',  // Replace with your MySQL username
  password: '',  // Replace with your MySQL password
  database: 'friendizo',  // The name of your database
});

// Test the database connection
db.connect((err) => {
  if (err) {
    console.error('Error connecting to the database:', err);
  } else {
    console.log('Connected to the MySQL database');
  }
});

// Endpoint to handle user login
app.post('/login', (req, res) => {
  const { email, password } = req.body;

  // Query the database for the user with the provided email
  const query = 'SELECT * FROM users WHERE email = ?';
  db.query(query, [email], (err, results) => {
    if (err) return res.status(500).send('Server error');
    if (results.length === 0) return res.status(404).send('User not found');

    // Check if passwords match (for simplicity, we’ll skip hashing for now)
    if (results[0].password === password) {
      res.status(200).send('Login successful');
    } else {
      res.status(401).send('Invalid credentials');
    }
  });
});

// Start the server on port 3000
app.listen(3307, () => {
  console.log('Server running on http://localhost:3000');
});
