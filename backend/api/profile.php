<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, name, email, role FROM users WHERE id=?");
$stmt->execute([$user_id]);

echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
?>