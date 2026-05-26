<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();

$user_id = $_SESSION['user_id'];

try {

    $stmt = $conn->prepare("
        SELECT courses.*
        FROM enrollments
        JOIN courses ON enrollments.course_id = courses.id
        WHERE enrollments.user_id = ?
    ");

    $stmt->execute([$user_id]);

    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($courses);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>