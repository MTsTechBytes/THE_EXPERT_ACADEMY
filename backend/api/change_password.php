<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();

$data = json_decode(file_get_contents("php://input"));

$user_id = $_SESSION['user_id'];
$old = $data->old_password;
$new = password_hash($data->new_password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT password FROM users WHERE id=?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!password_verify($old, $user['password'])) {
    echo json_encode(["message" => "Old password incorrect"]);
    exit;
}

$stmt = $conn->prepare("UPDATE users SET password=? WHERE id=?");
$stmt->execute([$new, $user_id]);

echo json_encode(["message" => "Password updated"]);
?>