<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tclient
 *
 * @author pc
 */
include_once 'Dataaccess.php';
class Tannonces {
    //put your code here
    
    
    // methode inscription :
    
    public static function information($email,$pass)
    {
        $r= Dataaccess::sel("select * from annonceur where e_mail='$email' and mote_pass='$pass'");
        return $r;
    }

    public static function getproductbyid($id)
    {
        $r= Dataaccess::sel("select * from annonce where id_annonce ='$id'");
        return $r;
    }
    
    static function Chargercombocat()
    {
        $cur= Dataaccess::sel("select * from categorie");
        return $cur;
    }

    static function Chargercombosous_catbycat($idcat)
    {
        $cur= Dataaccess::sel("select * from sous_categorie where id_categorie =$idcat");
        return $cur;
    }

    static function Chargercombosous_cat(){
        $cur= Dataaccess::sel("select * from sous_categorie ");
        return $cur;
    }
    static function Chargercomboville()
    {
        $cur= Dataaccess::sel("select distinct(ville_annonceur) from annonceur");
        return $cur;
    }

    static function GetInfosByid($id){
        
        $cur= Dataaccess::sel("select * from annonce a, annonceur an where a.id_annonceur =an.id_annonceur and a.id_annonce=$id");
        return $cur;
    }

    static function GetcategoriebyId($id){
        $cur= Dataaccess::sel("select * from annonce a, sous_categorie s,categorie c where a.id_sous_categorie=s.id_sous_categorie and s.id_categorie=c.id_categorie and a.id_annonce=$id");
        return $cur;
    }
    static function AjouterAnnonce($titre,$desc,$ville,$prix,$img,$id_sous_cat,$id_annonceur){
        
        $nbr=Dataaccess::maj("insert into annonce(nom_annonce,description,date_annonce,prix,photo,id_sous_categorie,id_annonceur,ville) values('$titre','$desc',CURDATE(),'$prix','$img','$id_sous_cat','$id_annonceur','$ville')");
        return $nbr;

    //     $total=Count($img);
    //     for($i=0;$i<$total;$i++){
    //         $nbrpic=Dataaccess::maj("insert into annonce(photo) values('gaga')");
    //     }
     }


     static function Getproducts($cat,$ville)
     {
         $cur= Dataaccess::sel("select * from annonce a,sous_categorie s, categorie c where a.id_sous_categorie=s.id_sous_categorie and s.id_categorie=c.id_categorie and c.id_categorie='$cat' and a.ville='$ville'");
         return $cur;
     }

     static function Getproductsbyville($ville){
         $cur=Dataaccess::sel("select * from annonce a where a.ville='$ville'");
         return $cur;
     }

     static function Getproductsbycat($cat){
        $cur=Dataaccess::sel("select * from annonce a,sous_categorie s, categorie c where a.id_sous_categorie=s.id_sous_categorie and s.id_categorie=c.id_categorie and c.id_categorie='$cat'");
        return $cur;
    }

    static function getallproduct(){
        $cur=Dataaccess::sel("select * from annonce");
        return $cur;
    }

    static function getproductbyprice($min,$max){
        $cur=Dataaccess::sel("select * from annonce a where a.prix between '$min' and '$max'");
        return $cur;
    }
    static function getproductbypriceandville($min,$max,$ville){
        $cur=Dataaccess::sel("select * from annonce a where a.prix between '$min' and '$max' and a.ville='$ville'");
        return $cur;
    }
    static function getproductbypriceAndCat($min,$max,$Cat){
        $cur=Dataaccess::sel("select * from annonce a,sous_categorie s, categorie c where a.id_sous_categorie=s.id_sous_categorie and s.id_categorie=c.id_categorie and c.id_categorie='$cat' and a.prix between '$min' and '$max'");
        return $cur;
    }

    static function getproductbypriceAndCatAndVille($min,$max,$Cat,$ville){
        $cur=Dataaccess::sel("select * from annonce a,sous_categorie s, categorie c where a.id_sous_categorie=s.id_sous_categorie and s.id_categorie=c.id_categorie and c.id_categorie='$Cat' and a.prix between '$min' and '$max' and  a.ville='$ville'");
        return $cur;
    }

    static function getOwnannonce($id){
        $cur=Dataaccess::sel("select * from annonce where id_annonceur='$id'");
        return $cur;
    }

    static function supprimerAnnonce($id_annonce){
        $nbr=Dataaccess::maj("delete FROM annonce WHERE id_annonce = $id_annonce");
        return $nbr;
    }

    public static function modifierannonce($id, $Ntitle_annonce,$Nprix,$Nscat,$Ndesc){
        $nbr=Dataaccess::maj("update annonce SET nom_annonce = '$Ntitle_annonce', prix ='$Nprix',id_sous_categorie='$Nscat', description='$Ndesc' where id_annonce='$id'");
        return $nbr;
    }

    public static function getnumberofannonces(){
        $nbr=Dataaccess::sel("select count(id_annonce) from annonce");
        return $nbr;
    }
}
    
    