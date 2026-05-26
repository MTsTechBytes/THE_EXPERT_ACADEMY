<?php
header("Content-Type: application/json");

include "../config/database.php";
include "../middleware/auth.php";

checkAuth();

if (isset($_FILES['file'])) {

    $file = $_FILES['file'];
    $filename = time() . "_" . $file['name'];

    move_uploaded_file($file['tmp_name'], "../uploads/" . $filename);

    echo json_encode([
        "message" => "Uploaded",
        "file" => $filename
    ]);

}
?>