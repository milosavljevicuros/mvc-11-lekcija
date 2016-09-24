<?php

class Mojtest extends Controller {

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {    
        $this->view->title = 'mojtestTitle';
        $this->view->render('header');
        $this->view->render('mojtest/index');
        $this->view->render('footer');
    }
    
    function ajsad()
    {
        //$nekivar = $this->model->blah();
        $this->view->render('header');
        if (Session::get('loggedIn') == true){
            $userid = Session::get('userid');
            $this->view->ulogovanUser = $this->model->koJeUlogovan($userid);
        }else{}
        
        $this->view->render('mojtest/testok');
        $this->view->render('footer');
        
    }   
    function sacuvaj()
    {   
        $this->view->render('header');
        //echo 'sacuvano';
        if (Session::get('loggedIn') == true){
            $userid = Session::get('userid');
            //dodeljivanje variable koje ce se koristiti u view!
            $this->view->sacuvanUser = $this->model->koJeUlogovan($userid);
        }
         $data = array(
            'pls' => "prc",
            'opet' => "prc-opet"
        );
        $this->view->render('mojtest/index');
        //header('location: ' . URL . 'mojtest/index/' . $nesto);
        $this->view->render('footer');
    }      
    
 }