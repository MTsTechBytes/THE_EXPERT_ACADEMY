<?php
header("Content-Type: application/json");

include "../config/database.php";

$query = $_GET['q'];

$stmt = $conn->prepare("SELECT * FROM courses WHERE title LIKE ?");
$stmt->execute(["%$query%"]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>