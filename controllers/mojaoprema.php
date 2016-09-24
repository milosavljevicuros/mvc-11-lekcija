<?php

class Mojaoprema extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('mojaoprema/js/default.js');
    }
    
    function index() 
    {    
        $this->view->title = 'Moja Oprema';
        $this->view->render('header');
        $this->view->render('mojaoprema/index');
        $this->view->render('footer');
    }
    
    function logout()
    {
        Session::destroy();
        header('location: ' . URL .  'login');
        exit;
    }
    
    function xhrUnesi()
    {
        $this->model->xhrUnesi();
    }
    
    function xhrPrikazi()
    {
        $this->model->xhrPrikazi();
    }
    
    function xhrObrisi()
    {
        $this->model->xhrObrisi();
    }

}