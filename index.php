<?php
// Include the file containing your IP-related logic
include 'ip.php';

// Redirect the user to the index.html page
header('Location: home.html');

// Ensure that no further code is executed
exit;
?>