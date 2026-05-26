<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();

$data = json_decode(file_get_contents("php://input"));

$user_id = $_SESSION['user_id'];
$assignment_id = $data->assignment_id;
$file = $data->file;

try {

    // prevent duplicate submission
    $check = $conn->prepare("
        SELECT id FROM submissions
        WHERE user_id=? AND assignment_id=?
    ");

    $check->execute([$user_id, $assignment_id]);

    if ($check->rowCount() > 0) {
        echo json_encode(["message" => "Already submitted"]);
        exit;
    }

    $stmt = $conn->prepare("
        INSERT INTO submissions (assignment_id, user_id, file)
        VALUES (?, ?, ?)
    ");

    $stmt->execute([$assignment_id, $user_id, $file]);

    echo json_encode(["message" => "Submitted successfully"]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>