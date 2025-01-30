<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = 'w/admin/database/data.txt';
    $data = file_exists($filename) ? file_get_contents($filename) : '';

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $number = trim($_POST['number']);
    $email = trim($_POST['email']);
    $country = trim($_POST['country']);
    $state = trim($_POST['state']);
    $city = trim($_POST['city']);
    $area = trim($_POST['area']);

    $new_entry = "$firstname|$lastname|$number|$email";

    // Check if user already exists
    $lines = explode(PHP_EOL, $data);
    foreach ($lines as $line) {
        if (strpos($line, $firstname . '|') !== false && strpos($line, '|' . $lastname . '|') !== false && strpos($line, '|' . $number . '|') !== false && strpos($line, '|' . $email) !== false) {
            echo '<script>alert("User already exists."); window.history.back();</script>';
            exit;
        }
    }

    // Append new user to data file
    $new_data = $new_entry . '|' . $country . '|' . $state . '|' . $city . '|' . $area . PHP_EOL;
    file_put_contents($filename, $data . $new_data);

    // Redirect to home page
    echo '<script>alert("Registration successful! Redirecting to home."); window.location.href = "home.html";</script>';
    exit;
}
?>