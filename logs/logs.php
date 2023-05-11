<?php
//
////// логи
//
function logs($request)
{
    if (file_exists(ROOT . "/logs.json")) {
        $log = file_get_contents(ROOT . "/logs.json");
        $log = json_decode($log, true);
    } else {
        $log = [];
    }

    $t = explode(" ",microtime());
    $log[date("Y-m-d H:i:s", $t[1]).substr((string)$t[0],1,4)] = $request;
    $log = json_encode($log, JSON_UNESCAPED_UNICODE);
    file_put_contents(ROOT . "/logs.json", $log);
}


