<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $title ?></title>
        
        <!--<link rel="stylesheet" type="text/css" href="space.css" />-->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <link href="public/css/style.css" rel="stylesheet" />
    </head>
        
    <body>
        <div id="bandeau" class="container-fluid " >
            <div class="row">
                <div id="logo" class="col-lg-4">
                    <img src="public/images/logo.png"/>
                </div>
                <nav  class="navbar justify-content-end col-lg-7">
                    <a class="nav-link active nav-item" href="index.php">Accueil</a>
                    <a class="nav-link " href="indexForum.php">Forum</a>
                    <a class="nav-link " href="https://galacticatlas.nomanssky.com/">Galactic Atlas</a>
                    <a class="nav-link " href="#!">Actualité</a>
                    <a class="nav-link " href="media.php">Media</a>   
                </nav>
                <div class="logoAccount" class="col-lg-1">
                <button type="button" id="login" class="rounded-circle navbar-brand " data-toggle="modal" data-target="#myModal">                                  
                        <img src="public/images/logoAccount.jpg" alt="account" class="rounded-circle"/></button> 
                </div>
                <div data-backdrop='false'class="modal" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Connection</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="loginForm" action="indexForum.php?action=connected" method="post">
        <fieldset>
            <label for="name">Pseudo</label> 
            <input class="text" id="pseudoL" type="text" name="pseudoL" value="" /><br/>
        <label for="password">Mot de passe</label>
        <input class="text" id="passwordL" type="password" name="passwordL" /><br/>
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Connection</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">fermer</button>
        </div>
</form>
      </div>
    </div>
  </div>
     <?php 
  
  if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
  {?>
  
  
        <div style="color:white">bonjour  <?=$_SESSION["pseudo"] ?></div>';
      <?php  echo '<a href="views/disconnect.php"><button id="connexionDie" type="submit" for="switch" class="button">deconnection</button></a>';
        
    }else{
        
        echo "<div style='color:white'>vous n'etes pas connecté </div>";
     
    }?>
          
                
            </div>  
        </div>
            <?= $content ?>
    </body>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>    
    <script type="text/javascript" src=".\public\js\script.js"></script>   
    

</html>