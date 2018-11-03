<?php
function img($path){
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents("../".$path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
            <?php if(!getenv("BPT_BUILDING")){?>
            <!--We're not running in Makefile generation mode-->
            <base href="../">
            <?php }?>
            <?php include("../config.php");?>
            <title><?=$title?></title>
            <style>
                <?php include("system.css");?>
                <?php include("../styles.css");?>
            </style>
    </head>
    <body>
        <div class="browser-presentation-tool no-js">
            <div id="introduction" class="message info">Change slides with the arrow keys or by tapping the left and right side of the screen. Press F to enter full screen</div>
            <div id="nojs-warning" class="message error">You're running this slide without JavaScript. Certain thing like animations and page numbers will not work. Change to the next slide by scrolling.</div>
            <?php include("../slides.php");?>
            <a class="prev" href="javascript:prev()"></a>
            <a class="next" href="javascript:next()"></a>
<script>
<?php include("presentation.js");?>
</script>
        </div>
    </body>
</html>

