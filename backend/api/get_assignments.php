<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();

$user_id = $_SESSION['user_id'];

try {

    $stmt = $conn->prepare("
        SELECT assignments.*
        FROM assignments
        JOIN enrollments ON assignments.course_id = enrollments.course_id
        WHERE enrollments.user_id = ?
    ");

    $stmt->execute([$user_id]);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>