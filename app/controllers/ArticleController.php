<?php

include_once ROOT.'/app/models/article.php';

class ArticleController {

    public function index() {
        $view = new View();

        $view->show_page('articles/index', []);
    }

    public function search() {
        $view = new View();

        $params = [
            "q" => $_POST['q'],
            // "fq" => "",
            // "begin_date" => "20181101",
            // "end_date" => "20181122",
            "sort" => $_POST['sort'],
            "page" => $_POST['page']
            // "facet_field" => "",
            // "facet_filter" => ""
        ];

        $articles = Article::getArticles($params);

        return $view->render_page_part('articles/search', ["articles" => $articles, "query" => $_POST['q']]);
    }

    public function show() {
        $view = new View();

        $view->show_page('articles/show', []);
    }
}
