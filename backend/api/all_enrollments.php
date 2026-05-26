<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();
checkAdmin();

try {

    $stmt = $conn->prepare("
        SELECT users.name, users.email, courses.title, enrollments.enrolled_at
        FROM enrollments
        JOIN users ON enrollments.user_id = users.id
        JOIN courses ON enrollments.course_id = courses.id
        ORDER BY enrollments.enrolled_at DESC
    ");

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>