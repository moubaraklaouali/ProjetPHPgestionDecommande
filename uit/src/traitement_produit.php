<?php

    // ---------POUR SE CONNECTER A LA BASE DE DONNEES-------------//
include_once("../connexion/connexion_mysql.php");
// -------------FIN DE LA CONNEXION-----------//

//-------------RECUPERER LA VARIABLE DE CONNEXION A LA BD---------//
$connexion=$GLOBALS['connexion'];
//-----------FIN DE LA RECUPERATION--------//

//====CONTIENT LES FONCTION D'INSERTION DE MODIFICAION, DE CONSULTER ET DE SUPPRESSION
include("fonction_produit.php");
//===================FIN=======================//

if(isset($_POST['enregistrer']) && empty($_POST['id_produit'])) {
   
    if(empty($_POST['libelle']) || empty($_POST['prix_unitaire'])) {
        //------ECHEC------------
        $statut=0; //0 EGALE FALSE
        //-----LE MESSAGE POUR AVERTIR L'UTLISATEUR
        $message="Tous les champs sont obligatoire";
        //-----C'EST POUR REDIRIGER L'UTILISATEUR
        header("location:produit.php?message=$message&statut=$statut");
    }//FIN DE IF

    else {

//----------Strlen() : la fonction qui permet de renvoyer
//--------le nombre de caractere d'une variable
    $libelle=$_POST["libelle"];
    $prix_unitaire=$_POST["prix_unitaire"];
    //APPEL DE LA FONCTION AJOUTER UTLISATEUR//
   $resultat=ajouterProduit($libelle,
                                $prix_unitaire);

    if($resultat==true) {
        $statut=1;
        $message="Produit enregistré avec succès";
        header("location:produit.php?message=$message&statut=$statut");

        }//---FIN IF RESULTAT
    }
    
}//FIN D'AJOUT D'fournisseur==============================================



//Supprimer fournisseur
if(isset($_GET["id_produit_supprimer"])) {
    $id_produit=$_GET["id_produit_supprimer"];
    $resultat=supprimerProduit($id_produit);
    if($resultat==true) {
        $statut=1;
        $message="Produit supprimé avec succès";
        header("location:produit.php?message=$message&statut=$statut");
    }
    else{
        $statut=0;
        $message="Echec de suppresion.";
        header("location:produit.php?message=$message&statut=$statut");
    }
}

//MODIFIER UTLISATEUR
if(isset($_POST['enregistrer']) && !empty($_POST['id_produit'])) {
   

    $libelle=$_POST["libelle"];
    $prix_unitaire=$_POST["prix_unitaire"];
    $id_produit=$_POST["id_produit"];
    //APPEL DE LA FONCTION AJOUTER UTLISATEUR//
   $resultat=modifierProduit($id_produit,
                                $libelle,
                                $prix_unitaire); 

    if($resultat==true) {
        $statut=1;
        $message="Produit modifié avec succès";
        header("location:produit.php?message=$message&statut=$statut");

        }//---FIN IF RESULTAT
    

   
}//FIN D'AJOUT D'produit==============================================




?>