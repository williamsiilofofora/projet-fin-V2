<?php $title = "Forum No Man's Sky"; ?>

<?php ob_start();
 ?>
<div class="body">
<div id="title">
    <h1>Forum No Man's Sky</h1>
</div>
<!--fil d'ariane-->
<div class="row">
        <div class="col-lg-2">
    <?='<ol class="breadcrumb ariane ">
    <li><a href ="./indexForum.php" class="breadcrumb-item">Index du forum ></a></li>
     <li><a href =" ./topicView.php?action=listPost&id=?"class="breadcrumb-item active">Liste des sujets ></a></li>
     
     </ol>'?>
        </div>
<article class="Tforum">
<?php $currentPostName = '';
while ($data = $TForums->fetch()) {
    
    if ($currentPostName !== htmlspecialchars($data['cat_name'])) {
        $currentPostName = $data['cat_name']; ?>



<a href="indexForum.php"><h2> <?= htmlspecialchars($data['cat_name'])?></h2></a>
<?php
    }}

$TForums->closeCursor();
$currentPostName = '';
while ($data = $posts->fetch()) {
    
    if ($currentPostName !== htmlspecialchars($data['topic_name'])) {
        $currentPostName = $data['topic_name']; ?>
<ul>
    <li>
        <a href="indexForum.php?action=listPost&id=<?= $data['topic_id'] ?>">
            <?= htmlspecialchars($data['topic_name']) ?></a>
        <em>
            <?= htmlspecialchars($data['topic_desc']) ?></em>
    </li>
</ul>    
        <?php }?>
            <div class="post container-fluid col-lg-10">
            <a href="indexForum.php?action=listComment&id=<?= $data['post_id']?>"><?=  htmlspecialchars($data['post_name']) ?></a><br/>
            <p><?=  htmlspecialchars($data['post_date']) ?></p>           
            </div>
          


  
<?php }
$posts->closeCursor();?>

</article>
</div>
<?php 
 $content = ob_get_clean(); 
 require('views/template.php'); ?>   