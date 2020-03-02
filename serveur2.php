<?php
include_once("Dataaccess.php");
include_once("Tannonces.php");


session_start();

$page=$_SESSION['page'];
$index=$_SESSION['index'];
$result_per_page=$_SESSION['index'];



if(isset($_POST["actionn"])){
    $query="select * from annonce where id_annonce between 1 and 1000000000 ";

     if(isset($_POST["ville"])){
        $ville=$_POST["ville"];
         $query .=" and ville='$ville'";
     }

    if(isset($_POST["sous_cat"])){
        $scat=$_POST["sous_cat"];
        $query .=" and id_sous_categorie='$scat' ";
    }

     if(isset($_POST["minprice"],$_POST["maxprice"])){
         $minprice=$_POST["minprice"];
         $maxprice=$_POST["maxprice"];
         $query .=" and prix between '$minprice' and '$maxprice' ";
     }

     $query.=" limit ".$index.','.$result_per_page;

      $cur=Dataaccess::sel($query);
     
     $output="";
          while($row=$cur->fetch()){
            $images=$row[5];
            $listimages=explode(";",$images);
            $imgprincipal=$listimages[0];
             $output.="
             <form method='POST'  action='Description2.php?idproduit=$row[0]'>
             <input type='hidden' value='$row[0]' name='idproduit'>
             <div class='card'>
             <div class='card-iamge' data-scale='1.1'><img class='card-img'  src=' $imgprincipal' width='350px' height='240px' alt=''</div>
             <div class='card-text'>
             <span class='date'>$row[3]</span>
             <h2>$row[1]</h2>
             </div>
             
             <div class='card-btns ville_prix'>
             <h6><strong>$row[8]</strong></h6>
             <h6 style=color:#006EFF>$row[4] <strong>DH</strong></h6>
             </div>
             <div class='card-btns btns'>
             <input  name='submit'  type='submit' value='Plus Info' class='btn-voir-plus'>
             <button  class='btn-fav'><img src='images/icones/fav2.png'></button>
             </div>
             </div>
             </div>
             </form>
             ";
             
     
}
$_SESSION['nbannonces']=$cur->rowCount();
echo $output;
}

?>