<?php
header("Content-Type: application/json");

include "../middleware/auth.php";

checkAuth();
checkAdmin();

echo json_encode([
    "message" => "Welcome Admin Dashboard",
    "stats" => [
        "students" => 0,
        "courses" => 0,
        "teachers" => 0
    ]
]);
?>