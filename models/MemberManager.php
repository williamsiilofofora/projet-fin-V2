<?php

namespace forum\models;
use forum\models\connect;
class MemberManager extends connect{
  public function addMember(){ 
         // Hachage du mot de passe
        
     $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
     $db = $this->dbConnect();
     $rq = $db->prepare('INSERT INTO member(id_level,member_password,member_pseudo,member_email) VALUES(?,?,?,?)');
     $rq->execute(array( 3,$pass_hache,$_POST['pseudo'],$_POST['email'] ));
        
        
     
        echo 'merci pour votre inscription !';
        return $rq;

        }
    
        public function connected($pseudo,$password)
        { 
        $db = $this->dbConnect();   
        //  Récupération de l'utilisateur et de son pass hashé
        $req = $db->prepare('SELECT member_id,member_pseudo, member_password ,id_level FROM member WHERE member_pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo));
        $resultat = $req->fetch();
       
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = (password_verify($password, $resultat['member_password'])) || $password == $resultat['member_password'];
        
        
        if (!$resultat)
        {
            throw new Exception( 'Mauvais identifiant ou mot de passe !');
        }
        else
        {
            if ($isPasswordCorrect) { 
                          
                $_SESSION['id'] = $resultat['member_id'];
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['level'] =$resultat['id_level'];
                echo 'Vous êtes connecté !';
            }
            else {
                echo 'mauvais indentifiant ';
            }
        }
      
      }
      
      
      }

?>
