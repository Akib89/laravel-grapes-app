<?php
// public/session_save.php
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['slug'], $data['php'], $data['css'])) {
    http_response_code(400);
    echo "Invalid payload";
    exit;
}

$uid  = $_GET['uid'] ?? null;
$slug = $data['slug'];
$html = $data['php']; // grapesJs HTML
$css  = $data['css']; // grapesJs CSS

if (!$uid) {
    echo "UID missing";
    exit;
}

$_SESSION['saved'][$uid] = [
    'slug' => $slug,
    'php'  => $html,
    'css'  => $css,
];

$_SESSION['current_uid'] = $uid;

echo "Auto-saved for UID: $uid";
