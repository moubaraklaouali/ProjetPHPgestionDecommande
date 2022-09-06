<?php

    // ---------POUR SE CONNECTER A LA BASE DE DONNEES-------------//
include_once("../connexion/connexion_mysql.php");
// -------------FIN DE LA CONNEXION-----------//

//-------------RECUPERER LA VARIABLE DE CONNEXION A LA BD---------//
$connexion=$GLOBALS['connexion'];
//-----------FIN DE LA RECUPERATION--------//

//====CONTIENT LES FONCTION D'INSERTION DE MODIFICAION, DE CONSULTER ET DE SUPPRESSION
include("fonction_fournisseur.php");
//===================FIN=======================//

if(isset($_POST['enregistrer']) && empty($_POST['id_fournisseur'])) {

    if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['adresse']) ) {
        //------ECHEC------------
        $statut=0; //0 EGALE FALSE
        //-----LE MESSAGE POUR AVERTIR L'UTLISATEUR
        $message="Tous les champs sont obligatoire";
        //-----C'EST POUR REDIRIGER L'UTILISATEUR
        header("location:fournisseur.php?message=$message&statut=$statut");
    }//FIN DE IF
   

//----------Strlen() : la fonction qui permet de renvoyer
//--------le nombre de caractere d'une variable
else {
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $adresse=$_POST["adresse"];
    //APPEL DE LA FONCTION AJOUTER UTLISATEUR//
   $resultat=ajouterFournisseur($nom,
                                $prenom,
                                $adresse );

    if($resultat==true) {
        $statut=1;
        $message="Fournisseur enregistré avec succès";
        header("location:fournisseur.php?message=$message&statut=$statut");

        }//---FIN IF RESULTAT
    }
    
}//FIN D'AJOUT D'fournisseur==============================================



//Supprimer fournisseur
if(isset($_GET["id_fournisseur_supprimer"])) {
    $id_fournisseur=$_GET["id_fournisseur_supprimer"];
    $resultat=supprimerFournisseur($id_fournisseur);
    if($resultat==true) {
        $statut=1;
        $message="Fournisseur supprimé avec succès";
        header("location:fournisseur.php?message=$message&statut=$statut");
    }
    else{
        $statut=0;
        $message="Echec de suppresion.";
        header("location:fournisseur.php?message=$message&statut=$statut");
    }
}

//MODIFIER UTLISATEUR
if(isset($_POST['enregistrer']) && !empty($_POST['id_fournisseur'])) {
   

    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $adresse=$_POST["adresse"];
    $id_fournisseur=$_POST["id_fournisseur"];
    //APPEL DE LA FONCTION AJOUTER UTLISATEUR//
   $resultat=modifierFournisseur($id_fournisseur,
                                $nom,
                                $prenom,
                                $adresse ); 

    if($resultat==true) {
        $statut=1;
        $message="Fournisseur modifié avec succès";
        header("location:fournisseur.php?message=$message&statut=$statut");

        }//---FIN IF RESULTAT
    

   
}//FIN D'AJOUT D'fournisseur==============================================




?>