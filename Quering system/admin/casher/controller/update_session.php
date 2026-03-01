<?php
session_start();

// Update the current ticket from AJAX POST
if(isset($_POST['current'])){
    $_SESSION['current'] = intval($_POST['current']);
}

// Optionally, return JSON for debugging (not strictly required)
header('Content-Type: application/json');
echo json_encode(['current'=>$_SESSION['current']]);
