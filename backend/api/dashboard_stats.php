<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();
checkAdmin();

try {

    $students = $conn->query("SELECT COUNT(*) FROM users WHERE role='student'")->fetchColumn();
    $courses = $conn->query("SELECT COUNT(*) FROM courses")->fetchColumn();
    $enrollments = $conn->query("SELECT COUNT(*) FROM enrollments")->fetchColumn();

    echo json_encode([
        "students" => $students,
        "courses" => $courses,
        "enrollments" => $enrollments
    ]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>