<?php
header("Content-Type: application/json");
include "../config/database.php";

$data = json_decode(file_get_contents("php://input"));

$name = $data->name;
$email = $data->email;
$password = password_hash($data->password, PASSWORD_DEFAULT);
$role = "student";

try {

    // check if email exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute([$email]);

    if ($check->rowCount() > 0) {
        echo json_encode(["message" => "Email already exists"]);
        exit;
    }

    // insert user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $password, $role]);

    echo json_encode(["message" => "User registered successfully"]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>