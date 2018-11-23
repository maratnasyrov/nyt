<?php

class Article {
    public static function getArticles() {
        $searchResult = Connect::getData();

        print_r($searchResult);
    }
}
