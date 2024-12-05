<?php
/*
 * Author: Sartaj Singh
 * Date Modified: 2024-12-02
 * Description: This script handles the user login functionality. 
 * It verifies credentials, manages session data, sets cookies for persistent login, and logs user activity.
 */

// Start the session for user login
session_start();

// Enable error reporting for debugging
// Report all PHP errors
error_reporting(E_ALL); 
 // Display errors on the screen
ini_set('display_errors', 1);

// Set page title and banner text
$title = "Login";
$banner = "Login to Your Account";

 // Include the header and functions file
include 'includes/header.php';
include 'includes/functions.php';


// Default empty error message
$error = ""; 
// Initialize a cookie variable for preloading sticky form data
$user_id_cookie = ""; 

// Check if LOGIN_COOKIE exists and preload it into the form field
if (isset($_COOKIE['LOGIN_COOKIE'])) {
    $user_id_cookie = htmlspecialchars($_COOKIE['LOGIN_COOKIE']);
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user inputs
    $user_id = trim($_POST['user_id'] ?? ''); 
    $password = trim($_POST['password'] ?? '');

    // Validate that inputs are not empty
    if (empty($user_id) || empty($password)) {
        // Set error if inputs are empty
        $error = "User ID and password are required."; 
    } else {
        // Ensure the database connection is established
        if (!$conn) {
            // Stop script if connection fails
            die("Database connection failed."); 
        }

        // Fetch the user from the database using a prepared statement
        // Execute the prepared SQL statement
        $result = pg_execute($conn, 'get_user', [$user_id]); 

        // Check if user data is found
        if ($result && $user = pg_fetch_assoc($result)) {
            // Verify the password using password_verify
            if (password_verify($password, $user['password'])) {
                // Store user data in session variables
                $_SESSION['user'] = [
                    'user_id' => $user['user_id'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'email' => $user['email'], 
                    'birth_date' => $user['birth_date'], 
                    'enrol_date' => $user['created_at'], 
                    'last_access' => $user['last_access']
                ];

                // Update the last access timestamp in the database
                pg_execute($conn, 'update_last_access', [$user_id]);

                // Set the LOGIN_COOKIE with a 30-day expiry
                setcookie('LOGIN_COOKIE', $user_id, time() + 60 * 60 * 24 * 30, "/");

                // Log the successful login to an activity log file
                file_put_contents('logs/activity.log', date('Y-m-d H:i:s') . " - User $user_id successfully logged in.\n", FILE_APPEND);

                // Redirect to the grades.php page
                header('Location: grades.php');
                exit(); // Ensure no further script execution
            } else {
                // Handle incorrect password
                $error = "Invalid credentials. Please try again.";
                // Log the failed login attempt
                file_put_contents('logs/activity.log', date('Y-m-d H:i:s') . " - Failed login attempt for user ID $user_id.\n", FILE_APPEND);
            }
        } else {
            // Handle user ID not found
            $error = "User ID does not exist.";
        }
    }
}
?>
<div class="content align-home">
    <!-- Display login form -->
    <h3>Login</h3>
    <!-- Display error message if present -->
    <?php if ($error): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST">
        <!-- Input field for User ID -->
        <label>User ID</label>
        <input type="text" name="user_id" value="<?php echo $user_id_cookie; ?>" required>
        <!-- Input field for Password -->
        <label>Password</label>
        <input type="password" name="password" required>
        <!-- Submit button -->
        <button type="submit">Login</button>
    </form>
</div>
<?php
// Include reusable footer
include 'includes/footer.php';
?>
