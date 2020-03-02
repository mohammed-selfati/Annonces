<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="NNstyleAccueil.css"/>
    <title>Ajouter une annonce</title>
  </head>
  <body id="connection-page">
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php
      include_once  ("Tannonces.php");
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
          
        }
      
      
      ?>




    <div class="container">
       <div class="row" style="display: flex; align-items:center;">
           <div class="col-6 text-left">
               <h1 class="display-4"><a class="navbar-brand pt-0 pb-0 text-info mr-5" href="Accueil.php"><img src="images/icones/logo.png" width="40px" height=></a></h1>
           </div>
           
       </div>
<form method='POST' enctype="multipart/form-data">
       <div class="row mt-5">
           <div class="col-lg-5">
               Choisir les images (5 maximun) :<input name="files[]" type="file" multiple><br>
            </div>

           <div class="col-lg-7">
                <label for="">Titre de Annonce:</label>
                <input type="text" name="titre_annonce"  class="form-control" placeholder="Entrer Le Titre.." ><br>
                
                <!-- <label for="">Ville:</label>
                <input type="text" name="ville" class="form-control"  placeholder="Enter votre ville.."><br> -->

                <label for="">Prix:</label>
                <input type="text" name="prix" class="form-control"  placeholder="Enter le prix.."><br>

                <label for="">Categorie:</label>
                <select name='ccat' class="form-control">
                <?php   
                    $curc= Tannonces::Chargercombosous_cat();   
                 while ($row = $curc->fetch()) {
                     echo "<option class='form=control' value='$row[0]'>$row[1]</option>";            
                       }
                       
                   $curc->closeCursor();       
                       
                       ?>
                      </select><br>


                      <label for="">Description de Annonce:</label>
                        <textarea name="desc" rows="4" cols="50" class="form-control">
                               tu peux descripe votre annonce ici
                        </textarea><br>

                        <div class="row">
                                <div class="col-6">
                                        <input type="submit" onclick="window.location.href='Accueil.php'" id="modifier-button" name="submit" value="Annuler" class="btn btn-block">
                                </div>
                    
                                <div class="col-6">
                                        <input type="submit" id="inscription-button" name="submit" value="Ajouter" class="btn btn-block">
                                </div>
                        </div><br>  
           </div>
       </div>
    </div>
</form>
<?php
if(isset($_POST['submit'])){
    // $picture1=$_FILES['image1']['name'];
    // $picture2=$_FILES['image2']['name'];
    // $picture3=$_FILES['image3']['name'];
    //     $tmpFilePath1 = $_FILES['image1']['tmp_name'];
    //     $tmpFilePath2 = $_FILES['image2']['tmp_name'];
    //     $tmpFilePath3 = $_FILES['image3']['tmp_name'];


       
    //       $newFilePath1 = 'images/articles/' . $_FILES['image1']['name'];
    //       $newFilePath2 = 'images/articles/' . $_FILES['image2']['name'];
    //       $newFilePath3 = 'images/articles/' . $_FILES['image3']['name'];
    
    //       move_uploaded_file( $tmpFilePath1, $newFilePath1);
    //       move_uploaded_file( $tmpFilePath2, $newFilePath2);
    //       move_uploaded_file( $tmpFilePath3, $newFilePath3);
    $result["images"]=array();
    $images="";
    if(is_array($_FILES)){
        for($i=0;$i<count($_FILES['files']['name']);$i++){
            if($i==5)break;
            $fullname=$_FILES['files']['name'][$i];
            $exting=explode(".",$fullname)[1];
            $extentions=array("jpg","jpeg","png");
            if(in_array($exting,$extentions)){
                $newnamefile="images/articles/".time().rand(10,20).$_FILES['files']['name'][$i];
                $images.="$newnamefile;";
                $tmpfile=$_FILES['files']['tmp_name'][$i];
                $size=$_FILES['files']['size'][$i];
                $tab["nomfichier"]=$newnamefile;
                $tab["temporaire"]=$tmpfile;
                $tab["size"]=$size;
                move_uploaded_file($tmpfile,$newnamefile);
                array_push($result["images"],$tab);
            }
        }
        echo json_encode($result);
        //supprimer le dernier caractere
        $images=substr($images,0,-1);

    }  
        
      

    $titre=$_POST['titre_annonce'];
    // $nom=$_POST['nom'];
    // $prenom=$_POST['prenom'];
    //$email=$_POST['email'];
    //$tel=$_POST['tel'];
    $villeA= $ville;
    $prix=$_POST['prix'];
    $sous_cat=$_POST['ccat'];
    $desc=$_POST['desc'];
 

       
        $nbr=Tannonces::AjouterAnnonce($titre,$desc,$villeA,$prix,$images,$sous_cat,$id_annonceur);
      if($nbr!=0){
        ?>
        <script>
         window.location.assign("MonCompte.php");
        </script>
     <?php
      }
   
    
}

?>

    <footer class="footer mt-5">
            <nav class="navbar bg-dark navbar-default navbar-custom" id="navbar_footer">
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