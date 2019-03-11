<?php

namespace forum\controllers;

use forum\models\ForumManager;
use forum\models\MemberManager;

class Controller {
    private $forumManager;
    private $memberManager;

    public function __construct() {
        $this->forumManager = new ForumManager(); 
        $this->memberManager=new MemberManager();      
    }
    public function listForum() {
        $forumManager = $this->forumManager;
        $forums = $this->forumManager->getForumStation(); // Appel d'une fonction de cet objet                    
        $forums2 = $this->forumManager->getForumNoManSSky();
        $forums3 = $this->forumManager->getForumNoManSSkyCom(); 
        $forums4 = $this->forumManager->getForumAutres();
                 
        require('views/forumView.php');
    }
   
    public function listPost($id) {
        $posts = $this->forumManager->getPosts($id);
        $TForums = $this->forumManager->tForum($id);        
        require('views/topicView.php');
    }
    
    public function listComment($id){
        $comments = $this->forumManager->getComment($id);
        require('views/commentView.php');
    }
    public function addMember(){
        $this->memberManager->addMember();
       header('Location: indexForum.php');
    }
   public function isConnected ($pseudo,$password)
   {
       $connex =$this->memberManager->connected($pseudo,$password);
       header('Location: indexForum.php');
   
       

       
   }
   public function delete($id){
    $delete= $this->commentManager->deleteComment($id);
    header('Location: indexForum.php?action=post&id=' . $id);
}







   public function incrementAlert($arr) {
    $returnedValue = 'ok';
    try {
        // Control given data
        if (! isset($arr['id'])) {
            throw new Exception("Numéro de commentaire obligatoire");
        }
        $id = intval($arr['id']);
        if (! $id > 0) {
            throw new Exception("Numéro de commentaire inconnu");
        }
        // Update comment
        $successC = $this->commentManager->incrementAlertComment($id);
        $successP = $this->commentManager->incrementAlertPost($id);
        if ((!$successC) || (!$successP)) {
            $returnedValue = 'ko : sql error or no raw updated';
        }
    }
    catch (Exception $e) {
        $returnedValue = 'ko : '. $e->getMessage();
    }
    // Return $returnedValue in json format
    require('views/alertView.php');
}

}