<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" media="all" href="NstyleAccueil.css" type="text/css"/>
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
include_once ('Tannonces.php'); 


$result_per_page=6;

$cur=Tannonces::getnumberofannonces(); //number of result in database
while($row=$cur->fetch()){
  $number_of_annonces=$row[0];
}

// $number_of_pages=ceil($number_of_annonces/$result_per_page); //number of pages
if(!isset($_SESSION['nbannonces'])){
$number_of_pages=1;
}else{
$number_of_pages=($_SESSION['nbannonces']/$result_per_page);
} 

//which page number wisitor is currently on
if(!isset($_GET['page'])){
  $page=1;
}else{
  $page=$_GET['page'];
}

$index=($page-1)*$result_per_page;


?>
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
                    <select id="ccat" name="ccat" class="form-control common_selector ">
                          <?php  
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
                      <input id="rechercher" class="form-control  w-5" type="text" placeholder="Rechercher">   
                  </form>
              </li>

              <script>
              $(function(){
                $("#rechercher").keyup(function(){
                  $name=$("#rechercher").val();
                  
                  $.ajax({
                    url:"serveur.php",
                    type:"POST",
                    data:"name="+$name+"&oksearch='ok'"
                  }).done(function(rep){
                $(".card-container").html("");
                $(".card-container").html(rep);
             
               });

                })
              })
              
              </script>


             <li>
                
             </li>


              <li class="nav-item ">
                <button onclick="window.location.href='Inscription.php'" id="btn_inscription" class="mr-3  ml-3"  type="submit"><img src="images/icones/login2.png">  S'inscrire</button>
              </li>

              <li class="nav-item"> 
                  <button onclick="window.location.href='SeConnect.php'" id="btn_connect" class="mr-3  ml-3"  type="submit"><img src="images/icones/inscription.png"> Connecter</button>
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
                 url:"serveur.php",
                 type:"POST",
                 data:"minprice="+minprice+"&maxprice="+maxprice+"&ville="+ville+"&cat="+cat+"&sous_cat="+sous_cat+"&action='ok"
               }).done(function(rep){
                $(".card-container").html("");
                $(".card-container").html(rep[0]);
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
            <h2> Bienvenue sur site Web pour des annonces .</h2>
            <p class="lead">sur ce site, vous pouvez trouver les meilleures annonces et toutes les informations sur l'annonceur</p>
          </div>
          <div class="col-xs-12 col-sm-2 ">
            <img src="images/icones/logo.png" width="100px" height="auto">
          </div>
        </div>
    </div>

    <!--cards-->

   <!-- <div id="filter_data">
   
   </div> -->

   <script>
      $('.card-iamge')
    // tile mouse actions
    .on('mouseover', function(){
      $(this).children('.card-img').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
    })
    .on('mouseout', function(){
      $(this).children('.card-img').css({'transform': 'scale(1)'});
    })
    .on('mousemove', function(e){
      $(this).children('.card-img').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
    })
   </script>


 
   <div class="card-container">

     
     <?php
     
     if(isset($_POST['submit'])){        
       $id=$_POST['idproduit'];
       $_SESSION['id_product']=$id;
       ?>
         <script>
               window.location.assign('Description2.php');
       </script>
    <?php


    }
     ?>
   </div>
    


    <?php
    // for($pageb=1;$pageb<=$number_of_pages;$pageb++){
    //   echo'<a id="pagination" style="color:black;" href="AccueilV.php?page='.$pageb.'">'.$pageb.'</a>';
    // }
    
    $_SESSION['page']=$page;
    $_SESSION['index']=$index;
    $_SESSION['Rpp']=$result_per_page;
    
    ?>
  
 
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

  <button onclick="window.location.href='Inscription.php' "class="btn btn-success button-ajouter" type="submit" >+</button>
  
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
        <input value=0 name="min-prix" type="number" id="min-prix" placeholder="min prix.."class="d-inline form-control w-25 common_selector">
        <input value=9999999 name="max-prix" type="number" id="max-prix"  placeholder="max prix.." class="d-inline  form-control w-25 common_selector">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default modal-btn-annuler" data-dismiss="modal">Close</button>
        <input type="submit" value="Filter" name="filter-btn" class="btn btn-default modal-btn-valid">
      </div>
    </div>

  </div>
  </div>
  </body>
</html>