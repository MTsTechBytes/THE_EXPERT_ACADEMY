<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();

$data = json_decode(file_get_contents("php://input"));

$user_id = $_SESSION['user_id'];
$course_id = $data->course_id;

try {

    // check if already enrolled
    $check = $conn->prepare("SELECT id FROM enrollments WHERE user_id=? AND course_id=?");
    $check->execute([$user_id, $course_id]);

    if ($check->rowCount() > 0) {
        echo json_encode(["message" => "Already enrolled"]);
        exit;
    }

    // enroll student
    $stmt = $conn->prepare("INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)");
    $stmt->execute([$user_id, $course_id]);

    echo json_encode(["message" => "Enrolled successfully"]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>