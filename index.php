<?php
$ru_start = getrusage();
include 'input_checker.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="./style.css" rel="stylesheet">
        <script src="./style.css" type="text/css"></script>
        <script src="./validation.js" defer></script>
        <title>Лабораторная работа № 1</title>
    </head>

    <body>
        <div id="title">
            Студент: Суркис Антон Игоревич<br>
            Группа:  P3213<br>
            Вариант: 213019<br>
        </div>
        <img src="areas.png"><br>
        <form method="get">
            <div>
                Введите X:
                <select id="input-x" name="x" required>
                    <?php
                    for ($i = -4; $i <= 4; $i++) {
                        echo '<option value="', $i, '"';
                        if ($is_value_valid['x']) {
                            if ("$i" === $_GET['x']) {
                                echo ' selected';
                            }
                        } else if ($i === 0) {
                            echo ' selected';
                        }
                        echo '>', $i, '</option>';
                    } ?>
                </select>

                <span id="invalid-x" class="invalid-input" <?php
                    if ($is_key_set['x'] && !$is_value_valid['x']) {
                        echo 'style="visibility: visible"';
                    }
                ?>>
                    Выберите число из списка
                </span>
            </div>
            <div>
                Введите Y:
                <input id="input-y" type="text" name="y" value="<?php
                    echo $is_value_valid['y'] ? $_GET['y'] : '0';
                ?>" required>

                <span id="invalid-y" class="invalid-input" <?php
                    if ($is_key_set['y'] && !$is_value_valid['y']) {
                        echo 'style="visibility: visible"';
                    }
                ?>>
                    Введите число от -5 до 5
                </span>
            </div>
            <div>
                Введите R:
                <input id="input-r" type="text" name="r" value="<?php
                    echo $is_value_valid['r'] ? $_GET['r'] : '3';
                ?>" required>

                <span id="invalid-r" class="invalid-input" <?php
                    if ($is_key_set['r'] && !$is_value_valid['r']) {
                        echo 'style="visibility: visible"';
                    }
                ?>>
                    Введите число от 2 до 5
                </span>
            </div>
            <div>
                <input type="submit" value="Проверить">
            </div>
        </form>

        <div id="css-demo">

        </div>

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
