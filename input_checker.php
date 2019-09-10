<?php
$input_keys = ['x', 'y', 'r'];
$input_names = ['x' => 'X', 'y' => 'Y', 'r' => 'R'];
$regexes = ['x' => '-?[1-4]|0', 'y' => '-?[1-5]|0', 'r' => '[2-5]'];

$is_request_set = TRUE;
$is_request_correct = TRUE;
$is_key_set = [];
$is_value_correct = [];

foreach ($input_keys as $key) {
    $is_key_set[$key] = isset($_GET[$key]);
    $is_request_set &= $is_key_set[$key];
    $is_value_correct[$key] = $is_key_set[$key] && preg_match('/^(' . $regexes[$key] . ')$/', $_GET[$key]);
    $is_request_correct &= $is_value_correct[$key];
}
?>
