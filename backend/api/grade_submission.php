<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();
checkAdmin();

$data = json_decode(file_get_contents("php://input"));

$user_id = $data->user_id;
$course_id = $data->course_id;
$assignment_id = $data->assignment_id;
$marks = $data->marks;

$grade = "";

if ($marks >= 80) $grade = "A";
else if ($marks >= 70) $grade = "B";
else if ($marks >= 60) $grade = "C";
else if ($marks >= 50) $grade = "D";
else $grade = "F";

try {

    $stmt = $conn->prepare("
        INSERT INTO results (user_id, course_id, assignment_id, marks, grade)
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->execute([$user_id, $course_id, $assignment_id, $marks, $grade]);

    echo json_encode(["message" => "Result saved"]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>