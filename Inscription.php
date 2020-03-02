<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="NstyleAccueil.css"/>
    <title>Inscription </title>
    <script>

            function verifier(){
                var ok=true;
                let pass1=document.getElementById('ipass1').value;
                let pass2=document.getElementById('ipass2').value;
                if(pass1!=pass2)
                {
                    alert("les deux pass doivent etre identiques !");
                    ok=false;
                }
                return ok;
            }
 </script>
 <style>
     body{
         background:url("images/slider/inscription2.jpg");
         background-position:center;
         background-size:cover;
     }
 </style>
  </head>
  <body id="iscription-page">
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row text-center ">
            <div class="col-12">
                <h1><img src="images/icones/logo.png" width="100px" height=></h1>
                <h6 class="insctitle">INSCRIPTION</h6>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div id="ui">
                    <form action="" method="POST" class="form-group"  onsubmit="return verifier()">

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Nom:</label>
                                <input type="text" name="user-name" class="form-control" placeholder="Entrer votre nom..">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Prenom:</label>
                                <input type="text" name="user-lastname" class="form-control" placeholder="Entrer votre prenom..">
                            </div>
                        </div>

                        <label for="">E-mail:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter votre E-mail..">

                        <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Mot de passe:</label>
                                    <input id="ipass1" type="password" name="user-pass1" class="form-control" placeholder="Entrer votre mot de passe..">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Confirmer:</label>
                                    <input id="ipass2" type="password" name="user-pass2" class="form-control" placeholder="Confirmer le mot de passe..">
                                </div>
                        </div>

                        <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Tel:</label>
                                    <input type="tel" name="user-tel" class="form-control" placeholder="Entrer votre numero ..">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Ville:</label>
                                    <input type="text" name="user-city" class="form-control" placeholder="Entrer votre ville..">
                                </div>
                        </div>

                        <label for="">Sexe:</label>
                        <select name="gender" id="gendre" class="form-control">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>

                        <label for="">Type de Compte:</label>
                        <select name="typecompte" id="gendre" class="form-control">
                                <option value="particulier">Particulier</option>
                                <option value="professionnel">Professionnel</option>
                        </select>


                        <label for="">Nom de Society:</label>
                        <input type="text" name="nom-s" class="form-control" placeholder=" Nom de Society..">

                        <label for="">Adresse:</label>
                        <input type="text" name="adresse" class="form-control" placeholder="Adresse..">

                        <label for="">Description de Society:</label>
                        <textarea name="des-society" rows="4" cols="50" class="form-control">
                                Description de Society (Optional)
                        </textarea><br>



                        
                        <div class="row">
                                <div class="col-lg-6">
                                        <a href="SeConnect.php" class="">Se Connecter</a>
                                        
                                </div>
                                <div class="col-lg-6">
                                        <input type="submit" id="inscription-button" name="inscription" value="Sinscrire" class="btn btn-block">
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
    if(isset($_POST['inscription'])){
        $nom=$_POST['user-name'];
        $prenom=$_POST['user-lastname'];
        $email=$_POST['email'];
        $pass=$_POST['user-pass1'];
        $tel=$_POST['user-tel'];
        $ville=$_POST['user-city'];
        $sexe=$_POST['gender'];
        $typeC=$_POST['typecompte'];
        $nom_s=$_POST['nom-s'];
        $des=$_POST['des-society'];
        $adresse=$_POST['adresse'];
        $r= Tannonceur::inscription($nom,$prenom,$email,$pass,$tel,$ville,$sexe,$typeC,$nom_s,$des,$adresse);
    }
    
    ?>
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