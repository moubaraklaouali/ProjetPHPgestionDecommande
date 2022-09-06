<?php

    // ---------POUR SE CONNECTER A LA BASE DE DONNEES-------------//
include_once("../connexion/connexion_mysql.php");
// -------------FIN DE LA CONNEXION-----------//

//-------------RECUPERER LA VARIABLE DE CONNEXION A LA BD---------//
$connexion=$GLOBALS['connexion'];
//-----------FIN DE LA RECUPERATION--------// 

//====CONTIENT LES FONCTION D'INSERTION DE MODIFICAION, DE CONSULTER ET DE SUPPRESSION
include("fonction_commande.php");
//===================FIN=======================//

if(isset($_POST['enregistrer']) && empty($_POST['id_commande'])) {

    if(empty($_POST['date_commande']) || empty($_POST['qte_commande']) || empty($_POST['fournisseur_id']) || empty($_POST['produit_id']) ) {
        //------ECHEC------------
        $statut=0; //0 EGALE FALSE
        //-----LE MESSAGE POUR AVERTIR L'UTLISATEUR
        $message="Tous les champs sont obligatoire";
        //-----C'EST POUR REDIRIGER L'UTILISATEUR
        header("location:commande.php?message=$message&statut=$statut");
    }//FIN DE IF
   

//----------Strlen() : la fonction qui permet de renvoyer
//--------le nombre de caractere d'une variable

else {
    $date_commande=$_POST["date_commande"];
    $qte_commande=$_POST["qte_commande"];
    $fournisseur_id=$_POST["fournisseur_id"];
    $produit_id=$_POST["produit_id"]; 
    //APPEL DE LA FONCTION AJOUTER UTLISATEUR//
   $resultat=ajouterCommande($date_commande,
                             $qte_commande,
                             $produit_id,
                             $fournisseur_id
                            );

    if($resultat==true) {
        $statut=1;
        $message="Commande enregistrée avec succès";
        header("location:commande.php?message=$message&statut=$statut");

        }//---FIN IF RESULTAT
    }
    
}//FIN D'AJOUT D'fournisseur==============================================



//Supprimer fournisseur
if(isset($_GET["id_commande_supprimer"])) {
    $id_commande=$_GET["id_commande_supprimer"];
    $resultat=supprimerCommande($id_commande);
    if($resultat==true) {
        $statut=1;
        $message="Commande supprimée avec succès";
        header("location:commande.php?message=$message&statut=$statut");
    }
    else{
        $statut=0;
        $message="Echec de suppresion.";
        header("location:commande.php?message=$message&statut=$statut");
    }
}

//MODIFIER UTLISATEUR
if(isset($_POST['enregistrer']) && !empty($_POST['id_commande'])) {
   

    $date_commande=$_POST["date_commande"];
    $qte_commande=$_POST["qte_commande"];
    $fournisseur_id=$_POST["fournisseur_id"];
    $produit_id=$_POST["produit_id"]; 
    $id_commande=$_POST["id_commande"];
    //APPEL DE LA FONCTION AJOUTER UTLISATEUR//
   $resultat=modifierCommande($id_commande,
                                $date_commande,
                                $qte_commande,
                                $produit_id,
                                $fournisseur_id
                                );

    if($resultat==true) {
        $statut=1;
        $message="Commande modifiée avec succès";
        header("location:commande.php?message=$message&statut=$statut");

        }//---FIN IF RESULTAT
    

   
}//FIN D'AJOUT D'produit==============================================




?>