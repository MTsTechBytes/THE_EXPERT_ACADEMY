<?php
header("Content-Type: application/json");
include "../config/database.php";
include "../middleware/auth.php";

checkAuth();
checkAdmin();

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$title = $data->title;
$description = $data->description;
$duration = $data->duration;
$fee = $data->fee;

try {

    $stmt = $conn->prepare("UPDATE courses SET title=?, description=?, duration=?, fee=? WHERE id=?");
    $stmt->execute([$title, $description, $duration, $fee, $id]);

    echo json_encode(["message" => "Course updated successfully"]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>