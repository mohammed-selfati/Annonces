<?php
include_once("Dataaccess.php");
include_once("Tannonces.php");
// session_start();

// $page=$_SESSION['page'];
// $index=$_SESSION['index'];
// $result_per_page=$_SESSION['Rpp'];


if(isset($_POST['idcat'])){
    
    $id=$_POST['idcat'];
    $cur=Tannonces::Chargercombosous_catbycat($id);

    $reponse["sous_cat"]=array();
    while($row=$cur->fetch()){
        $ligne["id"]=$row[0];
        $ligne["name"]=$row[1];
        array_push($reponse["sous_cat"],$ligne);
    }
    
    echo json_encode($reponse);
}

if(isset($_POST["action"])){
  //  $this_page_first_res=$_POST['index'];
    $query="select * from annonce where id_annonce between 1 and 1000000000 ";

    if(isset($_POST["ville"])){
        $ville=$_POST["ville"];
        $query .=" and ville='$ville' ";
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

    $cur1=Dataaccess::sel($query);
    


    //$query.=" limit ".$index.','.$result_per_page;

    //  if(isset($_POST["rechercher"])){
    //     $rechercher=$_POST["rechercher"];
    //     $query .=" and nom_annonce like'$rechercher%' ";
    // }

      $cur=Dataaccess::sel($query);
      $nbannonces=$cur1->rowCount();

     $output="";
          while($row=$cur->fetch()){
            $images=$row[5];
            $listimages=explode(";",$images);
            $imgprincipal=$listimages[0];
             $output.="
             <form method='POST'  action='Description.php?idproduit=$row[0]'>
             <input type='hidden' value='$row[0]' name='idproduit'>
             <input type='hidden' value='$nbannonces' name='nbannonces'>

             <div class='card'>
             <div class='card-iamge'><img class='card-img' data-scale='1.1' src='$imgprincipal' width='350px' height='240px' alt=''</div>
             <div class='card-text'>
             <span class='date'>$row[3]</span>
             <h2>$row[1]</h2>
             </div>
             
             <div class='card-btns ville_prix'>
             <h6><strong>$row[8]</strong></h6>
             <h6 style=color:#006EFF>$row[4] <strong>DH</strong></h6>
             </div>
             <div class='card-btns btns'>
             <input  name='submit'  type='submit' value='Voir Plus' class='btn-voir-plus'>
             
             </div>
             </div>
             </div>
             </form>
             
             
             
             ";
            
}
$_SESSION['nbannonces']=$cur1->rowCount();
$n= $output.$_SESSION['nbannonces'];
//echo $n[strlen($n)-1];
echo $output;

}

if(isset($_POST["oksearch"])){
  //  $this_page_first_res=$_POST['index'];
    $name=$_POST["name"];
    $query="select * from annonce where nom_annonce like'%".$name."%'";
    $cur1=Dataaccess::sel($query);

  //  $query.=" limit ".$index.','.$result_per_page;
    $cur=Dataaccess::sel($query);
    $nbannonces=$cur1->rowCount();

    $output="";
    while($row=$cur->fetch()){
        $images=$row[5];
        $listimages=explode(";",$images);
        $imgprincipal=$listimages[0];
       $output.="
       <form method='POST'  action='Description.php?idproduit=$row[0]'>
       <input type='hidden' value='$row[0]' name='idproduit'>
       <input type='hidden' id='' value='$nbannonces' name='nbannonces'>

       <div class='card'>
       <div class='card-iamge' data-scale='1.1'><img class='card-img'  src='$imgprincipal' width='350px' height='240px' alt=''</div>
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
       </div>
       </div>
       </div>
       </form>
              
       ";
    }
    $_SESSION['nbannonces']=$cur1->rowCount();
    $n= $output.$_SESSION['nbannonces'];
   // echo $n[strlen($n)-1];
   echo $output;

}





if(isset($_POST["oksearch2"])){
 //   $this_page_first_res=$_POST['index'];
    $name=$_POST["name"];
    $query="select * from annonce where nom_annonce like'%".$name."%' ";
    $cur1=Dataaccess::sel($query);

   // $query.=" limit ".$index.','.$result_per_page;
    $cur=Dataaccess::sel($query);
    $nbannonces=$cur1->rowCount();
    
    $output="";
    while($row=$cur->fetch()){
        $images=$row[5];
        $listimages=explode(";",$images);
        $imgprincipal=$listimages[0];
       $output.="
       <form method='POST'  action='Description2.php?idproduit=$row[0]'>
       <input type='hidden' value='$row[0]' name='idproduit'>
       <input type='hidden' value='$nbannonces' name='nbannonces'>
       <div class='card'>
       <div class='card-iamge' data-scale='1.1'><img class='card-img'  src='$imgprincipal' width='350px' height='240px' alt=''</div>
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
    $_SESSION['nbannonces']=$cur1->rowCount();

    $n= $output.$_SESSION['nbannonces'];
    //echo $n[strlen($n)-1];
    echo $output;

}









if(isset($_POST["actionn"])){
    $query="select * from annonce where id_annonce between 1 and 1000000000 ";
   // $this_page_first_res=$_POST['index'];
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

     $cur1=Dataaccess::sel($query);

    // $query.=" limit ".$index.','.$result_per_page;
    //  if(isset($_POST["rechercher"])){
    //     $rechercher=$_POST["rechercher"];
    //     $query .=" and nom_annonce like'$rechercher%' ";
    // }

      $cur=Dataaccess::sel($query);
      $nbannonces=$cur1->rowCount();

     $output="";
          while($row=$cur->fetch()){
            $images=$row[5];
            $listimages=explode(";",$images);
            $imgprincipal=$listimages[0];
            
             $output.="
             <form method='POST'  action='Description2.php?idproduit=$row[0]'>
             <input type='hidden' value='$row[0]' name='idproduit'>
             <input type='hidden' value='$nbannonces' name='nbannonces'>
             <div class='card'>
             <div class='card-iamge'><img class='card-img' data-scale='1.1' src='$imgprincipal' width='350px' height='240px' alt=''</div>
             <div class='card-text'>
             <span class='date'>$row[3]</span>
             <h2>$row[1]</h2>
             </div>
             
             <div class='card-btns ville_prix'>
             <h6><strong>$row[8]</strong></h6>
             <h6 style=color:#006EFF>$row[4] <strong>DH</strong></h6>
             </div>
             <div class='card-btns btns'>
             <input  name='submit'  type='submit' value='Voir Plus' class='btn-voir-plus'>
             
             </div>
             </div>
             </div>
             </form>
             
             
             
             ";
     
}
$_SESSION['nbannonces']=$cur1->rowCount();
$n= $output.$_SESSION['nbannonces'];
echo $output;
//echo $n[strlen($n)-1];

 
}








?>