<?php $title = "Forum No Man's Sky"; ?>

<?php ob_start(); 
?>
<div class="body">
    <div id="title">
        <h1>Forum No Man's Sky</h1>
    </div>

   
    <h3>Rejoingnez la Communauté Francophone</h3>
    
<div class="row" id="souscrire">
    <button data-toggle="modal" data-backdrop="false" href="#infos" class="col-lg-2 btn btn-lg souscrire" data-target="#modalInfos">Souscrire</button>  
    <div class="modal" id="modalInfos">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Connectez-vous pour participer au forum</h4>
                </div>
            <div class="modal-body">
                <h2>Crée un compte</h2>
                <div class="contForm">
                    <form id="RegisterUserForm" action="./indexForum.php?action=addMember" method="post">
                        <fieldset>
                            <label for="name">Pseudo</label> 
                            <input class="text" id="name" type="text" name="pseudo" value="" /><br/>
                            <label for="email">E-mail</label> 
                            <input class="text" id="email" type="email" name="email" value="" /><br/>
                            <label for="emailVerif">Verification E-mail</label> 
                            <input class="text" id="emailVerif" type="email" name="emailVerif" value="" /><br/>
                            <label for="password">Mot de passe</label>
                            <input class="text" id="password" type="password" name="password" /><br/>
                            <label for="passwordVerif">Verification mot de passe</label>                 
                            <input class="text" id="passwordVerif" type="password" name="passwordVerif" /> <br/>                 
                            <input type="checkbox" name="check">
                            <label for="acceptTerms" id="term"> I agree to the <a href="">Terms and Conditions</a> and <a href="">Privacy Policy</a> </label>
                            <button id="registerNew" type="submit" for="switch" class="button">S'enregister</button>
                        </fieldset>
                    </form>
                </div>
            </div>            
            <div class="modal-footer">
            <button class="btn btn-info" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="col-lg-2">
    <?='<ol class="breadcrumb ariane ">
    <li><a href ="./indexForum.php" class="breadcrumb-item active">Index du forum ></a></li>
    
     
     </ol>'?>
        </div>
     </div> 
        </div>
<article class="Tforum row">
    <div>
    <img src="public/images/willog2.png"/>
    </div>
    <a href="indexForum.php?action=listPost&id=1>"><h2>STATION</h2></a><br />
<?php

while ($data = $forums->fetch()) {

 ?>
<div class="container-fluid">
    <div class="post">
        <div class="TPost col-lg-6">
        <a href="indexForum.php?action=listPost&id=<?= $data['topic_id'] ?>">
            <?= htmlspecialchars($data['topic_name']) ?></a><br />
        <em>
            <?= htmlspecialchars($data['topic_desc']) ?></em>
        </div>
        <div class="sujets col-lg-2">
            <?=$forumManager->countPost($data['topic_id'])?><br/>
            sujets
        </div>
        <div class="reponses col-lg-2">
        <?= $forumManager->countComment($data['topic_id'])?><br/>
            reponses
        </div> 
        <div class="lastPost">
        <a class="col-lg-2">Dernier post :</a><br/>
        <a>
        <?= $forumManager->lastPost($data['topic_id'])['post_creator']?><br/>
        <em><?= $forumManager->lastPost($data['topic_id'])['post_name'] ?><br/>        
        <?= $forumManager->lastPost($data['topic_id'])['post_date'] ?><br/></em>
        </a>
        
        
        
        </div>      
    </div>
</div>
<?php }

$forums->closeCursor(); ?>
       
</article>

<article class="Tforum row">
    <div>
    <img src="public/images/willog2.png"/>
    </div>
    <a href="indexForum.php?action=listPost&id=3"><h2>NO MAN'S SKY</h2></a><br />
    <?php
while ($data = $forums2->fetch()) {
 ?>
<div class="container-fluid">
    <div class="post">
        <div class="TPost col-lg-6">
        <a href="indexForum.php?action=listPost&id=<?= $data['topic_id'] ?>">
            <?= htmlspecialchars($data['topic_name']) ?></a><br />
        <em>
            <?= htmlspecialchars($data['topic_desc']) ?></em>
        </div>
        <div class="sujets col-lg-2">
            <?=$forumManager->countPost($data['topic_id'])?><br/>
            sujets
        </div>
        <div class="reponses col-lg-2">
        <?= $forumManager->countComment($data['topic_id'])?><br/>
            reponses
        </div> 
        <div class="lastPost">
        <a class="col-lg-2">Dernier post :</a><br/>
        <a>
        <?= $forumManager->lastPost($data['topic_id'])['post_creator']?><br/>
        <em><?= $forumManager->lastPost($data['topic_id'])['post_name'] ?><br/>        
        <?= $forumManager->lastPost($data['topic_id'])['post_date'] ?><br/></em>
        </a>
        
        
        
        </div>      
    </div>
</div>
<?php }

$forums2->closeCursor();?>
</article>

<article class="Tforum row">
    <div>
    <img src="public/images/willog2.png"/>
    </div>
    <a href="indexForum.php?action=listPost&id=4"><h2>NO MAN'S SKY : Communauté</h2></a><br />
    <?php
while ($data = $forums3->fetch()) {
 ?>
<div class="container-fluid">
    <div class="post ">
        <div class="TPost col-lg-6">
        <a href="indexForum.php?action=listPost&id=<?= $data['topic_id'] ?>">
            <?= htmlspecialchars($data['topic_name']) ?></a><br />
        <em>
            <?= htmlspecialchars($data['topic_desc']) ?></em>
        </div>
        <div class="sujets col-lg-2">
            <?=$forumManager->countPost($data['topic_id'])?><br/>
            sujets
        </div>
        <div class="reponses col-lg-2">
        <?= $forumManager->countComment($data['topic_id'])?><br/>
            reponses
        </div> 
        <div class="lastPost">
        <a class="col-lg-2">Dernier post :</a><br/>
        <a>
        <?= $forumManager->lastPost($data['topic_id'])['post_creator']?><br/>
        <em><?= $forumManager->lastPost($data['topic_id'])['post_name'] ?><br/>        
        <?= $forumManager->lastPost($data['topic_id'])['post_date'] ?><br/></em>
        </a>
        
        
        
        </div>      
    </div>
</div>
<?php }

$forums3->closeCursor();?>>
    
</article>

<article class="Tforum row">
    <div>
    <img src="public/images/willog2.png"/>
    </div>
    <a href="indexForum.php?action=listPost&id=5"><h2>AUTRES</h2></a><br />
    <?php
while ($data = $forums4->fetch()) {
 ?>
<div class="container-fluid">
    <div class="post ">
        <div class="TPost col-lg-6">
        <a href="indexForum.php?action=listPost&id=<?= $data['topic_id'] ?>">
            <?= htmlspecialchars($data['topic_name']) ?></a><br />
        <em>
            <?= htmlspecialchars($data['topic_desc']) ?></em>
        </div>
        <div class="sujets col-lg-2">
            <?=$forumManager->countPost($data['topic_id'])?><br/>
            sujets
        </div>
        <div class="reponses col-lg-2">
        <?= $forumManager->countComment($data['topic_id'])?><br/>
            reponses
        </div> 
        <div class="lastPost">
        <a class="col-lg-2">Dernier post :</a><br/>
        <a>
        <?= $forumManager->lastPost($data['topic_id'])['post_creator']?><br/>
        <em><?= $forumManager->lastPost($data['topic_id'])['post_name'] ?><br/>        
        <?= $forumManager->lastPost($data['topic_id'])['post_date'] ?><br/></em>
        </a>
        
        
        
        </div>      
    </div>
</div>
<?php }

$forums4->closeCursor();?>
   
</article>

<article>


</article>
</div>
<?php $content = ob_get_clean();
require('views/template.php'); ?> 