<?php

class Article {
    // Выводим массив articles с результатом поиска
    public static function getArticles($params) {
        $searchResult = Connect::getData($params);

        $articles = [];

        $docsArray = $searchResult['response']['docs'];

        for ($i=0; $i < count($docsArray); $i++) {
            $articles[$i]['snippet'] = $docsArray[$i]['snippet'];
            $articles[$i]['webUrl'] = $docsArray[$i]['web_url'];
            $articles[$i]['main'] = $docsArray[$i]['headline']['main'];
            (array_key_exists('section_name', $docsArray[$i])) ? $articles[$i]['sectionName'] = $docsArray[$i]['section_name'] : "";
            $articles[$i]['imageUrl'] = Article::getImage($docsArray[$i]['multimedia']);
            $articles[$i]['pubDate'] = $docsArray[$i]['pub_date'];
        }

        return $articles;
    }

    // Ищем изображение с наибольшей высотой, если оно есть, либо ничего не возвращаем, если нет
    // Возвращаем ссылку на изображение
    private static function getImage($imageArray) {
        $weightmax = 0;
        $imageUrl = "";

        for ($i=0; $i < count($imageArray)-1; $i++) {
            $weightmax = (int) $imageArray[$i]['width'];
            $imageUrl = $imageArray[$i]['url'];

            if ($weightmax < (int) $imageArray[$i++]['width']) {
                $weightmax = (int) $imageArray[$i++]['width'];
                $imageUrl = $imageArray[$i++]['url'];
            } else {
                $i++;
            }
        }

        return "http://static01.nyt.com/".$imageUrl;
    }
}
