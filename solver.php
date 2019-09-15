<?php
if ($is_request_valid) {
    $x = (real) str_replace(',', '.', $_GET['x']);
    $y = (real) str_replace(',', '.', $_GET['y']);
    $r = (real) str_replace(',', '.', $_GET['r']);

    $result = TRUE;
    if ($x > 0) {
        if ($y > 0) {
            $result = FALSE;
        } else if ($y < 0) {
            $result = $x * $x + $y * $y <= $r * $r / 4;
        } else {
            $result = $x <= $r / 2;
        }
    } else if ($x < 0) {
        if ($y > 0) {
            $result = ($x >= -$r) && ($y <= $r);
        } else if ($y < 0) {
            $result = -$x - 2 * $y <= $r;
        } else {
            $result = $x >= -$r;
        }
    } else {
        $result = (-$r <= $y) && ($y <= $r);
    }

    ?>
    <p>
        <table>
            <tr>
                <td> Координата X: </td>
                <td class="out-number"> <?php echo $x; ?> </td>
            </tr>
            <tr>
                <td> Координата Y: </td>
                <td class="out-number"> <?php echo $y; ?> </td>
            </tr>
            <tr>
                <td> Радиус: </td>
                <td class="out-number"> <?php echo $r; ?> </td>
            </tr>
        </table>
    </p>

    <p>
        Результат: точка
        <?php
            echo '(', $x, '; ', $y, ') ';
            if (!$result) {
                echo '<strong>не</strong>';
            }
        ?>
        входит в заданную область
    </p>

    <?php
}
?>
