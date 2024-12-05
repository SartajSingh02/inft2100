<?php
/*
 * Author: Sartaj Singh
 * Date Modified: 2024-12-02
 * Description: This script establishes a connection to a PostgreSQL database, prepares SQL statements, 
 * and defines helper functions for database operations, 
 * such as fetching user data, updating records, and inserting new users or students.
 */

// Function to establish a database connection
function db_connect() {
    // Database connection details
    $host = 'localhost';
    $port = '5432';
    $dbname = 'singhs2_db';
    $user = 'postgres';
    $password = '100942341';

    // Connect to the PostgreSQL database
    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    // Check if the connection was successful
    if (!$conn) {
        die("Database connection failed."); 
    }

    return $conn; 
}

// Establish the database connection
$conn = db_connect();

// 1. Prepare statement to fetch user by user ID
pg_prepare($conn, 'get_user', 'SELECT * FROM users WHERE user_id = $1');

// 2. Prepare statement to select user and student information by user ID
pg_prepare($conn, 'select_user_student',
    'SELECT u.user_id, u.first_name, u.last_name, u.email, u.birth_date, u.last_access, s.program_code 
     FROM users u 
     LEFT JOIN students s ON u.user_id = s.user_id 
     WHERE u.user_id = $1');

// 3. Prepare statement to update the last_access field for a user
pg_prepare($conn, 'update_last_access', 
    'UPDATE users SET last_access = CURRENT_TIMESTAMP WHERE user_id = $1');

// 4. Prepare statement to insert a new user into the users table
pg_prepare($conn, 'insert_user',
    'INSERT INTO users (first_name, last_name, email, birth_date, password, created_at, last_access) 
     VALUES ($1, $2, $3, $4, $5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP) RETURNING user_id');

// 5. Prepare statement to insert a new student into the students table
pg_prepare($conn, 'insert_student', 
    'INSERT INTO students (user_id, program_code) VALUES ($1, $2)');

// Function to fetch user and student information by user ID
function get_user_student_info($conn, $user_id) {
    // Execute the prepared statement to fetch user and student data
    $result = pg_execute($conn, 'select_user_student', [$user_id]);

    // Fetch and return the first result as an associative array
    return pg_fetch_assoc($result);
}

// Function to update the last_access timestamp for a user
function update_last_access($conn, $user_id) {
    // Execute the prepared statement to update the last_access field
    return pg_execute($conn, 'update_last_access', [$user_id]);
}

// Function to insert a new user and return the generated user ID
function insert_user($conn, $first_name, $last_name, $email, $birth_date, $password) {
    // Execute the prepared statement to insert a new user
    $result = pg_execute($conn, 'insert_user', [$first_name, $last_name, $email, $birth_date, $password]);

    // Fetch and return the user_id from the result if the insertion was successful
    if ($result) {
        return pg_fetch_result($result, 0, 'user_id');
    }

    return false;
}

// Function to insert a new student into the students table
function insert_student($conn, $user_id, $program_code) {
    // Execute the prepared statement to insert a new student
    return pg_execute($conn, 'insert_student', [$user_id, $program_code]);
}
?>
