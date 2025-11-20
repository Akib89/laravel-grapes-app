<?php
// public/save.php

// 1. Allowed slugs (same as in your builder)
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

// 2. Read JSON body
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data || !isset($data['slug'], $data['html'], $data['css'])) {
    http_response_code(400);
    echo 'Invalid payload';
    exit;
}

$slug = $data['slug'];
$html = $data['html'];
$css  = $data['css'];

// 3. Validate slug
if (!in_array($slug, $allowedSlugs, true)) {
    http_response_code(400);
    echo 'Invalid slug';
    exit;
}

// 4. Decide where to save
// We'll save into resources/templates/{slug}.html
// so your BuilderController (or loader) can read it next time.
$basePath = __DIR__ . '/../resources/templates';

if (!is_dir($basePath)) {
    if (!mkdir($basePath, 0775, true) && !is_dir($basePath)) {
        http_response_code(500);
        echo 'Failed to create templates directory';
        exit;
    }
}

$filePath = $basePath . '/' . $slug . '.html';

// 5. Build file content: CSS inline + HTML
$content = "<style>\n{$css}\n</style>\n{$html}\n";

// 6. Save file
if (file_put_contents($filePath, $content) === false) {
    http_response_code(500);
    echo 'Failed to save template';
    exit;
}

echo 'Template saved successfully';
