<?php

const ROOT = __DIR__;
require ROOT . "/functions/require.php";

$input = file_get_contents("php://input");

$input_data = json_decode($input, true);
logs($input_data);
file_put_contents(ROOT . "/log/" . date("Ymd_His") . "_blank_input.json", json_encode($input_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));















