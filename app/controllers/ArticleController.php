<?php

include_once ROOT.'/app/models/article.php';

class ArticleController {

    public function search() {
        $articles = Article::getArticles();

        echo "<pre>";
        print_r($articles);
        echo "</pre>";
    }
}
