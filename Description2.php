<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="NstyleAccueil.css"/>
    <title>Bootstrap 4 Starter Template</title>
  </head>
  <body>
    
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--   Navigation   -->
    <?php
    
    session_start();
    if(empty($_SESSION['sessionemail'])){
        ?>
        <script>
         window.location.assign("AccueilV.php");
        </script>
     <?php
    }
    ?>
    <nav class="navbar navbar-expand-md bg-dark sticky-top navbar-light pt-2 pb-2 ">
        <div class="container-fluid">
            <a class="navbar-brand pt-0 pb-0 text-info mr-5" href="#"><img src="images/icones/logo.png" width="40px" height=></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-1">
              
                <!-- <li class="nav-item mr-2">
                  <form class="form-inline">
                    <select class="form-control">
                    <?php   
                    include('Tannonceur.php');
                    include_once  ("Tannonces.php");
                    $curc= Tannonces::Chargercombocat();   
                 while ($row = $curc->fetch()) {
                     echo "<option class='form=control' value='$row[0]'>$row[1]</option>";            
                       }
                       
                   $curc->closeCursor();       
                       
                       ?>  
                    </select>
                  </form>
                </li> -->

                <!-- <li class="nav-item mr-2">
                  <form class="form-inline">
                    <select class="form-control">
                    <?php   
                    $curc= Tannonces::Chargercomboville();   
                 while ($row = $curc->fetch()) {
                     echo "<option class='form=control' value='$row[0]'>$row[0]</option>";            
                       }
                       
                   $curc->closeCursor();       
                       
                       ?>
                    </select>
                  </form>
                </li>
                 -->

                <!-- <li class="nav-item">
                  <form class="form-inline  ">
                      <input class="form-control  w-5" type="text" placeholder="Rechercher">
                     
                  </form>
              </li> -->

              <!-- <li class="nav-item">
                <form class="form-inline mr-3 ">
                    <button class="btn btn-light" type="submit"><img src="images/icones/search (1).png"></button>
                </form>
            </li> -->
             <form action='' method='POST'>
              <li class="nav-item">
                  <button id="btn_inscription" name='deconnecter' class="mr-3  ml-3"  type="submit">Deconnecter</button>
              </li>
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

              <li class="nav-item">
                  <button  id="btn_connect" onclick="window.location.href='seconnect.html'" class="mr-3  ml-3"  type="submit">Mon Compte</button>
              </li>

              </ul>
            </div>
        </div>
    </nav>
<!--slider-->

                     <?php
                        
                        $idpro=$_GET['idproduit'];
                        $curcat=Tannonces::GetcategoriebyId($idpro);
                        while($rowcat=$curcat->fetch()){
                          $categorie=$rowcat[15];
                        }
                        $cur=Tannonces::GetInfosByid($idpro);
                        while($row=$cur->fetch()){
                          $name_annonceur=$row[10];
                          $lasname_annonceur=$row[11];
                          $email=$row[12];
                          $tel=$row[14];
                          $ville=$row[8];
                          $gendre=$row[20];
                          $type=$row[13];
                          $images=$row[5];
                          $listimages=explode(";",$images);
                          //$imgprincipal=$listimages[0];
                            echo" <div class='container'>";
                            echo"<div class='row mt-5'>";
                            echo"<div class='col-sm-6'>";
                            echo" <div class='row'>";
                            echo"<div class='col-12 mb-3'>";
                            echo" <div id='sliders' class='carousel slide' data-ride='carousel'>";
                            echo"<ul class='carousel-indicators'>";
                            echo"<li data-target='#sliders' data-slide-to='0' class='active'></li>";
                            for($j=1;$j<count($listimages);$j++){
                              echo"<li data-target='#sliders' data-slide-to='$j'></li>";
                            }
                            echo"</ul>";
                            echo" <div class='carousel-inner slider-produit embed-responsive embed-responsive-1by1'>";
                          
                            echo"<div class='carousel-item active embed-responsive-item w-100'>";
                            echo"<img src='$listimages[0]'>";
                            echo"</div>";
                            for($i=1;$i<count($listimages);$i++){
                              echo"<div class='carousel-item  embed-responsive-item w-100'>";
                              echo"<img src='$listimages[$i]'>";
                              echo"</div>";
                           }
                            echo" </div>";
                            echo" </div>";
                            echo" </div>";
                            echo" <div class='col-12 mb-3'>";
                            echo"<div class='card'>";
                            echo" <div class='card-body'>";
                            echo"<ul class='desc-card'>";
                            echo"<li><h4 class='card-title text-dark'>$row[1]</h4></li>";
                            echo"<hr>";
                            echo"<li><h4 class='card-title text-dark'>$row[4] DH</h4></li>";
                            echo"<li><p class='text-dark '>$row[2]</p></li><br>";
                            echo"<li style='display: inline;' class='text-dark'><h5 style='display: inline;'>Categorie : $categorie</h5></li>";
                            echo"<li style='display: inline;'><a style='display: inline;' href'#'>$row[6]</a></li>";
                            echo"<li><button id='btn_appelez' data-toggle='modal' data-target='#myModal'  type='submit'>Tout le information</button></li>";
                            echo"</ul>";
                            echo"</div>";
                            echo"</div>";
                            echo"</div>";
                            echo"</div>";
                            echo"</div>";
                            echo"<div class='col-sm-6'>";
                            echo" <div class='card'>";
                            echo"<div class='card-body'>";
                            echo"<ul class='desc-card'>";
                            echo"<li  style='display: inline;'><h4 class='card-title text-dark '  style='display: inline;'>$row[12] $row[13]</h4></li>";
                            echo"<li style='display: inline; float: right;'><h5 style='display: inline;' class='text-dark'>$row[16]</h5></li>";
                            echo" <hr>";
                            echo" <li style='display: inline;' class='text-dark '><img src='images/icones/location.png' alt=''></li>";
                            echo"<li style='display: inline;'><h5 style='display: inline;' class='text-dark '> $row[8]</h5></li><br><br>";
                            echo"<li style='display: inline;' class='text-dark'><img src='images/icones/clock.png' alt=''></li>";
                            echo"<li style='display: inline;'><h5 style='display: inline;' class='text-dark'>$row[3]</h5></li>";
                            echo" <li>";



                        }
                     ?>
                 
    
                    
                                      
                                      <button id="btn_appelez" data-toggle="modal" data-target="#myModal"  type="submit">Tout le information</button>
                                       <!-- Modal -->
                                      <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-dark">Information personnel :</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">

            <div class="row mt-5">
               <div class="col-lg-12 text-dark">
                <div class="row">
                        <div class="col-lg-6">
                            <label for="">Nom:</label>
                          <?php
                           echo"<p> $name_annonceur</p>"
                          ?>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Prenom:</label>
                            <?php
                           echo"<p> $$lasname_annonceur</p>"
                          ?>
                        </div>
                </div><br>
                <label for="">E-mail:</label>
                <?php
                           echo"<p> $email</p>"
                ?><br>
                
                <div class="row">
                        <div class="col-lg-6">
                            <label for="">Tel:</label>
                            <?php
                           echo"<p> $tel</p>"
                          ?>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Ville:</label>
                            <?php
                           echo"<p> $ville</p>"
                          ?>
                        </div>
                </div><br>

                        <label for="">Sexe:</label>
                        <?php
                           echo"<p> $gendre</p>"
                          ?>

                        <label for="">Type de Compte:</label>
                        <?php
                           echo"<p> $type</p>"
                          ?>
                </div>
               </div>                                 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default bg-dark modal-btn-annuler" data-dismiss="modal">Annuler</button>  
              </div>
            </div>
          </div>
        </div>
        </li>
    </ul>
</div>
</div>
</div>
</div>
</div>
    
 
    <!--FOOTER-->
    <footer class="footer mt-5">
      <nav class="navbar navbar-default bg-dark navbar-custom" id="navbar_footer">
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