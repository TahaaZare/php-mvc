<?php

namespace Application\Controllers;

class Home extends Controller{

    public function index(){
        $product = 'Phone';
       $this->view("app.index",compact('product'));
    }

    public function create(){
        $this->redirect('Home');
    }


}
