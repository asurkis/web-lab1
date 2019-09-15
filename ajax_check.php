<?php
include 'input_checker.php';
foreach ($input_keys as $key) {
    if ($is_key_set[$key] && !$is_value_valid[$key]) {
        echo $key;
    }
}
?>
