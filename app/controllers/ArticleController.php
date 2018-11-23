<?php

include_once ROOT.'/app/models/article.php';

class ArticleController {

    public function search() {
        $articles = Article::getArticles();

        print_r($articles);
    }
}
