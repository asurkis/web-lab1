<?php
$cookie_table = '';
if ($are_cookies_valid) {
    $cookie_table = $_COOKIE['saved_results'];
}

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

    $cookie_table = $cookie_table . "$x;$y;$r;" . ($result ? '1' : '0') . ":";
    setcookie('saved_results', $cookie_table, time() + 24 * 30 * 60 * 60);
} ?>
