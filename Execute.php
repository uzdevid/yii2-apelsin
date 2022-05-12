<?php

namespace uzdevid\apelsin;

class Execute extends Apelsin {
    public $url = 'https://topup.apelsin.uz/api/merchant';
    public $type = 'POST';
    public $content_type = 'application/json';

    public function queryWithParams($params) {
        if (is_array($params))
            $params_json = json_encode($params);

        $curl = curl_init();

        $headers[] = "Content-Type: {$this->content_type}";
        $headers[] = "Authorization: Basic {$this->_authkey}";

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->type,
            CURLOPT_POSTFIELDS => $params_json,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }
}