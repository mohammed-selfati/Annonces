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
include_once  'Dataaccess.php';
class Tannonceur {
    //put your code here
    
    
    // methode inscription :
    
    public static function inscription($nom,$prenom,$email,$pass,$tel,$ville,$sexe,$typeC,$nom_s,$desc_s,$adress)
    {
        $r= Dataaccess::maj("insert into annonceur(nom_annonceur,prenom_annonceur,e_mail, type_annonceur ,numero_tel,mote_pass ,date_inscription, ville_annonceur,gendre,nom_societe,description_societe,adresse) values('$nom','$prenom','$email','$typeC','$tel','$pass',CURDATE(),'$ville','$sexe','$nom_s','$desc_s','$adress')");
        return $r;
       
    }
    // methode authentification :
    
    public static function authentification($email,$pass)
    {
        $cur= Dataaccess::sel("select * from annonceur where e_mail='$email' and mote_pass='$pass'");
        $nbr=    $cur->rowCount();
        return $nbr;
        
    }

    public static function getannonceurbyid($id){
        $cur= Dataaccess::sel("select * from annonceur where id_annonceur='$id'");
        return $cur;
    }


    public static function modifierAnnonceur($id,$nom,$prenom,$email,$type,$tel,$pass,$ville,$gendre,$nom_societe,$description_societe,$adresse){
        $nbr=Dataaccess::maj("update annonceur SET nom_annonceur = '$nom', prenom_annonceur = '$prenom', e_mail='$email', type_annonceur='$type', numero_tel ='$tel', mote_pass = '$pass', ville_annonceur = '$ville', gendre ='$gendre',nom_societe = '$nom_societe', description_societe = '$description_societe', adresse = '$adresse' WHERE id_annonceur = $id;");
        return $nbr;
    }
    
    
    
}
