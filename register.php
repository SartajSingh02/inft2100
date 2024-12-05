<?php
/*
 * Author: Sartaj Singh
 * Date Modified: 2024-12-02
 * Description: This script handles user registration for the portal. It validates user inputs, checks for duplicate accounts, and stores user and student data in the database. It also provides feedback for errors or successful registration.
 */

// Start the session for user handling
session_start();

// Set the page title and banner text
$title = "Register";
$banner = "Register to Your Account";

// Include the header and functions files
include 'includes/header.php';
include 'includes/functions.php';

// Redirect logged-in users to the grades page
if (isset($_SESSION['user'])) {
    // Set a message to notify the user
    $_SESSION['message'] = 'You are already logged in and cannot register again.';
    header('Location: grades.php');
    exit();
}

// Initialize error and form data variables
$error = "";
$valid_data = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize inputs
    $valid_data['email'] = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $valid_data['first_name'] = htmlspecialchars(trim($_POST['first_name']));
    $valid_data['last_name'] = htmlspecialchars(trim($_POST['last_name']));
    $valid_data['birth_date'] = trim($_POST['birth_date']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $program = trim($_POST['program']);

    // Initialize validation flags and errors array
    $valid = true;
    $errors = [];

    // Validate email
    if (!$valid_data['email']) {
        $valid = false;
        $errors['email'] = "Please enter a valid email address.";
    }

    // Validate first name
    if (empty($valid_data['first_name']) || strlen($valid_data['first_name']) > 50) {
        $valid = false;
        $errors['first_name'] = "First name is required and must not exceed 50 characters.";
    }

    // Validate last name
    if (empty($valid_data['last_name']) || strlen($valid_data['last_name']) > 50) {
        $valid = false;
        $errors['last_name'] = "Last name is required and must not exceed 50 characters.";
    }

    // Validate birth date
    if (empty($valid_data['birth_date']) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $valid_data['birth_date'])) {
        $valid = false;
        $errors['birth_date'] = "Please enter a valid birth date (YYYY-MM-DD).";
    }

    // Validate passwords
    if (empty($password) || empty($confirm_password)) {
        $valid = false;
        $errors['password'] = "Both password fields are required.";
    } elseif ($password !== $confirm_password) {
        $valid = false;
        $errors['password'] = "Passwords do not match.";
    } elseif (strlen($password) < 8 || strlen($password) > 20) {
        $valid = false;
        $errors['password'] = "Password must be between 8 and 20 characters.";
    }

    // Validate program
    if (empty($program) || !in_array($program, ['CPGA', 'CPGM'])) {
        $valid = false;
        $errors['program'] = "Please select a valid program.";
    }

    // Proceed if all validations pass
    if ($valid) {
        try {
            // Check if email is already registered
            $email_check = pg_prepare($conn, 'check_email', 'SELECT * FROM users WHERE email = $1');
            $email_result = pg_execute($conn, 'check_email', [$valid_data['email']]);
            if (pg_num_rows($email_result) > 0) {
                $errors['email'] = "This email address is already registered.";
            } else {
                // Hash the password securely
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // Insert user into the database
                $user_result = pg_execute($conn, 'insert_user', [
                    $valid_data['first_name'],
                    $valid_data['last_name'],
                    $valid_data['email'],
                    $valid_data['birth_date'],
                    $hashed_password
                ]);

                if ($user_result) {
                    // Retrieve the newly created user ID
                    $new_user_id = pg_fetch_result($user_result, 0, 'user_id');

                    // Insert the user into the students table
                    $student_result = pg_execute($conn, 'insert_student', [$new_user_id, $program]);

                    if ($student_result) {
                        // Log the registration activity
                        file_put_contents('logs/activity.log', date('Y-m-d H:i:s') . " - User $new_user_id registered.\n", FILE_APPEND);

                        // Redirect to login page with success message
                        $_SESSION['message'] = 'Registration successful! Please log in.';
                        header('Location: login.php'); // Redirect to login page
                        exit(); // Stop further execution
                    } else {
                        $errors['general'] = "Failed to register as a student.";
                    }
                } else {
                    $errors['general'] = "Failed to create user.";
                }
            }
        } catch (Exception $e) {
            // Handle unexpected errors
            $errors['general'] = "An unexpected error occurred. Please try again later.";
        }
    }
}
?>

<!-- Main content section for registration form -->
<div class="content align-home">
    <h3>Register</h3>
    <!-- Display error messages if any -->
    <?php if (!empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <!-- Registration form -->
    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($valid_data['email'] ?? ''); ?>" required>
        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($valid_data['first_name'] ?? ''); ?>" required>
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($valid_data['last_name'] ?? ''); ?>" required>
        <label>Birth Date</label>
        <input type="date" name="birth_date" value="<?php echo htmlspecialchars($valid_data['birth_date'] ?? ''); ?>" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>
        <label>Program</label>
        <div>
            <label>
                <input type="radio" name="program" value="CPGA" <?php echo (isset($program) && $program === 'CPGA') ? 'checked' : ''; ?>> CPGA
            </label>
            <label>
                <input type="radio" name="program" value="CPGM" <?php echo (isset($program) && $program === 'CPGM') ? 'checked' : ''; ?>> CPGM
            </label>
        </div>
        <button type="submit">Register</button>
    </form>
</div>

<?php
// Include the footer file for common HTML structure and styling
include 'includes/footer.php';
?>
