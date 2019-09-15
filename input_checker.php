<?php
$input_keys = ['x', 'y', 'r'];
$input_names = ['x' => 'X', 'y' => 'Y', 'r' => 'R'];
$regexes = ['x' => '-?[1-4]|0', 'y' => '-?[1-5]([.,]\d*)?|0', 'r' => '[2-5]([.,]\d*)?'];

$is_request_set = TRUE;
$is_request_valid = TRUE;
$is_key_set = [];
$is_value_valid = [];

foreach ($input_keys as $key) {
    $is_key_set[$key] = isset($_GET[$key]);
    $is_request_set &= $is_key_set[$key];
    $is_value_valid[$key] = $is_key_set[$key] && preg_match('/^(' . $regexes[$key] . ')$/', $_GET[$key]);
    $is_request_valid &= $is_value_valid[$key];
}
?>
