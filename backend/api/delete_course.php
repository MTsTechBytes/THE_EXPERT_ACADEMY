<?php
header("Content-Type: application/json");
include "../config/database.php";
include "../middleware/auth.php";

checkAuth();
checkAdmin();

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;

try {

    $stmt = $conn->prepare("DELETE FROM courses WHERE id=?");
    $stmt->execute([$id]);

    echo json_encode(["message" => "Course deleted successfully"]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>