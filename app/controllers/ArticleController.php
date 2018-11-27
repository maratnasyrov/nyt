<?php

include_once ROOT.'/app/models/article.php';

class ArticleController {

    public function index() {
        $view = new View();

        $view->show_page('articles/index');
    }

    public function search() {
        $view = new View();

        $params = [
            "q" => $_POST['q'],
            "sort" => $_POST['sort'],
            "page" => $_POST['page'],
            "begin_date" => $_POST["begin_date"],
            "end_date" => $_POST["end_date"],
        ];

        $articles = Article::getArticles($params);

        return $view->render_page_part('articles/search', ["articles" => $articles, "query" => $_POST['q'], "index" => $_POST['page']]);
    }
}
