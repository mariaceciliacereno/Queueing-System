<?php
session_start();
$number = $_POST["number"] ?? 10;
$current = $_SESSION['current'] ?? 1;

$tickets = [];
for($i=0;$i<5;$i++){
    $n = $current + $i;
    if($n > $number) $n -= $number;
    $tickets[] = $n;
}

echo json_encode([
    'current'=>$current,
    'tickets'=>$tickets
]);
