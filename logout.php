<?php
/*
 * Author: Sartaj Singh
 * Date Modified: 2024-12-02
 * Description: This script handles user logout by clearing session data, destroying the session, logging the activity, and redirecting the user to the login page.
 */

// Start session handling
session_start(); // Initiate the session to manage user authentication

// Include the reusable header file
include 'includes/header.php';

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Restart the session
session_start();

// Set the logout message in the session
$_SESSION['message'] = 'You have successfully logged out.';

// Log the logout activity
file_put_contents('logs/activity.log', date('Y-m-d H:i:s') . " - User logged out.\n", FILE_APPEND);

// Redirect to the login page
header('Location: login.php');

// Flush the output buffer to ensure redirection happens immediately
ob_flush();

exit();
?>
