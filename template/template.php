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
        <div id="nojs" class="message error">This is an interactive slideshow that only works with JavaScript. It doesn't send anything anywhere. Please enable Javascript to view this</div>
        <div id="introduction" class="message info">Change slides with the arrow keys or by tapping the left and right side of the screen</div>
        <?php include("../slides.php");?>
        <a class="prev" href="javascript:prev()"></a>
        <a class="next" href="javascript:next()"></a>
        <script>
            <?php include("presentation.js");?>
        </script>
    </body>
</html>

