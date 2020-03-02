<?php
include_once 'product.php';

class favourites {
    private $tableau_favourires;
    
    
    
    function __construct() {
        $this->$tableau_favourires=[];
    }
    
    //méthode ajouter au panier :
    
    
    function ajouterpanier(product $p)
    {
        $this->$tableau_favourires[]=$p;
    }

    
    //méthode contenu_panier
    
    function gettableau_favourires() {
        return $this->$tableau_favourires;
    }
   //méthode supprimer 
    
    function supprimerachat($id)
    {
        for ($i=0;$i<count($this->tableau_favourires) ;$i++)
            {
            $achat=$this->tableau_favourires[$i];
            $iditem=$achat->getid();
              if($iditem==$id){
                  unset($this->tableau_favourires[$i]);
                  $this->tableau_favourires=array_values($this->tableau_favourires);
              }
            }
    }


    
   
    
    
}


?>