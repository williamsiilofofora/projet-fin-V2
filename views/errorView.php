<?php $title = 'Forum No Man\'s Sky'; ?>

<?php ob_start(); ?>
<h1>Forum No Man's Sky</h1>
<p id="erreur">Erreurs</p>

<p id="msgErreur"><?php echo $errorMessage;?></p>
<p id="bip">Vous etes le maillon faible AUREVOIR!</p>


<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>