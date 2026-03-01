<?php
session_start();

// === Database connection ===
$host = "localhost";
$user = "root";
$pass = "";
$db   = "queuing_system";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// === Login logic ===
if (isset($_POST['login'])) {
    $pin = $_POST['password'];

    if (strlen($pin) != 6) {
        header('location:index.php');
        exit;
    }

    $stmt = $conn->prepare("SELECT id, page FROM pins WHERE pin = ?");
    $stmt->bind_param("s", $pin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $_SESSION['pin_id'] = $row['id'];
        $_SESSION['page']   = $row['page'];

        header("Location: " . $row['page']);
        exit;
    } else {
        header('location:index.php');
    }
}
?>
