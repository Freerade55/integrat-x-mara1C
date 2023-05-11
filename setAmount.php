<?php

const ROOT = __DIR__;
require ROOT . "/functions/require.php";

$hooksFolder = scandir(ROOT."/log");

$hooksSortedFolder = [];

foreach ($hooksFolder as $value) {

    if(substr_count($value, ".json")) {

        $hooksSortedFolder[] = $value;

    }

}

$hooksArrayNames = [];

switch (true) {

    case count($hooksSortedFolder) === 0:
        die;

    case count($hooksSortedFolder) <= 10:


        foreach ($hooksSortedFolder as $value) {

            if(substr_count($value, ".json")) {
                $hooksArrayNames[] = $value;

            }
        }

        break;

    case count($hooksSortedFolder) > 10:

        for($i = 0; $i < 10; $i++) {

            if(substr_count($hooksSortedFolder[$i], ".json")) {
                $hooksArrayNames[] = $hooksSortedFolder[$i];

            }

        }


}



foreach ($hooksArrayNames as $value) {


    $data = file_get_contents(ROOT . "/log/$value");
    $data = json_decode($data, true);

    foreach ($data["Deals"] as $data) {



        if(!empty($data["DealNumber"]) && !empty($data["Amount"])) {




            $leadId = $data["DealNumber"];
            $field = $data["Amount"];

            $getLeadRes = getLead($data["DealNumber"]);

            if(!empty($getLeadRes)) {

                entityChanges($leadId, $field);
            }


        }



    }


}




foreach ($hooksArrayNames as $value) {

    unlink(ROOT."/log/$value");



}





