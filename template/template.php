
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
            <?php include("config.php");?>
            <title><?=$title?></title>
            <style>
                <?php include("system.css");?>
            </style>
            <style>
                <?php include("styles.css");?>
            </style>
    </head>
    <body>
        <?php include("slides.php");?>
        <a class="prev" href="javascript:prev()"></a>
        <a class="next" href="javascript:next()"></a>
        <script>
            <?php include("presentation.js");?>
        </script>
    </body>
</html>

