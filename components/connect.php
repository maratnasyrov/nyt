<?php

class Connect {
    public static function getData($params) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $query = array(
          "api-key" => "b8ccf1d4c00b42518b56e7a2abab8361",
          "q" => $params["q"],
          // "fq" => $params["fq"],
          // "begin_date" => $params["begin_date"],
          // "end_date" => $params["end_date"],
          "sort" => $params["sort"],
          "page" => $params["page"]
          // "facet_field" => $params["facet_field"],
          // "facet_filter" => $params["facet_filter"]
        );

        curl_setopt($curl, CURLOPT_URL,
          "https://api.nytimes.com/svc/search/v2/articlesearch.json" . "?" . http_build_query($query)
        );
        $result = json_decode(curl_exec($curl), TRUE);

        return $result;
    }
}
