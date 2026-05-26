<?php
header("Content-Type: application/json");
include "../config/database.php";
include "../middleware/auth.php";

checkAuth();
checkAdmin();

$data = json_decode(file_get_contents("php://input"));

$title = $data->title;
$description = $data->description;
$duration = $data->duration;
$fee = $data->fee;
$image = $data->image;

try {

    $stmt = $conn->prepare("INSERT INTO courses (title, description, duration, fee, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $description, $duration, $fee, $image]);

    echo json_encode(["message" => "Course added successfully"]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>