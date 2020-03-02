<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>test</title>
    <link rel="stylesheet" href="NstyleAccueil.css" type="text/css">
  </head>
  <body>
      <?php
      
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
          
        }
          $_SESSION['id_annonceur']=$id_annonceur;
         if(empty($_SESSION['sessionemail'])){
          ?>
          <script>
           window.location.assign("AccueilV.php");
          </script>
       <?php
      }
      
      
      ?>
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--   Navigation   -->

    <nav class="navbar navbar-expand-lg  sticky-top bg-dark pt-2 pb-2 ">
        <div class="container-fluid">
            <a class="navbar-brand pt-0 pb-0 text-info mr-1" href="#"><img src="images/icones/logo.png" width="40px" height=></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
              <span class="navbar-toggler-icon"></span>
            </button>
            <script src="jquery.js"></script>

            <script>
            $(function(){
              $("#ccat").change(function(){
                let cat=$("#ccat").val();
                 $.ajax({
                   type:"POST",
                   url:"serveur.php",
                   data:"idcat="+cat,
                   dataType:"json"
                 }).done(function(rep){
                   let i=0;
                   $("#csc").html("");
                   for(i in rep.sous_cat){
                     $("#csc").append("<option value='"+rep.sous_cat[i].id+"'>"+rep.sous_cat[i].name+"</option>");
                   }
                   
                 })

              })
                
               
              // $("#cville").change(function(){
              //   let ville=$("#cville").val();
                 
              // });

              // $("#min-prix").change(function(){
              //    minprice=$("#minprice").val();
              // });

              // $("#max-prix").change(function(){
              //    maxprice=$("#max-prix").val();
              // })
              
            })











            
            // $('#plus_info').click(function(){
            //   $.ajax({
            //     url:"Description.php?id="+id>,data:"ok=ok",type:"POST"
            //   }).done({});
            // })











            
            </script>
            <div class="collapse navbar-collapse  " id="navbarResponsive">
              <ul class="navbar-nav ml-1">
              
                

                <li class="nav-item mr-1">   
                    <select id="ccat" name="ccat" class="form-control common_selector">
                          <?php  
                            include_once ('Tannonces.php'); 
                            $curc= Tannonces::Chargercombocat();   
                              echo "<option class='form=control' value='*'>Toutes Categories</option>";
                            while ($row = $curc->fetch()) {
                              echo "<option class='form=control' value='$row[0]'>$row[1]</option>";            
                            }
                       
                              $curc->closeCursor();       
                          ?> 
                    </select>
                      
                </li>

                <li class="nav-item mr-1">   
                    <select id="csc" name="csc" class="form-control common_selector">
                         
                    </select>
                      
                </li>
                

                <li class="nav-item mr-2">    
                    <select id="cville"  name="cville" class="form-control common_selector">
                          <?php   
                           $curc= Tannonces::Chargercomboville();   
                           while ($row = $curc->fetch()) {
                              echo "<option class='form=control' value='$row[0]'>$row[0]</option>";            
                           }
                       
                             $curc->closeCursor();       
                       
                          ?> 
                    </select>
                </li>    
                
    

  <?php 
  
    
  ?>
                    

                <li class="nav-item">
                  <form class="form-inline  ">
                      <input id="rechercher2" class="form-control  w-5" type="text" placeholder="Rechercher">   
                  </form>
              </li>

              <script>
              $(function(){
                $("#rechercher2").keyup(function(){
                  $name=$("#rechercher2").val();
                  $.ajax({
                    url:"serveur.php",
                    type:"POST",
                    data:"name="+$name+"&oksearch2='ok'"
                  }).done(function(rep){
                $(".card-container").html("");
                $(".card-container").html(rep);
               });

                })
              })
              
              </script>


             <li>
                
             </li>


              
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
                  <button  id="btn_connect" onclick="window.location.href='MonCompte.php'" class="mr-3  ml-3"  type="submit">Mon Compte</button>
              </li>

            </ul>
            
          </div>

    </div>
    </nav>

    <script>
      $(function(){
        filterdata();

        function filterdata(){
          $(".card-container").html("<div id='loading' style=''>Loading...</div>");
          
                let minprice=$("#min-prix").val();
                let maxprice=$("#max-prix").val();
                let ville=$("#cville").val();
                let cat=$("#ccat").val();
                let sous_cat=$("#csc").val();
               
               $.ajax({
                 url:"serveur2.php",
                 type:"POST",
                 data:"minprice="+minprice+"&maxprice="+maxprice+"&ville="+ville+"&cat="+cat+"&sous_cat="+sous_cat+"&actionn=ok"
               }).done(function(rep){
              //  $(".card-container").html("");
              // alert(rep);
                 $(".card-container").html(rep);
                
               });

               
              } 

        $('.common_selector').change(function(){
          filterdata();
        });      

      })
    </script>



       <!--image slider-->
       <div id="sliders" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#sliders" data-slide-to="0" class="active"></li>
        <li data-target="#sliders" data-slide-to="1"></li>
        <li data-target="#sliders" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/slider/ad7.jpg">
          <div class="carousel-caption">
            <h3 class="display-3">Trouver les Meilleurs Produits Sur M.R.J</h3>
            </div>
        </div>

        <div class="carousel-item ">
          <img src="images/slider/ad4.jpg">
          
        </div>

        <div class="carousel-item ">
          <img src="images/slider/a5.jpg">
        </div>
      </div>
    </div>



    <!--jumbotron-->
    <div class="container-fluid">
        <div class="row jumbotron image">
          <div class="col-xs-12 col-sm-10 ">
          <?php
                    echo"<h2>Welcome Back ,  $name </h2>";
          ?>
            <p>sur ce site, vous pouvez trouver les meilleures annonces et toutes les informations sur l'annonceur</p>
          </div>
          <div class="col-xs-12 col-sm-2 ">
            <img src="images/icones/logo.png" width="100px" height="auto">
          </div>
        </div>
    </div>
    

<div class="card-container">

      

</div>


 
<!-- 
        // echo"<form method='POST'  action='Description.php'>";
        // echo"<input type='hidden' value='$row[0]' name='idproduit'>";
        // echo"<div class='card'>";
        // echo"<div class='card-iamge'><img class='card-img' src='images/articles/$row[5]' width='350px' height='240px' alt=''</div>";
        // echo"<div class='card-text'>";
        // echo"<span class='date'>$row[3]</span>";
        // echo"<h2>$row[1]</h2>";
        // echo"<p>$row[2]</p>";
        // echo"</div>";
        
        // echo"<div class='card-btns ville_prix'>";
        // echo"<h6><strong>$row[8]</strong></h6>";
        // echo"<h6 style=color:#006EFF>$row[4] <strong>DH</strong></h6>";
        // echo"</div>";
        // echo"<div class='card-btns btns'>";
        // echo"<input  name='submit'  type='submit' value='Plus Info' class='btn-voir-plus'>";
        // echo"<button  class='btn-fav'><img src='images/icones/plus.png'></button>";
        // echo"</div>";
        // echo"</div>";
        // echo"</div>";
        // echo"</form>"; -->

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

  <button onclick="window.location.href='AjouterAnnonce.html'" class="btn btn-success button-ajouter" type="submit" >+</button>
  
  <button type="button" id="btn-modal-trie" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><img src="images/icones/filter2.png" alt=""></button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title text-left ">Trie par</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <input value=0 type="number"id="min-prix"placeholder="min prix.."class="d-inline form-control w-25">
        <input value=99999999 type="number"id="max-prix" placeholder="max prix.." class="d-inline  form-control w-25">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default modal-btn-annuler" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default modal-btn-valid" data-dismiss="modal">Valid</button>
      </div>
    </div>

  </div>
</div>
  </body>
</html>