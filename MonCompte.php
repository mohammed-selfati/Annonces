<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="NstyleAccueil.css"/>
    <title>Voir votre compte </title>
  
  </head>
  <body id="connection-page">
      <?php
      include_once("Tannonceur.php");
       include_once ("Tannonces.php");
      session_start();
        $email=$_SESSION['sessionemail'];
        $pass=$_SESSION['sessionpass'];

        $cur=Tannonces::information($email,$pass);

        while($row=$cur->fetch()){
           $id_annonceur=$row[0];
           $name=$row[1];
           $lastname=$row[2];
           $tel=$row[5];
           $ville=$row[10];
           $gendre=$row[11];
           $adresse=$row[14];
           $type=$row[4];
           $nom_society=$row[12];
           $description_society=$row[13];
          
        }

      ?>
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <div class="container">
       <div class="row" style="display: flex; align-items:center;">
           <div class="col-6 text-left">
               <h1 class="display-4"><a class="navbar-brand pt-0 pb-0 text-info mr-5" href="#"><img src="images/icones/logo.png" width="40px" height=></a></h1>
           </div>
           <div class="col-6 text-right">
           <form action="" method='POST'>
                <input type="submit" onclick="window.location.href='accueil.html'" id="deconnection-button" name="deconnecter" value="Connectez-Out" class="btn ">
            </form>
            
            <?php
              if(isset($_POST['deconnecter'])){
                session_destroy() ;

                ?>
                <script>
                 window.location.assign("AccueilV.php");
                </script>
             <?php
              }
              ?>


            </div>
       </div>

       <div class="row mt-5">
           <div class="col-lg-5">
                <img src="images/profil/man.png" class="rounded-circle">
           </div>

           <div class="col-lg-7">
           <form action="" method="POST">
                <div class="row">
                        <div class="col-lg-6">
                            <label for="">Nom:</label>
                            <input type="text" name="user-name" value="<?php echo htmlspecialchars($name);?>" class="form-control" placeholder="Entrer votre nom.." >
                        </div>
                        <div class="col-lg-6">
                            <label for="">Prenom:</label>
                            <input type="text" name="user-last-name" value="<?php echo htmlspecialchars($lastname);?>" class="form-control" placeholder="Entrer votre prenom..">
                        </div>
                </div><br>
                <label for="">E-mail:</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email);?>" placeholder="Enter votre E-mail.."><br>
                <div class="row">
                        <div class="col-lg-6">
                            <label for="">Mot de passe:</label>
                            <input type="password" name="pass1" value="<?php echo htmlspecialchars($pass);?>" class="form-control" placeholder="Entrer votre mot de passe..">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Confirmer:</label>
                            <input type="password" name="pass2" value="<?php echo htmlspecialchars($pass);?>" class="form-control" placeholder="Confirmer le mot de passe..">
                        </div>
                </div><br>
                <div class="row">
                        <div class="col-lg-6">
                            <label for="">Tel:</label>
                            <input type="tel" name="tel" value="<?php echo htmlspecialchars($tel);?>" class="form-control" placeholder="Entrer votre numero ..">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Ville:</label>
                            <input type="text" name="ville" value="<?php echo htmlspecialchars($ville);?>" class="form-control" placeholder="Entrer votre ville..">
                        </div>
                </div><br>

                        <label for="">Sexe:</label>
                        <select name="gender" id="gendre" class="form-control" >
                            <option <?php if ($gendre === "homme" ) echo 'selected' ; ?>  value="homme">Homme</option>
                            <option <?php if ($gendre === "femme" ) echo 'selected' ; ?> value="femme">Femme</option>
                        </select>

                        <label for="">Type de Compte:</label>
                        <select name="type" id="gendre" class="form-control" >
                                <option  <?php if ($type === "particulier" ) echo 'selected' ; ?> value="particulier">Particulier</option>
                                <option <?php if ($type === "professionnel" ) echo 'selected' ; ?> value="professionnel">Professionnel</option>
                        </select>

                        <label for="">Adresse:</label>
                        <input type="text" name="adresse" value="<?php echo htmlspecialchars($adresse);?>" class="form-control" placeholder="Adresse..">

                        <label for="">Nom de Society:</label>
                        <input type="text" name="nom-s" value="<?php echo htmlspecialchars($nom_society);?>" class="form-control" placeholder=" Nom de Society.." >


                        <label for="">Description de Society:</label>
                        <textarea name="desc_s" rows="4" cols="50" class="form-control" >
                        <?php echo htmlspecialchars($description_society);?>
                        </textarea><br>



                        
                        <div class="row">
                                <div class="col-lg-6">
                                        <input type="submit" id="modifier-button" name="modifier" value="Modier" class="btn btn-block">
                                </div>

                                <div class="col-lg-6">
                                        <input type="submit" onclick="window.location.href='AjouterAnnonce.php'" id="inscription-button" name="ajouter" value="Ajouter une annonce" class="btn btn-block">
                                </div>
                        </div><br>
           </div>
           </form>

       </div><br>

       <?php

        if(isset($_POST['ajouter'])){

          
          ?>
          <script>
           window.location.assign("AjouterAnnonce.php");
          </script>
       <?php
        }




        if(isset($_POST['modifier'])){
           $Nname=$_POST['user-name'];
           $Nlastname=$_POST['user-last-name'];
           $Nemail=$_POST['email'];
           $Npass1=$_POST['pass1'];
           $Npass2=$_POST['pass2'];
           $Ntel=$_POST['tel'];
           $Nville=$_POST['ville'];
           $Ngendre=$_POST['gender'];
           $Ntype=$_POST['type'];
           $Nnom__s=$_POST['nom-s'];
           $Ndesc_s=$_POST['desc_s'];
           $Nadresse=$_POST['adresse'];

            $nbr=Tannonceur::modifierAnnonceur($id_annonceur,$Nname,$Nlastname,$Nemail,$Ntype,$Ntel,$Npass1,$Nville,$Ngendre,$Nnom__s,$Ndesc_s,$Nadresse);
            if($nbr!=0){
            
                ?>
                <script>
                 window.location.assign("MonCompte.php");
                </script>
             <?php
            }
        }
       ?>

       <!-- <div class="row">
           <h3>Mes Annonces :</h3>
            <div class="card-deck mt-5 mb-5">
                    <div class="card card-modifier">
                      <img class="img-fluid imgt card-imd-top card-images" src="images/articles/a10.jpg">
                      <div class="card-body">
                          <h4 class="card-title ">Nikon Camera</h4>
                          <h4>2000</h4> 
                          <p class="card-text "><kbd>TANGER</kbd></p>
                          <button class="btn button-modier-card" type="submit">Modifier</button>
                          <button class="btn  button-supprimer-card" type="submit">Supprimer</button>
                      </div>
                    </div>
                  
          
                    <div class="card card-modifier">
                        <img class="img-fluid imgt card-imd-top card-images" src="images/articles/a2.jpg">
                        <div class="card-body">
                            <h4 class="card-title ">Nissan</h4>
                            <h4>120000</h4> 
                            <p class="card-text "><kbd>CASABLANCA</kbd></p>
                            <button class="btn  button-modier-card" type="submit">Modifier</button>
                            <button class="btn  button-supprimer-card" type="submit">Supprimer</button>
                        </div>
                      </div>
          
                      <div class="card card-modifier">
                          <img class="img-fluid imgt card-imd-top card-images" src="images/articles/a3.jpg">
                          <div class="card-body">
                              <h4 class="card-title">Dacia</h4>
                              <h4>7000000</h4> 
                              <p class="card-text "><kbd>TANGER</kbd></p>
                              <button class="btn  button-modier-card" type="submit">Modifier</button>
                              <button class="btn button-supprimer-card" type="submit">Supprimer</button>
                          </div>
                        </div>
          
                        
                </div>
       </div> -->


<!--CARDS-->
<div class="card-container">
<?php
  $cur=Tannonces::getOwnannonce($id_annonceur);
  while($row=$cur->fetch()){
    $images=$row[5];
    $listimages=explode(";",$images);
    $imgprincipal=$listimages[0];
    echo"<form method='POST'  action=''>";
    echo"<input type='hidden' value='$row[0]' name='idproduit'>";
    echo"<div class='card'>";
    echo"<div class='card-iamge'><img class='card-img' src='$imgprincipal' width='350px' height='240px' alt=''</div>";
    echo"<div class='card-text'>";
    echo"<span class='date'>$row[3]</span>";
    echo"<h2>$row[1]</h2>";
    echo"<p>$row[2]</p>";
    echo"</div>";
    
    echo"<div class='card-btns ville_prix'>";
    echo"<h6><strong>$row[8]</strong></h6>";
    echo"<h6 style=color:#006EFF>$row[4] <strong>DH</strong></h6>";
    echo"</div>";
    echo"<div class='card-btns btns'>";
    echo"<input  name='submit'  type='submit' value='Modifier' class='btn-voir-plus'>";
    echo"<input  name='supp'  type='submit' value='Supprimer' class='btn-supp'>";
    echo"</div>";
    echo"</div>";
    echo"</div>";
    echo"</form>"; 
  }
  echo"</div>";

  if(isset($_POST['submit'])){
        session_start();         
        $id=$_POST['idproduit'];
        $_SESSION['id_product']=$id;
    ?>
    <script>
     window.location.assign("ModifierAnnonce.php");
    </script>
 <?php
  }


  if(isset($_POST['supp'])){
       $id=$_POST['idproduit'];
      $r=Tannonces::getproductbyid($id);
      while($row=$r->fetch()){
        $images=$row[5];
        $listimages=explode(";",$images);

        foreach ($listimages as $img) {
            unlink($img);
        }
      }
      $n=Tannonces::supprimerAnnonce($id);
    ?>
    <script>
     window.location.assign("MonCompte.php");
    </script>
 <?php
  }
?>
</div>



    <footer class="footer mt-5">
            <nav class="navbar navbar-default navbar-custom bg-dark " id="navbar_footer">
                <div class="container-fluid">
                    <div class="nav navbar-nav navbar-left">
                        <ul class="footerleft">
                            <li>
                                <a href="">Aide</a>                   
                            </li>
                            <li>
                                <a href="">A propres</a>                    
                            </li>
                            <li>
                                <a href="">Loi</a>
                            </li>
                        </ul>
                    </div>
      
                    <div class="text-center center-block">
                        <a href="#"><img src="images/icones/facebook.png"></a>
                        <a href="#"><img src="images/icones/instagram.png"></a>
                        <a href="#"><img src="images/icones/twitter.png"></a>
                        <a href="#"><img src="images/icones/youtube.png"></a>
                    </div>
                </div>  
            </nav>
        </footer>

  </body>
</html>