<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = 'w/admin/database/data2.txt';
    $data = file_exists($filename) ? file_get_contents($filename) : '';

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $number = trim($_POST['number']);
    $email = trim($_POST['email']);
    $report_type = trim($_POST['report_type']);
    $criminal_info = trim($_POST['criminal_info']);
    $address = trim($_POST['address']);
    $gender = trim($_POST['gender']);
    $age = trim($_POST['age']);

    $new_entry = "$firstname|$lastname|$number|$email|$report_type|$criminal_info|$address|$gender|$age";

    // Append new report to the file
    file_put_contents($filename, $new_entry . PHP_EOL, FILE_APPEND);

    // Redirect to done.html
    echo '<script>alert("Report submitted successfully! Redirecting..."); window.location.href = "done.html";</script>';
    exit;
}
?>