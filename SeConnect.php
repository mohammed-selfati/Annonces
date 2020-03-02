<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="NstyleAccueil.css"/>
    <title>Se connect </title>
    <style>
     body{
         background:url("images/slider/inscription2.jpg");
         background-position:center;
         background-size:cover;
     }
 </style>
  </head>
  <body id="connection-page">
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row text-center ">
            <div class="col-12">
            <h1><img src="images/icones/logo.png" width="100px" height=></h1>
                <h6 class="insctitle">Se Connect</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div id="ui">
                    <form class="form-group " method="POST" action="">

                        <label for="">E-mail:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter votre E-mail..">

                        
                               
                        <label for="">Mot de passe:</label>
                        <input type="password" name="pass" class="form-control" placeholder="Entrer votre mot de passe..">
                                
    
                        <div class="row mt-4">
                                <div class="col-6">
                                    <a href="inscription.html" class="">Sinscrire</a>
                                </div>
                                <div class="col-6">
                                        <input type="submit"  id="inscription-button" name="se-connect" value="Connect" class="btn btn-block">
                                </div>
                        </div>
                      
                    </form>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    <?php
    include_once  ('Tannonceur.php');
    if(isset($_POST['se-connect'])){
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        $n=Tannonceur::authentification($email,$pass);

        if($n!=0 ){
            session_start();
            $_SESSION['sessionemail']=$email;
            $_SESSION['sessionpass']=$pass;
            
            // $p=new Panier();
            
            // $_SESSION['sessionpanier']=$p;
            // if (isset($_POST['auto'])) {
            //         setcookie("cookemail", $email, time()+30);
            //         setcookie("cookpass", $pass, time()+30);  /* expire in 2 min */

                
            //       }
                 
           header("Location:Accueil.php"); 
        }else{
            echo"mot pass incorrect";
        }
    }
    
    ?>

  </body>
</html>