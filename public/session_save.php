<?php
session_start();

$data = json_decode(file_get_contents("php://input"), true);

$uid = $_GET['uid'] ?? ($_SESSION['current_uid'] ?? null); // fallback
$slug = $data['slug'] ?? 'default';
$html = $data['html'] ?? '';

if (!empty($uid)) {
    $_SESSION['saved'][$uid] = [
        'slug' => $slug,
        'html' => $html
    ];
    $_SESSION['current_uid'] = $uid;
    echo "Saved for UID: $uid";
} else {
    echo "UID missing";
}
