<?php

// ---------POUR SE CONNECTER A LA BASE DE DONNEES-------------//
include_once("../connexion/connexion_mysql.php");
// -------------FIN DE LA CONNEXION-----------//

//-------------RECUPERER LA VARIABLE DE CONNEXION A LA BD---------//
$connexion=$GLOBALS['connexion'];
//-----------FIN DE LA RECUPERATION--------//

//====CONTIENT LES FONCTION D'INSERTION DE MODIFICAION, DE CONSULTER ET DE SUPPRESSION
include("fonction_utilisateur.php");
//===================FIN=======================//

if(isset($_POST['enregistrer']) && empty($_POST['id_user'])) {
    if(empty($_POST['login']) || empty($_POST['password'])) {
        //------ECHEC------------
        $statut=0; //0 EGALE FALSE
        //-----LE MESSAGE POUR AVERTIR L'UTLISATEUR
        $message="Le login ou le password sont obligatoire.";
        //-----C'EST POUR REDIRIGER L'UTILISATEUR
        header("location:utilisateur.php?message=$message&statut=$statut");
    }//FIN DE IF


//----------Strlen() : la fonction qui permet de renvoyer
//--------le nombre de caractere d'une variable
else if(strlen($_POST['login'])<3) {
    $statut=0;
    $message="Le login est trop court(au moins 3 caracteres...)";
    header("location:utlisateur.php?message=$message&statut=$statut");
}
else {
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $telephone=$_POST["telephone"];
    $login=$_POST["login"];
    $droit=$_POST["droit"];
    //-----id_user qui ajouter l'utlisateur--
    // $createdBy=$_SESSION['id_user'];
    $createdBy=$_POST["createdBy"];
    //---------DATE ET HEURE DE L'AJOUT------
    $createdAt = date('Y-m-d H:i:s');

    //---sha1 ou md5 C'EST UNE FONCTION QUI 
    //PERMET DE HACHE LE PASSWORD
    $password=sha1($_POST["password"]);

    //APPEL DE LA FONCTION AJOUTER UTLISATEUR//
   $resultat=ajouterUtilisateur($nom,
                                $prenom,
                                $telephone,
                                $login,
                                $password,
                                $createdBy,
                                $createdAt,
                                $droit);

    if($resultat==true) {
        $statut=1;
        $message="Utilisateur enregistré avec succès";
        header("location:utilisateur.php?message=$message&statut=$statut");

        }//---FIN IF RESULTAT
    

    }//-----FIN ELSE
}//FIN D'AJOUT D'UTILISATEUR==============================================




//Supprimer utilisateur
if(isset($_GET["id_user_supprimer"])) {
    $id_user=$_GET["id_user_supprimer"];
    $resultat=supprimerUtilisateur($id_user);
    if($resultat==true) {
        $statut=1;
        $message="Utilisateur supprimé avec succès";
        header("location:utilisateur.php?message=$message&statut=$statut");
    }
    else{
        $statut=0;
        $message="Echec de suppresion.";
        header("location:utilisateur.php?message=$message&statut=$statut");
    }
}

//MODIFIER UTLISATEUR
if(isset($_POST['enregistrer']) && !empty($_POST['id_user'])) {
    if(empty($_POST['login']) || empty($_POST['password'])) {
        //------ECHEC------------
        $statut=0; //0 EGALE FALSE
        //-----LE MESSAGE POUR AVERTIR L'UTLISATEUR
        $message="Le login ou le password sont obligatoire.";
        //-----C'EST POUR REDIRIGER L'UTILISATEUR
        header("location:utlisateur.php?message=$message&statut=$statut");
    }//FIN DE IF


//----------Strlen() : la fonction qui permet de renvoyer
//--------le nombre de caractere d'une variable
else if(strlen($_POST['login'])<3) {
    $statut=0;
    $message="Le login est trop court(au moins 3 caracteres...)";
    header("location:utlisateur.php?message=$message&statut=$statut");
}
else {
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $telephone=$_POST["telephone"];
    $login=$_POST["login"];
    $droit=$_POST["droit"];
    $id_user=$_POST["id_user"];
    //-----id_user qui ajouter l'utlisateur--
    // $createdBy=$_SESSION['id_user'];
    $createdBy=1;
    //---------DATE ET HEURE DE L'AJOUT------
    $createdAt = date('Y-m-d H:i:s');

    //---sha1 ou md5 C'EST UNE FONCTION QUI 
    //PERMET DE HACHE LE PASSWORD
    $password=sha1($_POST["password"]);

    //APPEL DE LA FONCTION AJOUTER UTLISATEUR//
   $resultat=modifierUtilisateur($id_user,
                                $nom,
                                $prenom,
                                $telephone,
                                $login,
                                $password,
                                $createdBy,
                                $createdAt,
                                $droit); 

    if($resultat==true) {
        $statut=1;
        $message="Utilisateur modifié avec succès";
        header("location:utilisateur.php?message=$message&statut=$statut");

        }//---FIN IF RESULTAT
    

    }//-----FIN ELSE
}//FIN D'AJOUT D'UTILISATEUR==============================================
?>