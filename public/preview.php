<?php

$slug = $_GET['slug'] ?? '';


$slug = basename($slug); 


$contentPath = __DIR__ . "/../resources/templates/{$slug}.php";


if (!file_exists($contentPath)) {
    http_response_code(404);
    echo "Page not found.";
    exit;
}


ob_start();
include($contentPath);
$pageBody = ob_get_clean();
?>

<?php include("../resources/commons/header.php"); ?>


<?= $pageBody ?>

<?php include("../resources/commons/footer.php"); ?>
