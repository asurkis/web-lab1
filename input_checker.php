<?php
$input_keys = ['x', 'y', 'r'];
$input_names = ['x' => 'X', 'y' => 'Y', 'r' => 'R'];
$regexes = ['x' => '-?[1-4]|0', 'y' => '(-?[1-5]|0)([.,]\d*)?', 'r' => '[2-5]([.,]\d*)?'];

$is_request_set = TRUE;
$is_request_valid = TRUE;
$is_key_set = [];
$is_value_valid = [];

$are_cookies_valid = !isset($_GET['reset']) && isset($_COOKIE['saved_results'])
    && preg_match("/^(${regexes['x']};${regexes['y']};${regexes['r']};[01]:)*$/", $_COOKIE['saved_results']);

foreach ($input_keys as $key) {
    $is_key_set[$key] = isset($_GET[$key]);
    $is_request_set &= $is_key_set[$key];
    $is_value_valid[$key] = $is_key_set[$key] && preg_match('/^(' . $regexes[$key] . ')$/', $_GET[$key]);
    $is_request_valid &= $is_value_valid[$key];
}
?>
