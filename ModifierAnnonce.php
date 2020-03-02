<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="NstyleAccuiel.css"/>
    <title>Modifier  une annonce</title>
  </head>
  <body id="connection-page">
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
 include_once("Tannonceur.php");
 include_once ("Tannonces.php");
session_start();
  $email=$_SESSION['sessionemail'];
  $pass=$_SESSION['sessionpass'];
  $idpro=$_SESSION['id_product'];

  $curcat=Tannonces::GetcategoriebyId($idpro);
  while($rowcat=$curcat->fetch()){
    $categorie=$rowcat[13];
  }
  $cur=Tannonces::GetInfosByid($idpro);
  while($row=$cur->fetch()){
    $name_annonce=$row[1];
    $prix=$row[4];
    $description=$row[2];
    $id_sous_cat=$row[6];
  }
?>
    <div class="container">
       <div class="row" style="display: flex; align-items:center;">
           <div class="col-6 text-left">
               <h1 class="display-4"><a class="navbar-brand pt-0 pb-0 text-info mr-5" href="#"><img src="images/icones/logo.png" width="40px" height=></a></h1>
           </div>
           
       </div>

       <div class="row mt-5">
           <div class="col-lg-5">
              
           </div>

           <div class="col-lg-7">
           <form method="post" action="">
                <label for="">Titre de Annonce:</label>
                <input type="text" name="titre-annonce" value="<?php echo htmlspecialchars($name_annonce);?>"  class="form-control" placeholder="Entrer Le Titre.." ><br>

                <label for="">Prix:</label>
                <input type="text" name="prix" id="prix-modifier-annonce" value="<?php echo htmlspecialchars($prix);?>"  class="form-control"  placeholder="Enter le prix.."><br>

                <label for="">Categorie:</label>
                <select class="form-control" name="scat">
                <?php  
                            include_once ('Tannonces.php'); 
                            $curc= Tannonces::Chargercombosous_cat();   
                             // echo "<option class='form=control' value='*'>Toutes Categories</option>";
                            while ($row = $curc->fetch()) {
                              if($row[0]==$id_sous_cat){
                              echo "<option class='form=control'selected value='$row[0]'>$row[1]</option>";
                              }else{
                              echo "<option class='form=control' value='$row[0]'>$row[1]</option>";
                              }            
                            }
                       
                              $curc->closeCursor();       
                          ?> 
                </select><br>


                      <label for="">Description de Annonce:</label>
                        <textarea rows="4" cols="50" value="" name="desc" class="form-control">
                        <?php echo htmlspecialchars($description);?>
                        </textarea><br>

                        <div class="row">
                                <div class="col-6">
                                        <input type="submit" onclick="window.location.href='moncompte.html'" id="modifier-button" name="submit" value="Annuler" class="btn btn-block">
                                </div>
                    
                                <div class="col-6">
                                        <input type="submit"  name="modifier" value="Modifier" class="btn btn-block">
                                </div>
                        </div><br> 
                  </form> 
           </div>
        </div>
    </div>
    <?php
      if(isset($_POST['modifier'])){
        $Ntitle_annonce=$_POST['titre-annonce'];
        $Nprix=$_POST['prix'];
        $Nscat=$_POST['scat'];
        $Ndesc=$_POST['desc'];
        

         $nbr=Tannonces::modifierannonce($idpro,$Ntitle_annonce,$Nprix,$Nscat,$Ndesc);
         if($nbr!=0){
         
             ?>
             <script>
              window.location.assign("ModifierAnnonce.php");
             </script>
          <?php
         }
     }
    
    ?>

    <footer class="footer mt-5">
            <nav class="navbar navbar-default navbar-custom" id="navbar_footer">
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