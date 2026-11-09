<?php
require_once __DIR__ . '/../vendor/autoload.php';
error_reporting(\E_ALL ^ \E_DEPRECATED);
function img($path) {
    return data($path, 'image');
}
function video($path) {
    $type = pathinfo($path, \PATHINFO_EXTENSION);

    return '<div class="video-container"><video controls><source type="video/' . $type . '" src="' . data($path, 'video') . '"></video></div>';
}
function data($path, $mimetype) {
    $type = pathinfo($path, \PATHINFO_EXTENSION);
    $data = file_get_contents('../' . $path);
    $base64 = 'data:' . $mimetype . '/' . $type . ';base64,' . base64_encode($data);

    return $base64;
}
function md($markdown) {
    $Parsedown = new ParsedownExtra();
    ob_start();
    eval('?>' . $markdown);
    $parsedOutput = ob_get_clean(); // Get the contents of the output buffer

    return $Parsedown->text($parsedOutput);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
            <?php if (!getenv('BPT_BUILDING')) {?>
            <!--We're not running in Makefile generation mode-->
            <base href="../">
            <?php }?>
            <?php include '../config.php'; ?>
            <title><?= $title; ?></title>
            <style>
                <?php include 'system.css'; ?>
                <?php include '../styles.css'; ?>
            </style>
    </head>
    <body>
        <div class="browser-presentation-tool no-js">
            <div id="introduction" class="message info">Change slides with the arrow keys or by tapping the left and right side of the screen. Press F to enter full screen</div>
            <div id="nojs-warning" class="message error">You're running this slide without JavaScript. Certain thing like animations and page numbers will not work. Change to the next slide by scrolling.</div>
            <?php include '../slides.php'; ?>
            <a class="prev" href="javascript:prev()">previous slide</a>
            <a class="next" href="javascript:next()">next slide</a>
<script>
<?php include 'presentation.js'; ?>
</script>
        </div>
    </body>
</html>

