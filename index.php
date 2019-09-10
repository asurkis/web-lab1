<?php
$ru_start = getrusage();
include 'input_checker.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="./style.css" rel="stylesheet">
        <script src="./style.css" type="text/css"></script>
        <script src="./validation.js" defer></script>
    </head>

    <body>
        <img src="areas.png"><br>
        <form method="get">
            <div>
                Введите x:
                <select name="x" required>
                    <?php
                    for ($i = -4; $i <= 4; $i++) {
                        echo '<option value="', $i, '"';
                        if ($is_value_correct['x']) {
                            if ("$i" === $_GET['x']) {
                                echo ' selected';
                            }
                        } else if ($i === 0) {
                            echo ' selected';
                        }
                        echo '>', $i, '</option>';
                    } ?>
                </select>

                <?php
                if ($is_key_set['x'] && !$is_value_correct['x']) {
                    ?>
                    <span class="incorrect-input"> Введите корректное значение </span>
                    <?php
                }
                ?>
            </div>
            <div>
                Введите y:
                <input type="number" name="y" min="-5" max="5" value="<?php
                    echo $is_value_correct['y'] ? $_GET['y'] : '0';
                ?>" required>

                <?php
                if ($is_key_set['y'] && !$is_value_correct['y']) {
                    ?>
                    <span class="incorrect-input"> Введите корректное значение </span>
                    <?php
                }
                ?>
            </div>
            <div>
                Введите R:
                <input type="number" name="r" min="2" max="5" value="<?php
                    echo $is_value_correct['r'] ? $_GET['r'] : '3';
                ?>" required>

                <?php
                if ($is_key_set['r'] && !$is_value_correct['r']) {
                    ?>
                    <span class="incorrect-input"> Введите корректное значение </span>
                    <?php
                }
                ?>
            </div>
            <div>
                <input type="submit" value="Проверить">
            </div>
        </form>

        <?php
        include 'solver.php';

        function get_microseconds($ru, $index) {
            return $ru["ru_$index.tv_sec"] * 1000000 + $ru["ru_$index.tv_usec"];
        }

        function resources_time($rustart, $ruend, $index) {
            return get_microseconds($ruend, $index) - get_microseconds($rustart, $index);
        }

        $ru_end = getrusage();
        include 'stats.php';
        ?>
    </body>
</html>
