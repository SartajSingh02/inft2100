<?php
/*
 * Author: Sartaj Singh
 * Date Modified: 2024-12-02
 * Description: This script serves as the homepage for the INFT2100 website. 
 * It displays a welcome message and basic information about managing grades and profiles.
 */


// The title to be displayed in the browser tab
$title = "Home-Page"; 
// Set the banner text
$banner = "Welcome to the INFT2100 Website";

// Include the reusable header file
include 'includes/header.php'; 
?>

<!-- Main content of the homepage -->
<div class="align-home">
    <div>
        <!-- Display a simple message to the user -->
        <p>Manage your Grades and Profile easily</p>
    </div>
</div>

<?php
// Include the reusable footer file
include 'includes/footer.php';
?>
