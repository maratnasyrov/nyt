<?php

class Connect {
    public static function getData($params) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $query = [
            "api-key" => "b8ccf1d4c00b42518b56e7a2abab8361",
            "q" => $params["q"],
            "sort" => $params["sort"],
            "page" => $params["page"]
        ];

        $beginDate = $params['begin_date'];
        $endDate = $params['end_date'];

        if (!empty($beginDate)) {
            $beginDate = Connect::changeDataStr($beginDate);
            $query = array_merge($query, ["begin_date" => $beginDate]);
        }
        if (!empty($endDate)) {
            $endDate = Connect::changeDataStr($endDate);
            $query = array_merge($query, ["end_date" => $endDate]);
        }

        curl_setopt($curl, CURLOPT_URL,
          "https://api.nytimes.com/svc/search/v2/articlesearch.json" . "?" . http_build_query($query)
        );
        $result = json_decode(curl_exec($curl), TRUE);

        return $result;
    }

    public static function changeDataStr($date) {
        $dateSegments_dot = explode(".", $date);

        $day = array_shift($dateSegments_dot);
        $month = array_shift($dateSegments_dot);
        $year = array_shift($dateSegments_dot);

        return "$year$month$day";
    }
}
