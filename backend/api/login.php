<?php
session_start();
header("Content-Type: application/json");
include "../config/database.php";

$data = json_decode(file_get_contents("php://input"));

$email = $data->email;
$password = $data->password;

try {

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(["message" => "User not found"]);
        exit;
    }

    if (!password_verify($password, $user['password'])) {
        echo json_encode(["message" => "Invalid password"]);
        exit;
    }

    // create session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    echo json_encode([
        "message" => "Login successful",
        "user" => [
            "id" => $user['id'],
            "name" => $user['name'],
            "role" => $user['role']
        ]
    ]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>