<?php

namespace forum\controllers;

use forum\controllers\Controller;

class App{
    
    private $controller;
    public function __construct(){
        $this->controller = new Controller();
    }
    public function run(){
        try{
            if (!isset($_GET['action'])){
                
                $this->controller->listForum();
               
            }
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listForum') {
                    $this->controller->listForum();
                }
                elseif ($_GET['action'] == 'listPost'){
                    $this->controller->listpost($_GET['id']);
                   
                }
                elseif ($_GET['action'] =='listComment' ){
                    $this->controller->listComment($_GET['id']);
                }
                
                elseif($_GET['action'] == 'addMember'){

                    $this->controller->addMember();
                }            
                elseif($_GET['action']=='connected'){
                
                    $this->controller->isConnected($_POST['pseudoL'],$_POST['passwordL']);
                }
                elseif($_GET['action']=='delete'){
                    $this->controller-> deleteComment($_GET['id']);     
                }
                elseif
                    ($_GET['action'] == 'incrementAlert'){
                        $this->controller-> incrementAlert($_GET['id']);
                    
                } 
           
            }
        }
        catch(Exception $e) { // S'il y a eu une erreur, alors...
                $errorMessage = $e->getMessage();
                require('views/errorView.php');
        }
    }
}