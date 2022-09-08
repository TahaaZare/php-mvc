<?php

namespace Application\Controllers;

use Application\Model\Article as ArticleModel;
use Application\Model\Category as CategoryModel;

class Article extends Controller
{

    public function index()
    {
        $article = new ArticleModel();
        $articles = $article->all();
        return $this->view('panel.article.index', compact('articles'));
    }

    public function create()
    {
        $category = new CategoryModel();
        $categories = $category->all();
        return $this->view('panel.article.create', compact('categories'));
    }

    public function store()
    {
        $article = new ArticleModel();
        $article->insert($_POST);
        return $this->redirect('panel.article.index');
    }

    public function edit($id)
    {
        $article = new ArticleModel();
        $new_article = $article->find($id);

        $category = new CategoryModel();
        $categories = $category->all();

        return $this->view('panel.article.edit', compact('new_article', 'categories'));
    }

    public function update($id)
    {
        $article = new ArticleModel();
        $article->update($id, $_POST);
        return $this->redirect('panel.article.index');
    }

    public function delete($id)
    {
        $article = new ArticleModel();
        $article->delete($id);
        return $this->redirect('panel.article.index');
    }
}
