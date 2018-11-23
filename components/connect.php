<?php

class Connect {
    public static function getData() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $query = array(
          "api-key" => "b8ccf1d4c00b42518b56e7a2abab8361",
          "q" => "russia",
          // "fq" => "",
          "begin_date" => "20181101",
          "end_date" => "20181123"
          // "sort" => "",
          // "fl" => "",
          // "hl" => "",
          // "page" => "",
          // "facet_field" => "",
          // "facet_filter" => ""
        );

        curl_setopt($curl, CURLOPT_URL,
          "https://api.nytimes.com/svc/search/v2/articlesearch.json" . "?" . http_build_query($query)
        );
        $result = json_decode(curl_exec($curl));

        return json_decode(json_encode($result),TRUE);
    }
}
