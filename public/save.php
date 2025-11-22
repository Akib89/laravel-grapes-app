<?php
// public/save.php

// Allowed slugs
$allowedSlugs = [
    '3-piece',
    'allergy-cure',
    'blue-cut',
    'combo-pack',
    'headphones',
    'jacket',
    'juta',
    'khejur-gur',
    'ladies-hand-bag',
    'modhu',
    'perfume-bd',
    'pitha',
    'polo-t-shirt',
    'safety-cover',
    'wallet',
];

// Read JSON
$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['slug'], $data['php'], $data['css'])) {
    http_response_code(400);
    echo 'Invalid payload';
    exit;
}

$slug = $data['slug'];
$html = $data['php']; // GrapesJS HTML
$css  = $data['css']; // GrapesJS CSS

// Validate slug
if (!in_array($slug, $allowedSlugs, true)) {
    http_response_code(400);
    echo 'Invalid slug';
    exit;
}

// Save into resources/templates/{slug}.php
$basePath = __DIR__ . '/../resources/templates';

if (!is_dir($basePath)) {
    mkdir($basePath, 0775, true);
}

$filePath = $basePath . '/' . $slug . '.php';

$content = "<style>\n{$css}\n</style>\n{$html}\n";

if (file_put_contents($filePath, $content) === false) {
    http_response_code(500);
    echo 'Failed to save template';
    exit;
}

echo "Template saved successfully";
