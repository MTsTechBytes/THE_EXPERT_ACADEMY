<?php
header("Content-Type: application/json");
include "../config/database.php";

try {

    $stmt = $conn->prepare("SELECT * FROM courses ORDER BY id DESC");
    $stmt->execute();

    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($courses);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>