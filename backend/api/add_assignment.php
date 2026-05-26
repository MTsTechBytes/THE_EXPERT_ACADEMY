<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();
checkAdmin();

$data = json_decode(file_get_contents("php://input"));

$course_id = $data->course_id;
$title = $data->title;
$description = $data->description;
$file = $data->file;
$deadline = $data->deadline;

try {

    $stmt = $conn->prepare("
        INSERT INTO assignments (course_id, title, description, file, deadline)
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->execute([$course_id, $title, $description, $file, $deadline]);

    echo json_encode(["message" => "Assignment created"]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>