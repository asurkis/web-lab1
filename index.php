<!DOCTYPE html>
<html>
    <head>
        <link href="./style.css" rel="stylesheet">
        <script src="./style.css" type="text/css"></script>
        <script src="./validation.js" defer></script>
    </head>

    <body>
        <?php
        echo ("" . date('d.m.Y h:i:s', time()));
         ?>
        <form>
            <div>
                Введите x:
                <input type="text" name="x">
            </div>
            <div>
                Введите y:
                <input type="text" name="y">
            </div>
            <div>
                Введите радиус:
                <input type="text" name="r">
            </div>
            <div>
                <input type="submit">
            </div>
        </form>
    </body>
</html>
