<?php $title = 'Forum No Man\'s Sky'; ?>

<?php ob_start();
 ?>
<section class="body">
    <div id="title">
        <h1>Forum No Man's Sky</h1>
    </div>
     <!--fil d'ariane-->
     <div class="row">
         <div class="col-lg-11">
        <div class="col-lg-3">
    <?='<ol class="breadcrumb ariane ">
    <li><a href ="./indexForum.php" class="breadcrumb-item">Index du forum ></a></li>
     <li><a href =" ./topicView.php?action=listPost&id=?"class="breadcrumb-item">Liste des sujets ></a></li>
     <li><a href ="./commentView.php?action=listComment&id=?" class="breadcrumb-item active">Commentaires</a></li>
     </ol>'?>
        </div>
</div>
    <div class="bodyC">
    <article class='container-fluid'>
        <?php 
        $currentPostName = '';
        while ($data = $comments->fetch()) { 
            if ($currentPostName !== htmlspecialchars($data['post_name'])) {
                $currentPostName = $data['post_name']; ?> 
            <div class="comment row">
                <div class="col-lg-2 member"> 
                    <?= htmlspecialchars($data['post_creator']) ?><br/>                                   
                    <a><em>inscrit depuis le</em></a>
                    <?= htmlspecialchars($data['member_date'])?>                 
                </div>

                <div class="col-lg-9">
                    <h3><?= htmlspecialchars($data['post_name'])?></h3>
                    <?= htmlspecialchars($data['post_content'])?><br/>
                    <em><?=htmlspecialchars($data['post_date'])?></em>
            
        <?php } ?>
                 </div>
                
            </div>
            
            <div class='row commentP'>                       
                <div class="col-lg-2 member">
                    
                    <?= htmlspecialchars($data['member_pseudo'])?><br/>
                    <a><em>inscrit depuis le</em></a>
                    <em><?=htmlspecialchars($data['member_date'])?></em> 
                </div>
               
                    
                <div class="col-lg-9 ">
                    <?= htmlspecialchars($data['comment_content']) ?><br/>
                    <em><?= htmlspecialchars($data['comment_date'])?></em><br/>
                <?php 
                if (isset($_SESSION['pseudo'])){?>    
               <button id="<?= $data['comment_id']?>" class="report" type="button" >report</button>
               <button id="<?= $data['comment_id']?>" class="delete" type="button" action="indexForum.php&action=delete&id=?" >delete</button>
               <button id="<?= $data['comment_id']?>" class="edit" type="button" >edit</button>   
                    <?php  }}?>
                </div> 
            </div>

        <?php $comments->closeCursor();?>
    </article>
</div>        
</section>
<?php 
 $content = ob_get_clean(); 
 require('views/template.php'); ?>