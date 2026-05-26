<?php
session_start();

function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["message" => "Not logged in"]);
        exit;
    }
}

function checkAdmin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
        echo json_encode(["message" => "Access denied"]);
        exit;
    }
}
?>