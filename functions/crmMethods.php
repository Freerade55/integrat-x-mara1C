<?php


function getLead($id): array
{
    $link = "https://{$_ENV["SUBDOMAIN"]}.amocrm.ru/api/v4/leads/$id";



    $result = json_decode(connect($link), true);

    if (empty($result)) {
        return [];
    } else {
        return $result;
    }


}





function entityChanges(int $leadId, string $field) {

    $link = "https://{$_ENV["SUBDOMAIN"]}.amocrm.ru/api/v4/leads";


    $customF = [
        [
            "id" => $leadId,
            "custom_fields_values" => [
                [
                    "field_id" => 894812,
                    "values" => [
                        ["value" => $field


                        ]
                    ]
                ]
            ]
        ]
    ];

    $result = json_decode(connect($link, METHOD_PATCH, $customF), true);

    if (empty($result)) {
        return [];
    } else {
        return $result;
    }
}





