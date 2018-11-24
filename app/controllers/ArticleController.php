<?php

include_once ROOT.'/app/models/article.php';

class ArticleController {

    public function search() {
        $params = [
            "q" => "russia",
            // "fq" => "",
            "begin_date" => "20181101",
            "end_date" => "20181122",
            "sort" => "newest"
            // "fl" => "",
            // "hl" => "",
            // "page" => "",
            // "facet_field" => "",
            // "facet_filter" => ""
        ];

        $articles = Article::getArticles($params);

        new View('articles/index', ["articles" => $articles]);
    }

    public function index() {

    }

    public function show() {
        new View('articles/show', []);
    }
}
